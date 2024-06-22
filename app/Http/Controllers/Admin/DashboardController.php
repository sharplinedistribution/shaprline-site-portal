<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MarketingCampaign;
use App\Models\PayoutRequest;
use App\Models\Release;
use App\Models\Support;
use App\Models\User;
use App\Models\VideoRelease;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
        $data['users_count']  = User::count();
        $data['payout_count']  = PayoutRequest::count();
        $data['release_count']  = Release::count();
        $data['campaign_count']  = MarketingCampaign::count();
        $data['support_count']  = Support::count();
        $data['takedown_count']  = Release::where('status', 3)->count();
        $data['video_takedown_count']  = VideoRelease::where('status', 3)->count();

        return view("admin-portal.pages.dashboard",$data);
    }
}
