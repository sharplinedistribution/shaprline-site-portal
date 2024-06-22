<?php

namespace App\Http\Controllers;

use App\Models\Credit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BankDetail;
use App\Models\PayoutRequest;

class PayoutController extends Controller
{
    public function creditBalance()
    {
        $credit = Credit::where('user_id', auth()->user()->id)->orderBy('created_at', 'DESC')->get();
        // return view('user-portal.pages.payout.add-credit', compact('credit'));
        return view('user-portal.pages.revamp.payout.add-credit',compact('credit'));
    }

    public function payout()
    {
        $data['title'] = 'Payout';
        $data['bank'] = BankDetail::where('user_id', auth()->user()->id)->orderby('created_at', 'desc')->first();
        $data['statement']  = PayoutRequest::where('user_id', auth()->user()->id)->orderBy('created_at', 'DESC')->get();

        return view('user-portal.pages.payout.payout', $data);
    }

    public function request(Request $request)
    {
        $bank_id = $request->id;
        $amount = $request->amount;

        $store = PayoutRequest::create([
            'bank_id' => null,
            'amount' => $amount,
            'date' => date('Y-m-d'),
            'user_id' => auth()->user()->id,
            'bank_id' => $bank_id,
        ]);

        if (!empty($store)) {
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false]);
    }
    // public function payout(){
    //     $data['title']  = "Payout";
    //     return view('user-portal.pages.payout.payout', $data);
    // }
}
