<?php

namespace App\Http\Controllers;

use App\Mail\ReferralCreditMail;
use Exception;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Credit;
use App\Models\Package;
use Sample\PayPalClient;
use App\Models\Transaction;
use Cartalyst\Stripe\Stripe;
use Illuminate\Http\Request;
use App\Mail\VerificationMail;
use App\Mail\SubscriptionEmail;
use App\Mail\TrialWelcomeEmail;
use Illuminate\Support\Facades\Mail;
use PayPalCheckoutSdk\Orders\OrdersGetRequest;
use Cartalyst\Stripe\Exception\CardErrorException;


class SubscribeController extends Controller
{
    public function subscription()
    {
        $data['packages'] = Package::with('details')->orderBy('sort','ASC')->get();
        return view('frontend.pages.subscribe', $data);
    }

    public function subscribe($package)
    {
        $check = Package::with('details')->where('name', $package)->first();
        $price = $check->price;
        $package = $check->name;
        return view('frontend.pages.pay', compact('package', 'price'));
    }

    public function paymentDetails($package, Request $request)
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
            'address_country' => $request->country,
            'address_state' => null,
            'address_city' => $request->city,
            'address_zip' => $request->zip_code,
            'address_line1' => $request->address,
        ];

        try {
            $token = $stripe->tokens()->create([
                'card' => $credit_card,
            ]);
            $customer = $stripe->customers()->create(
                array(
                    "description" => "Sharp Line - Package " . strtolower($check->name),
                    "source" => $token['id'],
                )
            );
            $charge_data = [
                'amount' => $price,
                'currency' => 'USD',
                'description' => "Sharp Line - Package " . strtolower($check->name),
                'capture' => true,
                'statement_descriptor' => 'Sharp Line',
                'customer' => $customer['id'],
                'metadata' => [
                    'receipt_email' => auth()->user()->email,
                    'customer_name' => $request->name,
                    'package' => strtolower($check->name),
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
                'country' => $request->country,
                'city' => $request->city,
                'zip' => $request->zip_code,
                'address' => $request->address,
                'user_id' => auth()->user()->id,
                'package' => strtolower($check->name),
                'merchant_id' => 1,
                'expiry_at' => $expiry_at,
                'package_id' => $check->id,
            ];
            $store = Transaction::create($transactionDetail);
            if (!empty($store->id)) {
                $user = User::where('id', auth()->user()->id)->first();
                if (!empty($user)) {
                    $user->update(['is_subscribed' => 1]);
                    $content =  "Thank You For Choosing Sharpline Distro As Your Music Distribution & Marketing Partner. You have upgraded your account to the {$check->name} plan.";
                    $package_name = $check->name;
                    $price  = $store->amount;
                    $data = [
                        'name' => $user->first_name . ' ' . $user->last_name,
                        'price' => $price,
                        'package_name' => $package_name,
                        'content' => $content,

                    ];
                    Mail::to(auth()->user()->email)->send(new SubscriptionEmail($data));
                }
            }

            $res = validateReferralCredit();
            if(!empty($res)){
                $credits = 0;
                if(ucwords($package) == 'Starters'){
                    $credits = 3;
                }
                elseif(ucwords($package) == 'Artists'){
                    $credits = 10;
                }
                elseif(ucwords($package) == 'Labels'){
                    $credits = 15;
                }
                Credit::create([
                    'amount' => $credits,
                    'date' => date('Y-m-d'),
                    'user_id' => $res->referral_id,
                    'added_by' => auth()->user()->id,
                    'description' => 'Referral credit points '
                ]);

                $data = [
                    'referral_name' => $res->referral->name,
                    'user_name' => auth()->user()->name,
                    'credits' => $credits,
                ];

                Mail::to($res->referral->email)->send(new ReferralCreditMail($data));

                $res->delete();
            }
            return ['success' => true,  'msg' => 'Package Purchased'];
        } catch (Exception $e) {
            return ['success' => false,  'msg' => $e->getMessage()];
        }
    }

    public function thankYou()
    {
    }

    public function payWithPaypal(Request $request){
        $response = $request->response;
        $package = Package::where('name',$request->package)->first();
        // $client = PayPalClient::client();
        // $response = $client->execute(new OrdersGetRequest($request->id));
        // if($response->statusCode = 200){
            try {
                $expiry_at = getExpiryDate();
                $transactionDetail = [
                    'token' => $response['orderID'],
                    'customer_id' => NULL,
                    'amount' => $package->price,
                    'currency' => 'USD',
                    'status' => 'succeed',
                    'first_4' => NULL,
                    'last_6' => NULL,
                    'object' => json_encode($response),
                    'name' => NULL,
                    'email' => NULL,
                    'country' => NULL,
                    'city' => NULL,
                    'zip' => NULL,
                    'address' => NULL,
                    'user_id' => auth()->user()->id,
                    'package' => strtolower($request->package),
                    'merchant_id' => 2,
                    'expiry_at' => $expiry_at,
                    'package_id' => 0,
                ];
                $store = Transaction::create($transactionDetail);
                if (!empty($store->id)) {
                    $user = User::where('id', auth()->user()->id)->first();
                    if (!empty($user)) {
                        $user->is_subscribed  = 1;
                        $user->save();
                        $content =  "Thank You For Choosing Sharpline Distro As Your Music Distribution & Marketing Partner. You have upgraded your account to the {$request->package} plan.";
                        $package_name = $request->package;
                        $price  = $package->price;
                        $data = [
                            'name' => auth()->user()->first_name . ' ' . auth()->user()->last_name,
                            'price' => $price,
                            'package_name' => $package_name,
                            'content' => $content,

                        ];
                        Mail::to(auth()->user()->email)->send(new SubscriptionEmail($data));
                    }
                }

                return ['success' => true,  'msg' => 'Package Purchased'];
            } catch (Exception $e) {
                return ['success' => false,  'msg' => $e->getMessage()];
            }
        // }
    }


    public function verification(Request $request){
        return view('frontend.pages.verification');
    }

    public function accountBan(Request $request){
        return view('frontend.pages.accountBan');
    }
    public function blockRelease(Request $request){
        return view('frontend.pages.blockRelease');
    }

    public function verificationProcess(Request $request){
        $email = $request->email;
        $user = User::where('email',$email)->firstOrFail();
        if($user->is_verified == 1){
            return redirect('/')->with('success','Account is already verified');
        }
        $user->is_verified = 1;
        $effectiveDate = date('Y-m-d');
        $user->email_verified_at = date('Y-m-d h:i:s', strtotime("+1 months", strtotime($effectiveDate)));
        $user->save();
        $data = [
            'email' => 'qasiminayat93@gmail.com',
        ];
        Mail::to($email)->send(new TrialWelcomeEmail($data));

        return redirect()->route('user.dashboard')->with('success','Your email address is now verified.');
    }


    public function resendVerification(Request $request){

        $email = $request->email;
        $user = User::where('email',$email)->firstOrFail();
        if($user->is_verified == 1){
            return redirect()->back()->with('success','Account is already verified');
        }

        $d = [
            'name' => $user->first_name.' '.$user->last_name,
            'email' => $user->email,
        ];

        Mail::to($user->email)->send(new VerificationMail($d));

        return redirect()->back()->with('success','Email has been sent');
    }

}
