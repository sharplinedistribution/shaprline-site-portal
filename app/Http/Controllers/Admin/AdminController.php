<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin;
use Str;
class AdminController extends Controller
{
    public function index(){
        $data['title'] = 'Admin Management';
        $data['admins'] = Admin::orderBy('created_at','ASC')->get();
        return view('admin-portal.pages.admins.index',$data);
    } 

    public function store(Request $request){
        $admin = Admin::where('email',$request->email)->first();
        if(!empty($admin)){
            return redirect()->back()->with('error','Admin already exist with this email');
        }

        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->password_clear = $request->password;
        $admin->save();

        return redirect()->route('admin.admins.index')->with('success','Admin Created');
    }

    public function edit($id){
        $data['title'] = 'Admin Management';
        $data['admin'] = Admin::where('id',$id)->firstOrFail();
        $data['admins'] = Admin::orderBy('created_at','ASC')->get();
        return view('admin-portal.pages.admins.index',$data);
    }


    public function update(Request $request, $id){
        $admin = Admin::where('id',$id)->firstOrFail();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->password = Hash::make($request->password);
        $admin->password_clear = $request->password;
        $admin->save();
        return redirect()->route('admin.admins.index')->with('success','Admin Updated');
    }


    public function show(Request $request, $id){
        $admin = Admin::where('id',$id)->firstOrFail();
        $admin->delete();
        return redirect()->route('admin.admins.index')->with('error','Admin Deleted');

    }
}
