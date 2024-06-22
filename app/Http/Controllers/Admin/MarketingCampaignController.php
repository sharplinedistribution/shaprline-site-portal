<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        $data['title'] = 'Marketing Campaign';
        $data['records'] = MarketingCampaign::with('user')->get();
        return view('admin-portal.pages.campaigns.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['title'] = 'Campaign Details';
        $data['show'] =  MarketingCampaign::where('id', $id)->first();
        return view('admin-portal.pages.campaigns.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
    public function changeStatus($id){
        $check = MarketingCampaign::where('id',$id)->first();
        if(!empty($check)){
            if($check->status == 1){
                $update = $check->update([
                    'status'=>0,
                ]);
                $message = "Marked as Pending";
            }
            else{
                $update = $check->update([
                    'status'=>1,
                ]);
                $message = "Marked as Completed";
            }
            if($update = 1){
                return redirect()->back()->with('success',$message);
            }
            return redirect()->back()->with('error' ,'Failed to change status');
            
        }
        return redirect()->back()->with('error' ,'Campaign not found');
    }
}
