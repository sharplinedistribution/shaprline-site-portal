<?php

namespace App\Http\Controllers;

use Str;
use App\Models\Bank;
use App\Models\BankDetail;
use Illuminate\Http\Request;
use App\Models\PayoutRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Banks List';
        $data['bank'] = BankDetail::where('user_id', Auth::user()->id)->first();
        $data['records'] = BankDetail::with('user')->orderby('created_at', 'desc')->get();
        return view('user-portal.pages.banks.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Add Bank';
        $data['bank'] = Bank::where('user_id', auth()->user()->id)->first();
        $data['pending'] = PayoutRequest::where('user_id',auth()->user()->id)->where('status',0)->sum('amount');
        $data['completed'] = PayoutRequest::where('user_id',auth()->user()->id)->where('status',1)->sum('amount');
        
        // return view('user-portal.pages.banks.create', $data);
        return view('user-portal.pages.revamp.payout.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'bank_name' => 'required',
            'account_holder' => 'required',
            'account_number' => 'required',
            'iban' => 'required',
            'bank_country' => 'required',
            'bank_street' => 'required',
            'street' => 'required',
            'country' => 'required',
            'routing_number' => 'required',

        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $create = BankDetail::create([
            'user_id' => Auth::user()->id,
            'bank_name' => $request->bank_name,
            'account_holder' => $request->account_holder,
            'account_number' => $request->account_number,
            'iban' => $request->iban,
            'switf_code' => $request->switf_code,
            'bank_country' => $request->bank_country,
            'bank_location' => $request->bank_location,
            'bank_street' => $request->bank_street,
            'bank_zip_code' => $request->bank_zip_code,
            'bank_password' => $request->bank_password,
            'street' => $request->street,
            'zip_code' => $request->zip_code,
            'location' => $request->location,
            'country' => $request->country,
            'routing_number' => $request->routing_number,
        ]);
        if ($create->id) {
            return redirect()->route('user.payout.payout')->with('success', 'Successfuly Created');
        }
        return redirect()->back()->with('error', 'Failed to create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['title'] = 'Bank Details';
        $data['show'] = BankDetail::with('user')->where('id', $id)->first();
        return view('user-portal.pages.banks.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['title'] = 'Edit Bank Details ';
        $data['edit'] = BankDetail::where('id', $id)->first();
        if (!empty($data['edit'])) {
            return view('user-portal.pages.banks.edit', $data);
        }
        return redirect()->route('user.banks.index')->with('error', 'Bank not found!');
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
        $validator = Validator::make($request->all(), [
            'bank_name' => 'required',
            'account_holder' => 'required',
            'account_number' => 'required',
            'iban' => 'required',
            'bank_country' => 'required',
            'bank_street' => 'required',
            'street' => 'required',
            'country' => 'required',
            'routing_number' => 'required',

        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $check = BankDetail::where('id', $id)->first();
        if (empty($check)) {
            return redirect()->back()->with('error', 'Bank Not Found');
        }
        $update = $check->update([
            'bank_name' => $request->bank_name,
            'account_holder' => $request->account_holder,
            'account_number' => $request->account_number,
            'iban' => $request->iban,
            'switf_code' => $request->switf_code,
            'bank_country' => $request->bank_country,
            'bank_location' => $request->bank_location,
            'bank_street' => $request->bank_street,
            'bank_zip_code' => $request->bank_zip_code,
            'bank_password' => $request->bank_password,
            'street' => $request->street,
            'zip_code' => $request->zip_code,
            'location' => $request->location,
            'country' => $request->country,
            'routing_number' => $request->routing_number,
        ]);
        if ($update = 1) {
            return redirect()->route('user.payout.payout')->with('success', 'Successfuly Updated');
        }
        return redirect()->back()->with('error', 'Failed to update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $check = BankDetail::where('id', $id)->first();
        if (!empty($check)) {
            $check->delete();
            return redirect()->route('user.banks.index')->with('success', 'Deleted Successfuly');
        }
        return redirect()->route('user.banks.index')->with('error', 'Failed to delete');
    }


    public function storeBank(Request $request){
        $method = $request->method;
        $bank = Bank::where('user_id', auth()->user()->id)->first();
        $except = $request->except(['_token','method','amount']);
        $validate = PayoutRequest::where('user_id',auth()->user()->id)->where('status',0)->count();
        if($request->amount >  currentStatus(auth()->user()->id)){
            return redirect()->back()->with('error','Insufficient Balance');
        }
        if($request->amount < 100){
            return redirect()->back()->with('error','Minimal Withdrawal Limit Is $100');
        }
        if($validate > 0){
            return redirect()->back()->with('error','There is already a payout request initiated by your account. Please wait for it.');
        }
        if(!empty($bank)){
            $bank->update([
                $method => json_encode($except),
            ]);
            if(!empty($bank)){
                $payout = PayoutRequest::create([
                    'method' => $method,
                    'amount' => $request->amount,
                    'date' => date('Y-m-d'),
                    'user_id' => auth()->user()->id,
                    ]);
                return redirect()->back()->with('Success','Payment Request Sent To Sharpline Distro. You Will Receive A Confirmation Email Within 24 Hours');
            }
        }
        else{
            $store = Bank::create([
                'user_id' => auth()->user()->id,
                $method => json_encode($except)
            ]);
            if(!empty($store->id)){
                $payout = PayoutRequest::create([
                    'method' => $method,
                    'amount' => $request->amount,
                    'date' => date('Y-m-d'),
                    'user_id' => auth()->user()->id,
                ]);
                return redirect()->back()->with('success','Added Successfully');
            }
        }
        return redirect()->back()->with('error','Something Went Wrong');
    }
}
