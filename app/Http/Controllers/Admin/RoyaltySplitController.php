<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\RoyaltySplit;
use App\Models\RoyaltySplitVideo;
use App\Models\Release;
use App\Models\VideoRelease;

use Str;
class RoyaltySplitController extends Controller
{
    public function index(){
        $audios = RoyaltySplit::whereIn('status',[0,1])->groupBy('release_id')->get('release_id');
        return view('admin-portal.pages.royalty-split.index',compact('audios'));
    }

    public function detail($id){
        $release = Release::where('id',$id)->firstOrFail();
        $royaltySplits = RoyaltySplit::where('release_id',$id)->get();
        return view('admin-portal.pages.royalty-split.detail',compact('royaltySplits','release'));
    }



    public function videoIndex(){
        $videos = RoyaltySplitVideo::whereIn('status',[0,1])->groupBy('video_id')->get('video_id');
        return view('admin-portal.pages.royalty-split.index-video',compact('videos'));
    }

    public function videoDetail($id){
        $release = VideoRelease::where('id',$id)->firstOrFail();
        $royaltySplits = RoyaltySplitVideo::where('video_id',$id)->get();
        return view('admin-portal.pages.royalty-split.detail-video',compact('royaltySplits','release'));
    }
}
