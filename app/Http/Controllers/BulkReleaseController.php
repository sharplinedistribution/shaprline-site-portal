<?php

namespace App\Http\Controllers;

use App\Models\Release;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Str;

class BulkReleaseController extends Controller
{
    public function createBulkRelease()
    {
        return view('user-portal.pages.revamp.bulk-upload');
    }

    public function show()
    {
        $user = User::findOrFail(auth()->user()->id); // Get ths user
        // $release_data = Release::where('user_id', $user->id)->latest()->first(); // Get tge lastest release of that user
        $release_data = Release::find($user); // Get the releases of that user
        return view('user-portal.pages.revamp.releases.artist-show', compact('user', 'release_data'));
    }
}
