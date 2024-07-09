<?php

namespace App\Http\Controllers;

use Str;
use App\Models\User;
use App\Models\Release;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class BulkReleaseController extends Controller
{
    public function createBulkRelease()
    {
        return view('user-portal.pages.revamp.bulk-upload');
    }

    public function show()
    {
        $id = Session::put('release_id');
        $user = User::findOrFail(auth()->user()->id); // Retrieve the authenticated user
        $release_data = Release::findOrFail($id); // Retrieve the release by its ID
        return view('user-portal.pages.revamp.releases.artist-show', compact('user', 'release_data'));
    }
}
