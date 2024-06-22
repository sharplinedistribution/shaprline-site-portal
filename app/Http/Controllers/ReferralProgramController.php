<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Str;
class ReferralProgramController extends Controller
{
    public function referralProgram(){
        return view('user-portal.pages.revamp.referral');
    }
}
