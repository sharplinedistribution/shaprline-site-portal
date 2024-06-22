<?php

namespace App\Http\Controllers\Admin;

use App\Models\Bank;
use App\Models\User;
use App\Models\Debit;
use App\Models\Credit;
use Illuminate\Http\Request;
use App\Models\PayoutRequest;
use App\Http\Controllers\Controller;

class PayoutController extends Controller
{
    public function addCredit(){
        $users = User::orderBy('created_at', 'desc')->get();
        return view('admin-portal.pages.payout.add-credit',compact('users'));
    }

    public function storeCredit(Request $request){
        $user = User::where('id',$request->id)->first();
        if(!empty($user)){
            $credit = Credit::create([
                'amount' => $request->amount,
                'date' => date('Y-m-d'),
                'user_id' => $request->id,
                'added_by' => getAdminAuth()->id,
            ]);
            if(!empty($credit)){
                return response()->json(['success' => true, 'msg' => 'Balance Added to '.$user->name]);
            }
            return response()->json(['success' => false, 'msg' => 'Amount not added to '.$user->name]);
        }
        return response()->json(['success' => false, 'msg' => 'Something Went Wrong']);

    }

    public function creditDetail(){
        $creditDetails = Credit::orderBy('created_at','DESC')->get();
        return view('admin-portal.pages.payout.credit-balance-details',compact('creditDetails'));
    }

    public function requests(){
        $requests = PayoutRequest::orderBy('created_at','desc')->get();
        return view('admin-portal.pages.payout.payout-requests',compact('requests'));
    }

    public function payoutDetails($id){
        $payout = PayoutRequest::where('id', $id)->firstOrFail();
        $bank = Bank::where('user_id',$payout->user_id)->first();
        return view('admin-portal.pages.payout.payout-details',compact('payout','bank'));
    }

    public function completePayout(Request $request){
        $payout = PayoutRequest::where('id',$request->id)->first();
        if(!empty($payout)){
            $debit = Debit::create([
                'amount' => $payout->amount,
                'date' => date('Y-m-d'),
                'user_id' => $payout->user_id,
                'bank_id' => $payout->bank_id,
                'completed_by' => getAdminAuth()->id,
            ]);
            if(!empty($debit)){
                PayoutRequest::where('id', $request->id)->update(['status' => 1, 'approved_at' => date('Y-m-d')]);
                return response()->json(['success' => true, 'msg' => 'Amount Debited Successfully ']);
            }
            return response()->json(['success' => false, 'msg' => 'Something Went Wrong ']);
        }
        return response()->json(['success' => false, 'msg' => 'Something Went Wrong']);
    }

}
