<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Str;
class BulkReleaseController extends Controller
{
    public function createBulkRelease(){
        return view('user-portal.pages.revamp.bulk-upload');
    }
}
