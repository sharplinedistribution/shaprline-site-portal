<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Str;
use App\Models\Artist;
class ArtistController extends Controller
{
    public function index($id){
        $data['title'] = 'Artists';
        $data['artists'] = Artist::where('user_id', $id)->orderBy('created_at','DESC')->get();
        $data['id'] = $id;
        return view('admin-portal.pages.artists.index', $data);
    }
    
    public function store($id, Request $request){
        
        $validate = Artist::where('user_id',$id)->where('name',$request->name)->first();
        if(!empty($validate)){
            return redirect()->back()->with('error','Artist Already Exist');
        }
        $store = Artist::create([
            'user_id' => $id,
            'name' => $request->name,
            'spotify_profile_link' => $request->spotify_profile_link,
            'apple_music_profile_link' => $request->apple_music_profile_link,
        ]);
        if(!empty($store->id)){
            return redirect()->back()->with('success','Artist Added');
        }
    }
    
    public function edit($id,$artist_id, Request $request){
        $data['artist'] = Artist::where('id',$artist_id)->firstOrFail();
        
        $data['title'] = 'Edit Artists';
        $data['artists'] = Artist::where('user_id', $id)->orderBy('created_at','DESC')->get();
        $data['id'] = $id;
        return view('admin-portal.pages.artists.index', $data);
    }
    
    public function update($id, Request $request){
        $artist = Artist::where('id',$id)->first();
        $artist->name = $request->name;
        $artist->spotify_profile_link = $request->spotify_profile_link;
        $artist->apple_music_profile_link = $request->apple_music_profile_link;
        $artist->save();
        
         return redirect()->route('admin.artist.index',$artist->user_id)->with('success','Artist Updated');
    }
}
