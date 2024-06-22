<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Artist;

class RightsHoldersController extends Controller
{
    public function index(){
        $artists = Artist::where('user_id',auth()->user()->id)->orderBy('created_at','DESC')->get();
        return view('user-portal.pages.revamp.rights-holders.index',compact('artists'));
    }

    public function search(Request $request){
        $term = $request->query;
        $data = Artist::where('name','like','%'.$term.'%')->get();
        dd($data);
        return response()->json(['success' => true, 'data' => $data]);
    }


    public function detail($id){
        $artist = Artist::where('user_id',auth()->user()->id)->where('id',$id)->firstOrFail();
        return view('user-portal.pages.revamp.rights-holders.detail',compact('artist','id'));
    }

    public function updateProfileLink(Request $request, $id){
        $artist = Artist::where('id', $id)->where('user_id',auth()->user()->id)->first();
        if($request->musicType == 'Spotify'){
            $artist->spotify_profile_link = $request->musicLink;
        }
        elseif($request->musicType == 'AppleMusic'){
            $artist->apple_music_profile_link = $request->musicLink;
        }
        $artist->save();
        return redirect()->back()->with('success','Profile Link Updated');
    }

}
