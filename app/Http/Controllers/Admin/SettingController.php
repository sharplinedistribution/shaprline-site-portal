<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Str;
use App\Models\Setting;
class SettingController extends Controller
{
    public function index(){
        $settings = settings();
        return view('admin-portal.pages.settings.index',compact('settings'));
    }

    public function update(Request $request, $id){
        $settings = settings();
        $settings->update([
            'is_analytic_note' => $request->is_analytic_note,
        ]);
        return redirect()->back()->with('success','Setting Updated');
    }
}
