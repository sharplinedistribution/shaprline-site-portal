<?php

namespace App\Http\Controllers\Admin;

use Str;
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
        $releases = VideoRelease::orderBy('created_at','DESC')->get();
        return view('admin-portal.pages.video-release.index',compact('releases'));
    }
    public function show($id){
        $release = VideoRelease::where('id',$id)->first();
        return view('admin-portal.pages.video-release.show',compact('release','id'));
    }
    public function releaseStatus($id,$status){
        $release = VideoRelease::where('id',$id)->first();
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
        $path = storage_path('app/uploads/video_track/' . $filename);
        if (!File::exists($path)) {
            abort(404);
        }
       return Response::download($path);
    }
    public function albumArtWork($filename){
      $path = public_path('uploads/video_thumbanil/').$filename;
      return Response::download($path);
    }

    public function deleteVideoRelease(Request $request, $id){
        $release = VideoRelease::where('id',$id)->first();
        if(!empty($release)){
            $release->delete();
            return redirect()->back()->with('error','Release Deleted');
        }
        return redirect()->back()->with('error','Something Went Wrong');
    }




}
