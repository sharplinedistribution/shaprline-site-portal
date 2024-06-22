<?php

namespace App\Http\Controllers\Admin;

use PDF;
use Str;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Release;
use App\Models\Transaction;
use App\Exports\UsersExport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $start_date = Carbon::parse($request->date_from);
        $end_date = Carbon::parse($request->date_to);
        $data['title'] = 'Users List';
        $data['records'] =  User::where('id', '!=', 0);
        if(isset($request->start_date) && isset($request->end_date)){
            $data['records'] = $data['records']->where('created_at', '>=', $request->start_date)->where('created_at','<=', $request->end_date);
        }
        if(isset($request->type)){
            $data['records'] = $data['records']->where('is_subscribed', $request->type);
        }
        $data['records'] = $data['records']->orderBy('created_at','DESC')->get();

        if ($request->search_type == 'export') {
            return Excel::download(new UsersExport($request), date('d-m-Y') . '-customers' . time() . '.xlsx');
        }
        elseif($request->search_type == 'pdf') {
            $pdf = PDF::loadView('admin-portal.pdf.users', $data);
            return $pdf->download(date('d-m-Y') . '-customers' . time() . '.pdf');
        }
        else {
            return view('admin-portal.pages.users.index', $data);
        }

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
        $user = User::where('email',$request->email)->first();
        if(!empty($user)){
            return redirect()->back()->with('error','Email already exist');
        }
        $u = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'name' => $request->first_name.' '.$request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'password_string' => $request->password,
            'email_verified_at' => date('Y-m-d').' 00:00:00',
            'country' => $request->country,
            'is_subscribed' => 1,
            'is_verified' => 1,
        ]);

        $transaction = Transaction::create(
            ['user_id' => $u->id, 'package' => $request->package, 'expiry_at' => $request->expiry_at.' 00:00:00']
        );

        return redirect()->back()->with('success','User Created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['title'] = 'User Details';
        $data['show'] = User::with(['transactions', 'releases', 'campaigns', 'supports','credits','statements'])->where('id', $id)->first();
        if (!empty($data['show'])) {

            $data['subscribtion'] = Transaction::where('user_id', $data['show']->id)->orderby('created_at', 'desc')->first();
            return view('admin-portal.pages.users.show', $data);
        }
        return redirect()->route('admin.users.index')->with('error', 'User not found!');
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

    public function ban($id)
    {
        $user = User::where('id',$id)->first();
        if(!empty($user)){
            $release = Release::where('user_id',$id)->delete();
            $user->delete();
            return redirect()->back()->with('success','User Deleted');
        }
        return redirect()->back()->with('error  ','User not found');

    }

    
}
