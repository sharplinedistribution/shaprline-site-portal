<?php

namespace App\Http\Controllers\User;

use Str;
use App\Models\User;
use App\Models\VideoRelease;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class VideoReleaseController extends Controller
{
    public function index(){
        $videoReleases = VideoRelease::where('user_id',auth()->user()->id)->orderBy('created_at','DESC')->paginate(12);
        return view('user-portal.pages.revamp.video-release.index',compact('videoReleases'));
    }
    public function create(){
        $user = User::where('id',auth()->user()->id)->first();
        $verification = $user->is_verified;
        $subscriptionEndingDate = getLatestSubscription();
        $date = date('Y-m-d',strtotime($user->email_verified_at));
        $today = date('Y-m-d');
        if($today > $date && $user->is_subscribed != 1){
            return redirect()->route('user.accounts.renewplans')->with('errorr','Your 30 Day Free Trial Has Expired');
        }
        elseif($subscriptionEndingDate != false){
            $date = date('Y-m-d',strtotime($subscriptionEndingDate->expiry_at));
            if($today > $date && $user->is_subscribed == 1){
                return redirect()->route('user.accounts.renewplans')->with('errorr','Your Subscription has been ended');
            }
        }
        return view('user-portal.pages.revamp.video-release.create');
    }

    public function store(Request $request){

        if($request->file('video_thumbnail')){
            $videoThumbnail = $request->file('video_thumbnail');
              $videoThumbnailName = 'video_thumbnail' . '-' . time() .'-'.rand(1000,100). '.' . $videoThumbnail->getClientOriginalExtension();
              $videoThumbnail->move(config('upload_path.video_thumbnail'), $videoThumbnailName);
        }
        else{
            return redirect()->back()->with('error','Please Upload a Video Thumbnail');
        }
        $songwriterType = $request->songwriters_type;
        $songwriterName = $request->songwriters_name;
        if(count($songwriterType) > 0 && count($songwriterName) > 0){
            foreach($songwriterType as $index=>$a){
                $songwriter[$index]['type'] = $songwriterType[$index];
                $songwriter[$index]['name'] = $songwriterName[$index];
            }
        }

        $store = VideoRelease::create([
            'video_title' => $request->video_title,
            'vevo_link' => $request->vevo_link,
            'is_video_made_for_kids' => $request->is_video_made_for_kids,
            'youtube_link' => $request->youtube_link,
            'artist' => json_encode($request->artist),
            'primary_genre' => $request->primary_genre,
            'secondary_genre' => $request->secondary_genre,
            'primary_language' => $request->primary_language,
            'label_copyright' => $request->label_copyright,
            'upc_code' => $request->upc_code,
            'isrc_code' => $request->isrc_code,
            'songwriter' => json_encode($songwriter),
            'lyrics' => $request->lyrics,
            'video_description' => $request->video_description,
            'video_thumbnail' => $videoThumbnailName,
            'video_track' => $request->video_track,
            'release_date' => $request->release_date,
            'user_id' => auth()->user()->id,
        ]);


        if(!empty($store->id)){
            return redirect()->route('user.video-release.index')->with('success','Video Release Uploaded');
        }
        return redirect()->route('user.video-release.index')->with('error','Something Went Wrong');
    }

    public function show($id){
        $release = VideoRelease::where('id',$id)->where('user_id',auth()->user()->id)->firstOrFail();
        return view('user-portal.pages.revamp.video-release.show',compact('release'));
    }


    public function edit($id)
    {

        $user = User::where('id',auth()->user()->id)->first();
        $verification = $user->is_verified;
        $date = date('Y-m-d',strtotime($user->email_verified_at));
        $subscriptionEndingDate = getLatestSubscription();
        $today = date('Y-m-d');
        if($today > $date && $user->is_subscribed != 1){
            return redirect()->route('user.accounts.renewplans')->with('errorr','Your 30 Day Free Trial Has Expired');
        }
        elseif($subscriptionEndingDate != false){
            $date = date('Y-m-d',strtotime($subscriptionEndingDate->expiry_at));
            if($today > $date && $user->is_subscribed == 1){
                return redirect()->route('user.accounts.renewplans')->with('errorr','Your Subscription has been ended');
            }
        }
        $release = VideoRelease::where('id',$id)->where('user_id',auth()->user()->id)->firstOrFail();
        return view('user-portal.pages.revamp.video-release.edit',compact('release'));
    }


    public function update($id, Request $request){
        $release = VideoRelease::where('id',$id)->where('user_id',auth()->user()->id)->firstOrFail();
        if($request->file('video_thumbnail')){
            $videoThumbnail = $request->file('video_thumbnail');
              $videoThumbnailName = 'video_thumbnail' . '-' . time() .'-'.rand(1000,100). '.' . $videoThumbnail->getClientOriginalExtension();
              $videoThumbnail->move(config('upload_path.video_thumbnail'), $videoThumbnailName);
        }
        else{
            $videoThumbnailName = $release->video_thumbnail;
        }
        $songwriterType = $request->songwriters_type;
        $songwriterName = $request->songwriters_name;
        if(count($songwriterType) > 0 && count($songwriterName) > 0){
            foreach($songwriterType as $index=>$a){
                $songwriter[$index]['type'] = $songwriterType[$index];
                $songwriter[$index]['name'] = $songwriterName[$index];
            }
        }

        $update = VideoRelease::where('id', $id)->update([
            'video_title' => $request->video_title,
            'vevo_link' => $request->vevo_link,
            'is_video_made_for_kids' => $request->is_video_made_for_kids,
            'youtube_link' => $request->youtube_link,
            'artist' => json_encode($request->artist),
            'primary_genre' => $request->primary_genre,
            'secondary_genre' => $request->secondary_genre,
            'primary_language' => $request->primary_language,
            'label_copyright' => $request->label_copyright,
            'upc_code' => $request->upc_code,
            'isrc_code' => $request->isrc_code,
            'songwriter' => json_encode($songwriter),
            'lyrics' => $request->lyrics,
            'video_description' => $request->video_description,
            'video_thumbnail' => $videoThumbnailName,
            'video_track' => $request->video_track,
            'release_date' => $request->release_date,
        ]);


        if($update > 0){
            return redirect()->route('user.video-release.index')->with('success','Video Release Updated');
        }
        return redirect()->route('user.video-release.index')->with('error','Something Went Wrong');
    }


    public function videoTrackPath($filename){
        $path = storage_path('app/uploads/video_track/' . $filename);
        if (!File::exists($path)) {
            abort(404);
        }
        $file = File::get($path);
        $type = File::mimeType($path);
        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);
        return $response;
    }


    public function takedownVideo(Request $request){
        $release = VideoRelease::where('id', $request->release_id)->first();
        if(!empty($release)){
            $release->takedown_reason = $request->reason;
            $release->status = 3;
            $release->save();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false]);
    }
}
