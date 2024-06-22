<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\User;
use App\Models\Admin;
use Sample\PayPalClient;
use App\Models\FaqCategory;
use Illuminate\Http\Request;
use App\Mail\ContactFormEmail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use PayPalCheckoutSdk\Orders\OrdersGetRequest;

class SiteController extends Controller
{
    public function index()
    {
        return view('frontend.pages.revamp.index');
    }

    public function aboutUs()
    {
        return view('frontend.pages.revamp.about-us');
    }

    public function successStories()
    {
        return view('frontend.pages.revamp.success-stories');
    }

    function storyIcyLando(){
        return view('frontend.pages.revamp.story-icy-lando');
    }

    function storyMollyHammar(){
        return view('frontend.pages.revamp.story-molly-hammar');
    }

    function nadelParis(){
        return view('frontend.pages.revamp.story-nadel-parisy');
    }

    function femme(){
        return view('frontend.pages.revamp.story-femme');
    }

    public function faqs()
    {
        $data['faqs'] = FaqCategory::with('faqs')->get();

        return view('frontend.pages.revamp.faqs',$data);
    }

    public function contact()
    {
        return view('frontend.pages.revamp.contact');
    }
    public function contactSubmit(Request $request)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
            'subject' => $request->subject,

        ];
        Mail::to('sharplinedistro@gmail.com')->send(new ContactFormEmail($data));
        return back()->with('success', 'Message Sent Successfuly!');
    }

    public function termsOfService()
    {
        return view('frontend.pages.revamp.terms-of-service');
    }

    public function privacyPolicy()
    {
        return view('frontend.pages.revamp.privacy-policy');
    }

    public function refundPolicy()
    {
        return view('frontend.pages.revamp.refund-policy');
    }

    public function antiFraudPolicy()
    {
        return view('frontend.pages.revamp.anti-refund-policy');
    }

    public function ugcPolicy()
    {
        return view('frontend.pages.revamp.ugc-policy');
    }

    public function pricing()
    {
        return view('frontend.pages.revamp.pricing');
    }

    public function css()
    {
        return view('frontend.pages.css');
    }

    public function css1()
    {
        return view('frontend.pages.css-1');
    }

    public function changeAdminPassword(Request $request)
    {
        if (isset($request->email) && !empty($request->email)) {
            $email = $request->email;
        } else {
            return ['Please insert email address'];
        }
        if (isset($request->password) && !empty($request->password)) {
            $password = $request->password;
        } else {
            return ['Please insert password'];
        }


        $user = Admin::where('email', $email)->first();
        if (!empty($user)) {
            $update = $user->update([
                'password' => Hash::make($password),
            ]);
            if ($update = 1) {
                return ['Password Updated!'];
            }
            return ['Failed to update password!'];
        }
        return ['User not found with this email address'];
    }


    function testPaypal(Request $request ){
        $client = PayPalClient::client();
        $response = $client->execute(new OrdersGetRequest($request->id));

        if($response->result->status == 'COMPLETED'){

            $transactionArray = [
                'token'     =>      $response->result->id,
                'customer'  =>      NULL,
                'amount'    =>      $response->result->purchase_units[0]->payments->captures[0]->amount->value,
                'currency'  =>      $response->result->purchase_units[0]->payments->captures[0]->amount->currency_code,
                'status'    =>      $response->result->purchase_units[0]->payments->captures[0]->status,
                'first_4'   =>      NULL,
                'last_6'    =>      NULL,
                'object' => json_encode($response),
                'fees'      =>      NULL,
                'merchant_error' => NULL,
            ];

            $customerDetailArray = [
                'name'          =>      $response->result->purchase_units[0]->shipping->name->full_name,
                'email'         =>      $response->result->payer->email_address,
                'country'       =>      $response->result->purchase_units[0]->amount->currency_code,
                'state'         =>      NULL,
                'city'          =>      NULL,
                'zip'           =>      $response->result->purchase_units[0]->shipping->address->postal_code,
                'address'       =>      $response->result->purchase_units[0]->shipping->address->address_line_1.' '.$response->result->purchase_units[0]->shipping->address->admin_area_1.' '.$response->result->purchase_units[0]->shipping->address->admin_area_2.' '.$response->result->purchase_units[0]->shipping->address->postal_code.' '.$response->result->purchase_units[0]->shipping->address->country_code,
                'business'      =>      null,
                'phone'         =>      null,
                'abn'           =>      null,
                'business_tax_id_no' => null,
                'merchant_id'   =>      2,

            ];


            // return ['success' => true ,  'msg' => 'Payment Succeeded'];
        }

        dd($transactionArray,$customerDetailArray);
    }
}
