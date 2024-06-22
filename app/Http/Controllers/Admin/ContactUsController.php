<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Str;
class ContactUsController extends Controller
{
    public function inquiries(){
        $data['title'] = 'Inquiries';
        $data['records'] = ContactUs::orderBy('created_at','DESC')->get();
        return view('admin-portal.pages.supports.inquiries', $data);
    }
}
