<?php

namespace App\Http\Controllers\User;

use Str;
use App\Models\User;
use App\Models\Store;
use App\Models\Track;
use App\Models\Artist;
use App\Models\Release;
use App\Models\TrackArtist;
use Illuminate\Http\Request;
use App\Models\SelectedArtist;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;

class ReleaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('id', auth()->user()->id)->first();
        $verification = $user->is_verified;
        $date = date('Y-m-d', strtotime($user->email_verified_at));
        $today = date('Y-m-d');
        $release = Release::where('user_id', auth()->user()->id)->orderBy('created_at', 'DESC')->paginate(12);
        return view('user-portal.pages.revamp.releases.index', compact('release'));
        // return view('user-portal.pages.release.index',compact('release'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::where('id', auth()->user()->id)->first();

        if ($user->block_release == 1) {
            return redirect()->route('blockRelease');
        }

        $verification = $user->is_verified;
        $date = date('Y-m-d', strtotime($user->email_verified_at));
        $subscriptionEndingDate = getLatestSubscription();
        $today = date('Y-m-d');
        if ($today > $date && $user->is_subscribed != 1) {
            return redirect()->route('user.accounts.renewplans')->with('errorr', 'Your 30 Day Free Trial Has Expired');
        } elseif ($subscriptionEndingDate != false) {
            $date = date('Y-m-d', strtotime($subscriptionEndingDate->expiry_at));
            if ($today > $date && $user->is_subscribed == 1) {
                return redirect()->route('user.accounts.renewplans')->with('errorr', 'Your Subscription has been ended');
            }
        }
        $stores = Store::where('status', 1)->get();
        // return view('user-portal.pages.release.create');
        return view('user-portal.pages.revamp.releases.create', compact('stores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->file('album_artwork')) {
            $albumArtwork = $request->file('album_artwork');
            // if (in_array($albumArtwork->getClientOriginalExtension(), ['jpg','jpeg','png'])){
            $albumArtworkName = 'album_artwork' . '-' . time() . '-' . rand(1000, 100) . '.' . $albumArtwork->getClientOriginalExtension();
            $albumArtwork->move(config('upload_path.album_artwork'), $albumArtworkName);
            // }
            // else{
            //   return redirect()->back()->with('error','Please Upload a valid file');
            // }
        } else {
            return redirect()->back()->with('error', 'Please Upload a album artwork');
        }

        $store = Release::create([
            'number_of_songs' => $request->number_of_songs - 1,
            'album_title' => $request->album_title,
            'album_artwork' => $albumArtworkName,
            'upc_code' => $request->upc_code,
            'label' => $request->label,
            'version' => $request->version,
            'artist' => json_encode($request->artist),
            'release_date' => isset($request->release_date) ? $request->release_date : date('Y-m-d'),
            'language' => $request->language,
            'primary_genre' => $request->primary_genre,
            'secondary_genre' => $request->secondary_genre,
            'stores' => json_encode($request->stores),
            'track_ids' => json_encode($request->audio_track_sortable),
            'user_id' => auth()->user()->id,
            'is_previous_released' => $request->is_previous_released,
            'previous_release_date' => $request->previous_release_date,
            // 'artist_ids' => json_encode($request->artist_id),
            // 'artist_role' => json_encode($request->artist_role),
            // 'catalog_id' => $request->catalog_id,
            // 'p_copyright_year' => $request->p_copyright_year,
            // 'p_copyright_name' => $request->p_copyright_name,
            // 'c_copyright_year' => $request->c_copyright_year,
            // 'c_copyright_name' => $request->c_copyright_name,
        ]);

        // if(!empty($store->id)){
        //     return redirect()->route('user.release.index')->with('success','Track Uploaded');
        // }
        // return redirect()->route('user.release.index')->with('error','Something Went Wrong');

        Session::put('release_id', $store->id);
        if (!empty($store->id)) {
            return redirect()->route('user.delivered')->with('success', 'Track Uploaded');
        }

        return redirect()->route('user.release.index')->with('error', 'Something Went Wrong');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $id = $request->id;
        $user = User::where('id', auth()->user()->id)->first();
        $verification = $user->is_verified;
        $date = date('Y-m-d', strtotime($user->email_verified_at));
        $subscriptionEndingDate = getLatestSubscription();
        $today = date('Y-m-d');
        if ($today > $date && $user->is_subscribed != 1) {
            return redirect()->route('user.accounts.renewplans')->with('errorr', 'Your 30 Day Free Trial Has Expired');
        } elseif ($subscriptionEndingDate != false) {
            $date = date('Y-m-d', strtotime($subscriptionEndingDate->expiry_at));
            if ($today > $date && $user->is_subscribed == 1) {
                return redirect()->route('user.accounts.renewplans')->with('errorr', 'Your Subscription has been ended');
            }
        }
        $release = Release::where('id', $id)->first();
        if (!empty($release)) {
            return view('user-portal.pages.revamp.releases.show', compact('release'));
            // return view('user-portal.pages.release.show',compact('release'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('id', auth()->user()->id)->first();
        $verification = $user->is_verified;
        $date = date('Y-m-d', strtotime($user->email_verified_at));
        $subscriptionEndingDate = getLatestSubscription();

        $today = date('Y-m-d');
        if ($today > $date && $user->is_subscribed != 1) {
            return redirect()->route('user.accounts.renewplans')->with('errorr', 'Your 30 Day Free Trial Has Expired');
        } elseif ($subscriptionEndingDate != false) {
            $date = date('Y-m-d', strtotime($subscriptionEndingDate->expiry_at));
            if ($today > $date && $user->is_subscribed == 1) {
                return redirect()->route('user.accounts.renewplans')->with('errorr', 'Your Subscription has been ended');
            }
        }
        $stores = Store::where('status', 1)->get();
        $release = Release::where('id', $id)->firstOrFail();
        // return view('user-portal.pages.release.edit',compact('stores','release'));

        return view('user-portal.pages.revamp.releases.edit', compact('stores', 'release'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $release = Release::where('id', $request->release_id)->firstOrFail();
        if ($request->file('album_artwork')) {
            $albumArtwork = $request->file('album_artwork');
            $albumArtworkName = 'album_artwork' . '-' . time() . '-' . rand(1000, 100) . '.' . $albumArtwork->getClientOriginalExtension();
            $albumArtwork->move(config('upload_path.album_artwork'), $albumArtworkName);
        } else {
            $albumArtworkName = $release->album_artwork;
        }

        $update = Release::where('id', $request->release_id)->update([
            // 'number_of_songs' => $request->number_of_songs,
            'album_title' => $request->album_title,
            'album_artwork' => $albumArtworkName,
            'upc_code' => $request->upc_code,
            'label' => $request->label,
            'version' => $request->version,
            'artist' => json_encode($request->artist),
            'release_date' => isset($request->release_date) ? $request->release_date : date('Y-m-d'),
            'language' => $request->language,
            'primary_genre' => $request->primary_genre,
            'secondary_genre' => $request->secondary_genre,
            'stores' => json_encode($request->stores),
            'track_ids' => json_encode($request->audio_track_sortable),
            'user_id' => auth()->user()->id,
            'is_previous_released' => $request->is_previous_released,
            'previous_release_date' => $request->previous_release_date,
            'artist_ids' => json_encode($request->artist_id),
            'artist_role' => json_encode($request->artist_role),
            'catalog_id' => $request->catalog_id,
            'p_copyright_year' => $request->p_copyright_year,
            'p_copyright_name' => $request->p_copyright_name,
            'c_copyright_year' => $request->c_copyright_year,
            'c_copyright_name' => $request->c_copyright_name,
        ]);


        if ($update > 0) {
            return redirect()->route('user.release.index')->with('success', 'Release Updated');
        }
        return redirect()->route('user.release.index')->with('error', 'Something Went Wrong');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function audio_track(Request $request)
    {
        $artist = [];
        $artistTypeExplode = explode(',', $request->artist_track_type);
        $artistNameExplode = explode(',', $request->artist_track_name);
        $artistSpotifyExplode = explode(',', $request->artist_track_spotify);
        $artistAppleExplode = explode(',', $request->artist_track_apple);




        if (count($artistTypeExplode) > 0 && count($artistNameExplode) > 0) {
            foreach ($artistNameExplode as $index => $a) {
                if (!empty($artistNameExplode[$index])) {
                    $artist[$index]['type'] = $artistTypeExplode[$index];
                    $artist[$index]['name'] = $artistNameExplode[$index];
                    $artist[$index]['spotify'] = $artistSpotifyExplode[$index];
                    $artist[$index]['apple'] = $artistAppleExplode[$index];
                }
            }
        }

        $songwriter = [];
        $songwriterTypeExplode = explode(',', $request->songwriters_type);
        $songwriterNameExplode = explode(',', $request->songwriters_name);
        if (count($songwriterTypeExplode) > 0 && count($songwriterNameExplode) > 0) {
            if (!empty($songwriterNameExplode[$index])) {
                foreach ($songwriterNameExplode as $index => $a) {
                    $songwriter[$index]['type'] = $songwriterTypeExplode[$index];
                    $songwriter[$index]['name'] = $songwriterNameExplode[$index];
                }
            }
        }


        // if($request->file('track_audio_file')){
        //     $audioTrack = $request->file('track_audio_file');
        //     if (in_array($audioTrack->getClientOriginalExtension(), ['wav'])){
        //       $audioTrackName = 'audio_track' . '-' . time() .'-'.rand(1000,100). '.' . $audioTrack->getClientOriginalExtension();
        //       $audioTrack->move(config('upload_path.audio_track'), $audioTrackName);
        //     }
        //     else{
        //       return response()->json(['success'=> false, 'msg' => 'Please Upload a valid file']);
        //     }
        // }
        // else{
        //     return response()->json(['success'=> false, 'msg' => 'Please upload Audio File']);
        // }
        $store = Track::create([
            'title' => $request->track_title,
            'track_version' => $request->track_version,
            'isrc_code' => $request->track_isrc,
            'artist' => json_encode($artist),
            'contains_1' => $request->track_contains_1,
            'contains_2' => $request->track_contains_2,
            'language' => $request->track_language,
            'songwriter' => json_encode($songwriter),
            'audio_track' => Session::get('audioTrackName'),
            'artist_ids' => json_encode($request->artist_ids),
            'lyrics' => $request->lyrics,
            'p_copyright_year' => $request->p_copyright_year,
            'p_copyright_name' => $request->p_copyright_name,
        ]);

        if (!empty($store->id)) {

            // $artistIdsExplode = explode(',',$request->artist_ids);
            // $artistRolesExplode = explode(',',$request->artist_roles);

            // foreach($artistIdsExplode as $index=>$a){
            //     $artist = TrackArtist::create([
            //         'track_id' => $store->id,
            //         'user_id' => auth()->user()->id,
            //         'artist_id' => $a,
            //         'role' => $artistRolesExplode[$index],
            //     ]);
            // }
            Session::forget('audioTrackName');
            return response()->json(['success' => true, 'msg' => $request->track_title . '  Uploaded', 'data' => $store->id]);
        }
        return response()->json(['success' => false, 'msg' => 'Something Went wrong while uploading track']);
    }

    function editTrack(Request $request)
    {
        $track = Track::where('id', $request->id)->first();
        $count = $request->count;
        if (!empty($track)) {
            $view =  view('user-portal.pages.release.edit-track', compact('track', 'count'));
            return response(['success' => true, 'data' => $view->render(), 'audio_track' => $track->audio_track, 'lyrics' => $track->lyrics]);
        }
        return response()->json(['success' => false]);
    }
    function updateTrack(Request $request)
    {
        $track = Track::where('id', $request->track_id)->first();
        if (!empty($track)) {
            $artist = [];
            $artistTypeExplode = explode(',', $request->artist_track_type);
            $artistNameExplode = explode(',', $request->artist_track_name);
            $artistSpotifyExplode = explode(',', $request->artist_track_spotify);
            $artistAppleExplode = explode(',', $request->artist_track_apple);

            if (count($artistTypeExplode) > 0 && count($artistNameExplode) > 0) {
                foreach ($artistTypeExplode as $index => $a) {
                    if (!empty($artistNameExplode[$index])) {
                        $artist[$index]['type'] = $artistTypeExplode[$index];
                        $artist[$index]['name'] = $artistNameExplode[$index];
                        $artist[$index]['spotify'] = $artistSpotifyExplode[$index];
                        $artist[$index]['apple'] = $artistAppleExplode[$index];
                    }
                }
            }

            $songwriter = [];
            $songwriterTypeExplode = explode(',', $request->songwriters_type);
            $songwriterNameExplode = explode(',', $request->songwriters_name);
            if (count($songwriterTypeExplode) > 0 && count($songwriterNameExplode) > 0) {
                foreach ($songwriterTypeExplode as $index => $a) {
                    if (!empty($songwriterNameExplode[$index])) {
                        $songwriter[$index]['type'] = $songwriterTypeExplode[$index];
                        $songwriter[$index]['name'] = $songwriterNameExplode[$index];
                    }
                }
            }

            if (Session::has('audioTrackName')) {
                $fileName = Session::get('audioTrackName');
            } else {
                $fileName = $track->audio_track;
            }
            $update = Track::where('id', $request->track_id)->update([
                'title' => $request->track_title,
                'track_version' => $request->track_version,
                'isrc_code' => $request->track_isrc,
                'artist_ids' => json_encode($request->artist_ids),
                'contains_1' => $request->track_contains_1,
                'contains_2' => $request->track_contains_2,
                'language' => $request->track_language,
                'songwriter' => json_encode($songwriter),
                'lyrics' => $request->lyrics,
                'audio_track' => $fileName,
                'p_copyright_year' => $request->p_copyright_year,
                'p_copyright_name' => $request->p_copyright_name,
            ]);

            if ($update > 0) {
                Session::forget('audioTrackName');
                $count = $request->count;
                $view =  view('user-portal.pages.release.reset-track', compact('count'));
                return response()->json(['success' => true, 'Track Updated', 'data' => $view->render(),  'msg' => $request->track_title . ' Updated', 'track_title' => $request->track_title, 'track_version' => $request->track_version]);
            }
            return response()->json(['success' => false, 'Something Went Wrong']);
        }
        return response()->json(['success' => false, 'Track id is not valid']);
    }

    public function deleteTrack(Request $request)
    {
        $arr = $request->audio_track;
        if (($key = array_search($request->id, $arr)) !== false) {
            unset($arr[$key]);
        }
        $track = Track::where('id', $request->id)->first();
        $trackTitle = $track->title;
        if (!empty($track)) {
            $track->delete();
            if (isset($request->release_id)) {
                Release::where('id', $request->release_id)->update(['track_ids' => json_encode(array_values($arr))]);
            }
            return response()->json(['success' => true, 'msg' => $trackTitle . ' Deleted']);
        }
        return response()->json(['success' => true, 'msg' => 'Something Went Wrong']);
    }


    public function uploadLargeFiles(Request $request)
    {
        @ini_set('upload_max_size', '256M');
        @ini_set('post_max_size', '256M');
        @ini_set('max_execution_time', '300');
        @ini_set('max_input_time', '300');

        $receiver = new FileReceiver('file', $request, HandlerFactory::classFromRequest($request));

        if (!$receiver->isUploaded()) {
            // file not uploaded
        }
        $newFileName = str_replace(' ', '-', auth()->user()->name) . '-vide_track-' . time() . '-' . Str::random(5);
        $fileReceived = $receiver->receive(); // receive file
        if ($fileReceived->isFinished()) { // file uploading is complete / all chunks are uploaded
            $file = $fileReceived->getFile(); // get file
            $extension = $file->getClientOriginalExtension();
            // $fileName = str_replace('.'.$extension, '', $file->getClientOriginalName()); //file name without extenstion
            $fileName = str_replace('.' . $extension, '', $newFileName); //file name without extenstion

            $fileName .= '_' . md5(time()) . '.' . $extension; // a unique file name

            $disk = Storage::disk(config('filesystems.default'));
            if (isset($request->video)) {
                $path = $disk->putFileAs(config('upload_path.video_track'), $file, $fileName);
            } else {
                $path = $disk->putFileAs(config('upload_path.audio_track'), $file, $fileName);
            }

            // delete chunked file
            unlink($file->getPathname());
            session(['audioTrackName' => $fileName]);
            return [
                'path' => asset('storage/' . $path),
                'filename' => $fileName
            ];
        }

        // otherwise return percentage information
        $handler = $fileReceived->handler();
        return [
            'done' => $handler->getPercentageDone(),
            'status' => true
        ];
    }

    public function audioTrackPath($filename)
    {
        $path = storage_path('app/uploads/audio_track/' . $filename);
        if (!File::exists($path)) {
            abort(404);
        }
        $file = File::get($path);
        $type = File::mimeType($path);
        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);
        return $response;
    }

    public function playTrack(Request $request)
    {
        $track = Track::where('id', $request->id)->first();
        if (!empty($track)) {
            $view =  view('user-portal.pages.release.audio', compact('track'));
            return response()->json(['success' => true, 'data' => $view->render()]);
        }
        return response()->json(['success' => false]);
    }

    public function createRelease()
    {
        $stores = Store::where('status', 1)->get();
        return view('user-portal.pages.revamp.releases.create', compact('stores'));
    }

    public function takedown(Request $request)
    {
        $release = Release::where('id', $request->release_id)->first();
        if (!empty($release)) {
            $release->takedown_reason = $request->reason;
            $release->status = 3;
            $release->save();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false]);
    }

    public function resetTrack(Request $request)
    {
        $count = $request->count;
        $view = view('user-portal.pages.release.reset-track', compact('count'));
        return response()->json(['success' => true, 'data' => $view->render()]);
    }

    public function addNewArtist(Request $request)
    {
        if (isset($request->avatar)) {
            $avatar = $request->file('avatar');
            $avatarName = 'artist-avatar' . '-' . time() . '-' . rand(1000, 100) . '.' . $avatar->getClientOriginalExtension();
            $avatar->move(config('upload_path.artist_avatar'), $avatarName);
        } else {
            $avatarName = null;
        }

        $store  = Artist::create([
            'avatar' => $avatarName,
            'name' => $request->name,
            'spotify_profile_link' => $request->spotify_link,
            'apple_music_profile_link' => $request->apple_music_link,
            'user_id' => auth()->user()->id,
        ]);

        if (!empty($store->id)) {
            return response()->json(['success' => true, 'artist_id' => $store->id]);
        }
        return response()->json(['success' => false]);
    }

    public function getArtist(Request $request)
    {
        $artists = Artist::where('user_id', auth()->user()->id)->get(['id', 'name', 'avatar']);
        $artistsIds = isset($request->artistsIds) ? $request->artistsIds : [];
        if (!empty($artists)) {
            $html = view('user-portal.pages.revamp.releases.artist.get-artists', compact('artists', 'artistsIds'));
            return response()->json(['success' => true, 'data' => $html->render()]);
        } else {
            return response()->json(['success' => false]);
        }
    }

    public function addArtistDetail(Request $request)
    {
        $artist = Artist::where('id', $request->artist_id)->first();
        $location = $request->location;
        $role = null;
        $type = null;
        if (!empty($artist)) {
            if (empty($request->role)) {
                $role = 'Main Primary';
                $type = 'main';
                $html = view('user-portal.pages.revamp.releases.artist.main-artist', compact('artist', 'role', 'location'));
            } elseif (!empty($request->role)) {
                $role = $request->role;
                $type = 'other';
                $html = view('user-portal.pages.revamp.releases.artist.other-artist', compact('artist', 'role', 'location'));
            }
            $selectedArtist = SelectedArtist::create([
                'type' => $type,
                'role' => $role,
                'user_id' => auth()->user()->id,
                'artist_id' => $artist->id,
            ]);
            return response()->json(['success' => true, 'type' => $type, 'data' => $html->render(), 'artist_id' => $artist->id]);
        }
        return response()->json(['success' => false]);
    }

    public function editArtist(Request $request)
    {
        $type = $request->type;
        $artist = Artist::where('id', $request->id)->first();
        if (!empty($artist)) {
            $html = view('user-portal.pages.revamp.releases.artist.edit-artist', compact('artist', 'type'));
            return response()->json(['success' => true, 'data' => $html->render()]);
        }
        return response()->json(['success' => false]);
    }

    public function updateArtist(Request $request)
    {
        $type = $request->type;
        $artist = Artist::where('id', $request->id)->first();
        if (!empty($artist)) {
            $artist->update(['name' => $request->name, 'spotify_profile_link' => $request->spotifyLink, 'apple_music_profile_link' => $request->appleMusicLink]);

            if ($type == 'main') {
                $role = 'Main Primary';
                $html = view('user-portal.pages.revamp.releases.artist.main-artist', compact('artist', 'role'));
            } elseif ($type == 'other') {
                $roleData = SelectedArtist::where('artist_id', $artist->id)->first();
                $role = $roleData->role;
                $html = view('user-portal.pages.revamp.releases.artist.other-artist', compact('artist', 'role'));
            }

            return response()->json(['success' => true, 'data' => $html->render()]);
        }
        return response()->json(['success' => false]);
    }

    public function deleteArtist(Request $request)
    {
        // $artist = SelectedArtist::where('artist_id',$request->id)->delete();
        return response()->json(['success' => true]);
    }
}
