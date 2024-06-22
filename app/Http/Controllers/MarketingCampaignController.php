<?php

namespace App\Http\Controllers;

use App\Models\MarketingCampaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Str;

class MarketingCampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Marketing Campaign List';
        $data['records'] = MarketingCampaign::with('user')->where('user_id',auth()->user()->id)->orderby('created_at', 'desc')->get();
        return view('user-portal.pages.campaigns.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Marketing Campaign';
        return view('user-portal.pages.revamp.campaigns.create',$data);
        // return view('user-portal.pages.campaigns.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // if( str_word_count($request->previous_press) <= 200 ){
        //     return redirect()->back()->with('error', 'There should be at least 200 words for About Release')->withInput();
        // }

        // if( str_word_count($request->artist_biography) <= 200 ){
        //     return redirect()->back()->with('error', 'There should be at least 200 words for Artist Biography')->withInput();
        // }

        $create = MarketingCampaign::create([
            'user_id' => Auth::user()->id,
            'artist_name' => $request->artist_name,
            'email' => $request->email,
            'release_title' => $request->release_title,
            'spotify_link' => $request->spotify_link,
            'itune_link' => $request->itune_link,
            'soundcloud_link' => $request->soundcloud_link,
            'musicvideo_link' => $request->musicvideo_link,
            'facebook_link' => $request->facebook_link,
            'twitter_link' => $request->twitter_link,
            'instagram_link' => $request->instagram_link,
            'contact' => $request->contact,
            'release_date' => $request->release_date,
            'is_single' => isset($request->is_single) && $request->is_single == "on" ? 1 : 0,
            'is_mixtape' => isset($request->is_mixtape) && $request->is_mixtape == "on" ? 1 : 0,
            'is_album' => isset($request->is_album) && $request->is_album == "on" ? 1 : 0,
            'previous_press' => $request->previous_press,
            'artist_biography' => $request->artist_biography,
        ]);
        if ($create->id) {
            return redirect()->back()->with('success', 'Successfuly Created');
        }
        return redirect()->back()->with('error', 'Failed to create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['title'] = 'Marketing Campaign Details';
        $data['show'] = MarketingCampaign::with('user')->where('id', $id)->first();
        return view('user-portal.pages.campaigns.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['title'] = 'Edit Marketing Campaign ';
        $data['edit'] = MarketingCampaign::with('user')->where('id', $id)->first();
        // return view('user-portal.pages.campaigns.edit', $data);
        return view('user-portal.pages.revamp.campaigns.edit',$data);
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
        $validator = Validator::make($request->all(), [
            'artist_name' => 'required|string',
            'email' => 'required|email',
            'release_title' => 'required|string',
            // 'spotify_link' => 'required',
            // 'itune_link' => 'required',
            // 'soundcloud_link' => 'required',
            // 'facebook_link' => 'required',
            'twitter_link' => 'required',
            'instagram_link' => 'required',
            'contact' => 'required',
            'release_date' => 'required',
            'previous_press' => 'required|string',
            'artist_biography' => 'required|string',

        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        if( str_word_count($request->previous_press) <= 300 ){
            return redirect()->back()->with('error', 'There should be at least 300 words for About Release');
        }

        if( str_word_count($request->artist_biography) <= 300 ){
            return redirect()->back()->with('error', 'There should be at least 300 words for Artist Biography');
        }

        $check = MarketingCampaign::where('id', $id)->first();
        if (!empty($check)) {
            $update = $check->update([
                'user_id' => Auth::user()->id,
                'artist_name' => $request->artist_name,
                'email' => $request->email,
                'release_title' => $request->release_title,
                'spotify_link' => $request->spotify_link,
                'itune_link' => $request->itune_link,
                'soundcloud_link' => $request->soundcloud_link,
                'musicvideo_link' => $request->musicvideo_link,
                'facebook_link' => $request->facebook_link,
                'twitter_link' => $request->twitter_link,
                'instagram_link' => $request->instagram_link,
                'contact' => $request->contact,
                'release_date' => $request->release_date,
                'is_single' => isset($request->is_single) && $request->is_single == "on" ? 1 : 0,
                'is_mixtape' => isset($request->is_mixtape) && $request->is_mixtape == "on" ? 1 : 0,
                'is_album' => isset($request->is_album) && $request->is_album == "on" ? 1 : 0,
                'previous_press' => $request->previous_press,
                'artist_biography' => $request->artist_biography,
            ]);
        }

        if ($update = 1) {
            return redirect()->route('user.campaigns.index')->with('success', 'Updated Successfuly');
        }
        return redirect()->back()->with('error', 'Failed to update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $check = MarketingCampaign::where('id', $id)->first();
        if(!empty($check)){
            $check->delete();
            return redirect()->route('user.campaigns.index')->with('success', 'Deleted Successfuly');
        }
        return redirect()->route('user.campaigns.index')->with('error', 'Failed to delete');
    }

    public function delete($id){
        $check = MarketingCampaign::where('id', $id)->first();
        if(!empty($check)){
            $check->delete();
            return redirect()->route('user.campaigns.index')->with('success', 'Deleted Successfuly');
        }
        return redirect()->route('user.campaigns.index')->with('error', 'Failed to delete');
    }
}
