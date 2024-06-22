<?php

namespace App\Http\Controllers\Admin;

use Str;
use App\Models\User;
use App\Mail\UnSubMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Unsub;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Exception;

class UnsubscribedUserController extends Controller
{
    public function index(){
        $data['title'] = 'Un Subscribe Users';
        $data['users'] = User::where('is_subscribed', '!=', 1)->get();
        return view('admin-portal.pages.unsub-users.index',$data);
    }

    public function sendEmailUnSub(Request $request){
        $ids = $request->ids;
        if(count($ids) > 0){
            $users = User::whereIn('id',$ids)->get();
            if(!empty($users)){
                foreach($users as $index=>$user){
                    $data = [
                        'name' => $user->name,
                    ];
                    try{
                        Mail::to($user->email)->send(new UnSubMail($data));
                        $storeLog = Unsub::create([
                            'user_id' => $user->id,
                        ]);
                    }
                    catch(Exception $e){
                    }
                }
                return response()->json(['success' => true]);
            }
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false]);
    }

    public function emailLogs(Request $request){
        $user = User::where('id',$request->id)->first('name');
        $logs = Unsub::where('user_id', $request->id)->get();
        if(!empty($logs)){
            $view = view('admin-portal.pages.unsub-users.email-logs',compact('logs','user'));
            return response()->json(['success' => true, 'content' => $view->render()]);
        }
        return response()->json(['success' => false]);
    }
}
