<?php

namespace App\Http\Controllers\User;

use Str;
use App\Models\User;
use App\Models\Track;
use App\Models\Release;
use App\Models\RoyaltySplit;
use App\Models\VideoRelease;
use Illuminate\Http\Request;
use App\Mail\RoyaltySplitMail;
use App\Models\RoyaltySplitVideo;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class RoyaltySplitsController extends Controller
{
    public function index(){
        $release = Release::where('user_id', auth()->user()->id)->whereIn('status',[1,3,4])->orderBy('created_at','DESC')->paginate(12);
        $videos = VideoRelease::where('user_id', auth()->user()->id)->whereIn('status',[1,3,4])->orderBy('created_at','DESC')->paginate(12);
        $collabrations = RoyaltySplit::where('email',auth()->user()->email)->whereIn('status',[0,1])->get();
        $videoCollabrations = RoyaltySplitVideo::where('email',auth()->user()->email)->whereIn('status',[0,1])->get();
        $mySharings = RoyaltySplit::where('owner_id',auth()->user()->id)->where('status',1)->get();
        $myVideoSharings = RoyaltySplitVideo::where('owner_id',auth()->user()->id)->where('status',1)->get();
        return view('user-portal.pages.revamp.royalty-splits.index',compact('release','collabrations','mySharings','videos','myVideoSharings','videoCollabrations'));
    }

    public function share($id){
        $release = Release::where('id',$id)->where('user_id',auth()->user()->id)->firstOrFail();
        return view('user-portal.pages.revamp.royalty-splits.share-royalties',compact('release'));
    }

    public function shareVideoRoyalties($id){
        $video = VideoRelease::where('id',$id)->where('user_id',auth()->user()->id)->firstOrFail();
        return view('user-portal.pages.revamp.royalty-splits.share-video-royalties',compact('video'));
    }

    public function detail(Request $request){
        if($request->module == 'track'){
            $html = $this->trackDetail($request);
        }
        elseif($request->module == 'video'){
            $html = $this->videoDetail($request);
        }
        return response()->json(['success' => true, 'data' => $html->render()]);
    }

    public function trackDetail($request){
        $trackSplit  = trackSplit($request->trackId);
        $count = $request->count;
        $track = Track::where('id',$request->trackId)->first();
        $royalties = RoyaltySplit::where('track_id',$request->trackId)->get();
        $html =  view('user-portal.pages.revamp.royalty-splits.detail',compact('track','trackSplit','count','royalties'));
        return $html;
    }

    public function videoDetail($request){
        $trackSplit  = VideoSplit($request->trackId);
        $count = $request->count;
        $track = VideoRelease::where('id',$request->trackId)->first();
        $royalties = RoyaltySplitVideo::where('video_id',$request->trackId)->get();
        $html =  view('user-portal.pages.revamp.royalty-splits.detail',compact('track','trackSplit','count','royalties'));
        return $html;
    }

    public function cancel(Request $request){
        if($request->module == 'track'){
            $html = $this->trackCancel($request);
        }
        elseif($request->module == 'video'){
            $html = $this->videoCancel($request);
        }
        return response()->json(['success' => true, 'data' => $html->render()]);
    }

    public function trackCancel($request){
        $trackSplit  = trackSplit($request->trackId);
        $count = $request->count;
        $track = Track::where('id',$request->trackId)->first();
        $html =  view('user-portal.pages.revamp.royalty-splits.track',compact('track','trackSplit','count'));
        return $html;
    }

    public function videoCancel($request){
        $trackSplit  = VideoSplit($request->trackId);
        $count = $request->count;
        $track = VideoRelease::where('id',$request->trackId)->first();
        $html =  view('user-portal.pages.revamp.royalty-splits.track',compact('track','trackSplit','count'));
        return $html;
    }

    public function store(Request $request){
        if($request->module == 'track'){
            $this->trackStore($request);
        }
        elseif($request->module == 'video'){
            $this->videoStore($request);
        }
        return response()->json(['success' => true]);
    }

    public function trackStore($request){
        $release = Release::where('id',$request->release_id)->first();
        $track = Track::where('id',$request->track_id)->first();
        foreach($request->email as $index=>$rs){
            $validate = RoyaltySplit::where(['email'=> $rs, 'track_id' => $request->track_id])->first();
            if(!empty($validate)){
                // $update = $validate->update([
                //     'name' => $request->name[$index],
                //     'email' => $request->email[$index],
                //     'share' => $request->split[$index],
                // ])
            }
            else{
                $store = RoyaltySplit::create([
                    'track_id' => $request->track_id,
                    'release_id' => $request->release_id,
                    'owner_id' => $request->owner_id,
                    'name' => $request->name[$index],
                    'email' => $request->email[$index],
                    'share' => $request->split[$index],
                ]);

                $myEmail = $request->email[$index];
                $details = [
                    'name' => $request->name[$index],
                    'email' => $request->email[$index],
                    'email_release' => $release->user->email,
                    'release_title' => $release->album_title,
                    'subject' => 'You have been added as a collaborator for '.$track->title,
                    'album_artwork' => asset(config('upload_path.album_artwork').$release->album_artwork),
                ];
                Mail::to($myEmail)->send(new RoyaltySplitMail($details));

            }

        }
    }


    public function VideoStore($request){
        $video = VideoRelease::where('id',$request->track_id)->first();
        foreach($request->email as $index=>$rs){
            $validate = RoyaltySplitVideo::where(['email'=> $rs, 'video_id' => $video->id])->first();
            if(!empty($validate)){
                // $update = $validate->update([
                //     'name' => $request->name[$index],
                //     'email' => $request->email[$index],
                //     'share' => $request->split[$index],
                // ])
            }
            else{
                $store = RoyaltySplitVideo::create([
                    'video_id' => $request->track_id,
                    'owner_id' => $request->owner_id,
                    'name' => $request->name[$index],
                    'email' => $request->email[$index],
                    'share' => $request->split[$index],
                ]);

                $myEmail = $request->email[$index];
                $details = [
                    'name' => $request->name[$index],
                    'email' => $request->email[$index],
                    'email_release' => $video->user->email,
                    'release_title' => $video->album_title,
                    'subject' => 'You have been added as a collaborator for '.$video->video_title,
                    'album_artwork' => asset(config('upload_path.video_thumbnail').$video->video_thumbnail),
                ];
                Mail::to($myEmail)->send(new RoyaltySplitMail($details));

            }

        }
    }

    public function collaboratorStatus(Request $request){
        if($request->module == 'track'){
            $status = $this->collaboratorStatusTrack($request);
        }
        elseif($request->module == 'video'){
            $status = $this->collaboratorStatusVideo($request);
        }
        return response()->json(['success' => true, 'msg' => $status]);

    }

    public function collaboratorStatusTrack($request){
        $royalSplit = RoyaltySplit::where('id',$request->id)->first();
        if(!empty($royalSplit)){
            $royalSplit->update(['status' => $request->status]);
            if($request->status == 1){

                return 'Royalty Share Approved';
            }
            elseif($request->status == 2){
                return 'Royalty Share Rejected';
            }
        }
    }

    public function collaboratorStatusVideo($request){
        $royalSplit = RoyaltySplitVideo::where('id',$request->id)->first();
        if(!empty($royalSplit)){
            $royalSplit->update(['status' => $request->status]);
            if($request->status == 1){
                return response()->json(['success' => true, 'msg' => 'Royalty Share Approved']);
            }
            elseif($request->status == 2){
                return response()->json(['success' => true, 'msg' => 'Royalty Share Rejected']);
            }
        }
    }

    public function edit(Request $request){
        if($request->module == 'track'){
            $html = $this->editTrack($request);
        }
        elseif($request->module == 'video'){
            $html = $this->editVideo($request);
        }
        return response()->json(['success' => true, 'data' => $html->render()]);
    }

    public function editTrack($request){
        $royalSplit = RoyaltySplit::where('id',$request->id)->first();
        if(!empty($royalSplit)){
            $count = $request->count;
            $html =  view('user-portal.pages.revamp.royalty-splits.delete-modify-royaltysplit',compact('royalSplit','count'));
            return $html;
        }
    }

    public function editVideo($request){
        $royalSplit = RoyaltySplitVideo::where('id',$request->id)->first();
        if(!empty($royalSplit)){
            $count = $request->count;
            $html =  view('user-portal.pages.revamp.royalty-splits.delete-modify-royaltysplit',compact('royalSplit','count'));
            return $html;
        }
    }

    public function deleteAndModify(Request $request){
        if($request->module == 'track'){
            $this->deleteAndModifyTrack($request);
        }
        elseif($request->module == 'video'){
            $this->deleteAndModifyVideo($request);
        }
        return response()->json(['success' => true]);
    }

    public function deleteAndModifyTrack($request){
        $royaltySplit = RoyaltySplit::where('id', $request->royalty_split_id)->first();
        if(!empty($royaltySplit)){
            $store = RoyaltySplit::create([
                'track_id' => $royaltySplit->track_id,
                'release_id' => $royaltySplit->release_id,
                'owner_id' => $royaltySplit->owner_id,
                'name' => $request->name,
                'email' => $request->email,
                'share' => $request->split,
            ]);

            $myEmail = $request->email;
            $details = [
                'name' => $request->name,
                'email' => $request->email,
                'email_release' => $royaltySplit->release->user->email,
                'release_title' => $royaltySplit->release->album_title,
                'subject' => 'You have been added as a collaborator for '.$royaltySplit->track->title,
                'album_artwork' => asset(config('upload_path.album_artwork').$royaltySplit->release->album_artwork),
            ];
            Mail::to($myEmail)->send(new RoyaltySplitMail($details));
            $royaltySplit->delete();

        }
    }

    public function deleteAndModifyVideo($request){
        $royaltySplit = RoyaltySplitVideo::where('id', $request->royalty_split_id)->first();
        if(!empty($royaltySplit)){
            $store = RoyaltySplitVideo::create([
                'video_id' => $royaltySplit->video_id,
                'owner_id' => $royaltySplit->owner_id,
                'name' => $request->name,
                'email' => $request->email,
                'share' => $request->split,
            ]);

            $myEmail = $request->email;
            $details = [
                'name' => $request->name,
                'email' => $request->email,
                'email_release' => $royaltySplit->release->user->email,
                'release_title' => $royaltySplit->release->video_title,
                'subject' => 'You have been added as a collaborator for '.$royaltySplit->release->video_title,
                'album_artwork' => asset(config('upload_path.video_thumbnail').$royaltySplit->release->video_thumbnail),
            ];
            Mail::to($myEmail)->send(new RoyaltySplitMail($details));
            $royaltySplit->delete();

        }
    }
    public function delete(Request $request){
        if($request->module ==  'track'){
            $this->deleteTrack($request);
        }
        elseif($request->module == 'video'){
            $this->deleteVideo($request);
        }
        return response()->json(['success' => true]);
    }
    public function deleteTrack($request){
        $royaltySplit = RoyaltySplit::where('id', $request->royalty_split_id)->first();
        if(!empty($royaltySplit)){
            $royaltySplit->delete();
        }
    }
    public function deleteVideo($request){
        $royaltySplit = RoyaltySplitVideo::where('id', $request->royalty_split_id)->first();
        if(!empty($royaltySplit)){
            $royaltySplit->delete();
        }
    }
}
