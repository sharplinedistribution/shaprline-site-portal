<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Transaction;
use App\Models\User;
use Cartalyst\Stripe\Exception\CardErrorException;
use Cartalyst\Stripe\Stripe;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Str;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {


        $data['title'] = 'My Account ';
        $data['user'] = User::where('id', Auth::user()->id)->first();
        $data['payments']  = Transaction::where('user_id', Auth::user()->id)->orderby('created_at', 'desc')->get();
        $data['latest_package'] = Transaction::where('user_id', Auth::user()->id)->orderby('created_at', 'desc')->first();


        return view('user-portal.pages.accounts.edit', $data);
    }
    public function editMyAccount()
    {
        $data['title'] = 'My Account ';
        $data['user'] = User::where('id', Auth::user()->id)->first();
        $data['payments']  = Transaction::where('user_id', Auth::user()->id)->orderby('created_at', 'desc')->get();
        $data['latest_package'] = Transaction::where('user_id', Auth::user()->id)->orderby('created_at', 'desc')->first();


        // return view('user-portal.pages.accounts.edit', $data);
        return view('user-portal.pages.revamp.account.edit',$data);
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

    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required|string',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $user = User::where('id', Auth::user()->id)->first();

        if (!empty($user)) {

            if (Hash::check($request->old_password, $user->password)) {
                $update = $user->update([
                    'password' => Hash::make($request->password),
                ]);
                if ($update = 1) {
                    return redirect()->back()->with('success', 'Password Updated Successfuly');
                }
                return redirect()->back()->with('error', 'Failed to update password');
            }
            return back()->with('error', 'Old password does not match');
        }
    }

    public function renewplans()
    {
        $data['title'] = 'Subscription ';
        $data['user'] = User::with('transactions')->where('id', Auth::user()->id)->first();
        $data['packages'] = Package::with('details')->where('status',1)->orderBy('sort','ASC')->get();
        return view('user-portal.pages.accounts.plans', $data);
    }
    public function paymentplan($package)
    {
        $data['title'] = 'Renew Subscription ';
        $data['user'] = User::with('transactions')->where('id', Auth::user()->id)->first();
        $package = Package::where('name', $package)->first();
        $data['package_name'] = strtolower($package->name);
        $data['price']  = $package->price;
        return view('user-portal.pages.accounts.payment', $data);
    }
    public function renewPlan(Request $request, $package)
    {
        $check = Package::with('details')->where('name', $package)->first();
        $price = $check->price;
        $expArr = explode('/', $request->card_expiry);
        $cardExpiryMonth = isset($expArr[0]) ? $expArr[0] : 0;
        $cardExpiryYear = isset($expArr[1]) ? $expArr[1] : 0;
        $stripe = Stripe::make(env('STRIPE_SECRET'));
        $cardNumber = str_replace("-", "", $request->card_number);
        $first4 = substr($cardNumber, 0, 4);
        $last6 = substr($cardNumber, -6);
        $credit_card = [
            'number' => $cardNumber,
            'name' => $request->name,
            'exp_month' => $cardExpiryMonth,
            'exp_year' => $cardExpiryYear,
            'cvc' => $request->card_cvc,
            'address_country' => $request->hometown,
            'address_state' => null,
            'address_city' => null,
            'address_zip' => null,
            'address_line1' => null,
        ];
        try {
            $token = $stripe->tokens()->create([
                'card' => $credit_card,
            ]);
            $customer = $stripe->customers()->create(
                array(
                    "description" => "Sharp Line - Package " . $package,
                    "source" => $token['id'],
                )
            );
            $charge_data = [
                'amount' => $price,
                'currency' => 'USD',
                'description' => "Sharp Line - Package " . $package,
                'capture' => true,
                'statement_descriptor' => 'Sharp Line',
                'customer' => $customer['id'],
                'metadata' => [
                    'receipt_email' => auth()->user()->email,
                    'customer_name' => $request->name,
                    'package' => $package,
                ],
            ];
            $charge_object = $stripe->charges()->create($charge_data);
            $obj = json_encode($charge_object);
        } catch (CardErrorException $e) {
            return ['success' => false,  'msg' => $e->getMessage()];
        }

        try {
            $expiry_at = getExpiryDate();
            $transactionDetail = [
                'token' => $charge_object['id'],
                'customer_id' => $charge_object['customer'],
                'amount' => $charge_object['amount'] / 100,
                'currency' => $charge_object['currency'],
                'status' => $charge_object['status'],
                'first_4' => $first4,
                'last_6' => $last6,
                'object' => $obj,
                'name' => $request->name,
                'email' => auth()->user()->email,
                'country' => auth()->user()->hometown,
                'user_id' => auth()->user()->id,
                'package' => $package,
                'merchant_id' => 1,
                'expiry_at' => $expiry_at,
                'package_id' => $check->id,
            ];
            $store = Transaction::create($transactionDetail);
            if (!empty($store->id)) {
                User::where('id', auth()->user()->id)->update(['is_subscribed' => 1]);
            }

            // Mail::to(auth()->user()->email)->send(new SubscriptionMail($details));
            return ['success' => true,  'msg' => 'Package Purchased'];
        } catch (Exception $e) {
            return ['success' => false,  'msg' => $e->getMessage()];
        }
    }
}
