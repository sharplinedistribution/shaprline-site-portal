<?php

namespace App\Http\Controllers\Admin;

use Str;
use App\Models\Release;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\VideoRelease;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class TakedownController extends Controller
{
    public function index(){
        $releases = Release::where('status', 3)->orderBy('created_at','DESC')->get();
        return view('admin-portal.pages.takedown.index',compact('releases'));
    }

    public function status(Request $request){
        $release = Release::where('id', $request->id)->where('status', 3)->first();
        if(!empty($release)){
            $release->status = 4;
            $release->save();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false]);
    }


    public function Videoindex(){
        $releases = VideoRelease::where('status', 3)->orderBy('created_at','DESC')->get();
        return view('admin-portal.pages.takedown.video-index',compact('releases'));
    }

    public function Videostatus(Request $request){
        $release = VideoRelease::where('id', $request->id)->where('status', 3)->first();
        if(!empty($release)){
            $release->status = 4;
            $release->save();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false]);
    }


}
