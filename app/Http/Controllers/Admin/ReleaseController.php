<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Track;
use App\Models\Release;
use Illuminate\Http\Request;
use App\Models\ReleaseStream;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class ReleaseController extends Controller
{
    public function index(){
        $releases = Release::orderBy('created_at','DESC')->get();
        return view('admin-portal.pages.release.index',compact('releases'));
    }
    public function show($id){
        $release = Release::where('id',$id)->first();
        return view('admin-portal.pages.release.show',compact('release','id'));
    }
    public function releaseStatus($id,$status){
        $release = Release::where('id',$id)->first();
        if(!empty($release)){
            if($status != 3){
                $release->approved_by = getAdminAuth()->id;
                $release->approved_at = date('Y-m-d');
                $release->rejection_comments = request('comment');
            }
            $release->status = $status;

            $release->save();
            if($release->status == 1){
                return response()->json(['success' => true, 'msg' => 'Release has been Accepted', 'date' => getDateFormat(date('Y-m-d')), 'status' => 1]);
            }
            elseif($release->status == 2){
                return response()->json(['success' => true, 'msg' => 'Release has been Rejected', 'date' => getDateFormat(date('Y-m-d')), 'status' => 2]);
            }
            elseif($release->status == 4){
                return response()->json(['success' => true, 'msg' => 'Takedown request Approved', 'date' => getDateFormat(date('Y-m-d')), 'status' => 2]);
            }
            else{
                return response()->json(['success' => false, 'msg' => 'Something Went Wrong']);
            }
        }
        return response()->json(['success' => false, 'msg' => 'Something Went Wrong']);
    }
    public function audioTrackPath($filename){
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
    public function downloadTrack($filename){
        $path = storage_path('app/uploads/audio_track/' . $filename);
        if (!File::exists($path)) {
            abort(404);
        }
       return Response::download($path);
    }
    public function albumArtWork($filename){
      $path = public_path('uploads/album_artwork/').$filename;
      return Response::download($path);
    }
    public function playTrack(Request $request){
        $track = Track::where('id', $request->id)->first();
        if(!empty($track)){
            $view =  view('admin-portal.pages.release.audio',compact('track'));
            return response()->json(['success' => true, 'data' => $view->render()]);
        }
        return response()->json(['success' => false]);
    }
    public function deleteRelease(Request $request, $id){
        $release = Release::where('id',$id)->first();
        if(!empty($release)){
            $release->delete();
            return redirect()->back()->with('error','Release Deleted');
        }
        return redirect()->back()->with('error','Something Went Wrong');
    }
    public function addStreams(Request $request){
        $store = ReleaseStream::create([
            'user_id' => $request->user_id,
            'release_id' => $request->release_id,
            'streams' => $request->streams,
        ]);
        if(!empty($store->id)){
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false]);
    }
    public function updateRelease(Request $request,$id){
        $update = Release::where('id',$id)->update(['upc_code' => $request->upc_code]);
        if($update > 0){
            return redirect()->back()->with('success','Updated Successfully');
        }
        return redirect()->back()->with('error','Something Went Wrong');
    }
    public function updateTrack(Request $request){
        $id = $request->track_id;
        $update = Track::where('id',$id)->update(['isrc_code' => $request->isrc_code]);
        if($update > 0){
            return redirect()->back()->with('success','Updated Successfully');
        }
        return redirect()->back()->with('error','Something Went Wrong');
    }
    public function blockRelease(Request $request){
        $msg = '';
        $status = 0;
        $user = User::where('id',$request->user_id)->first();
        if(!empty($user)){
            if($user->block_release == 1){
                $status = 0;
                $msg = 'Create Release Un Blocked for '.$user->name;
            }
            elseif($user->block_release == 0){
                $status = 1;
                $msg = 'Create Release Blocked for '.$user->name;
            }
            User::where('id',$request->user_id)->update(['block_release' => $status, 'block_reason' => $request->reason]);
            return redirect()->back()->with('success',$msg);
        }
        return redirect()->back()->with('error','Something Went Wrong');
    }
}
