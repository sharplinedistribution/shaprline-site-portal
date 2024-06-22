<?php

namespace App\Http\Controllers\Auth;

use Mail;
use App\Models\User;
use App\Mail\VerificationMail;
use App\Mail\TrialWelcomeEmail;
use App\Http\Controllers\Controller;
use App\Mail\ReferralMail;
use App\Models\ReferralUser;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:191'],
            'last_name' => ['required', 'string', 'max:191'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'country' => ['required', 'string'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $d = [
            'name' => $data['first_name'].' '.$data['last_name'],
            'email' => $data['email'],
        ];

        // Mail::to($data['email'])->send(new VerificationMail($d));

        $effectiveDate = date('Y-m-d');
        $trialDate = date('Y-m-d h:i:s', strtotime("+31 days", strtotime($effectiveDate)));
        $trial_duration = 31;
        $res = validateReferral(request('memref'));
        if($res == true){
            $trial_duration = 60;
            $trialDate = date('Y-m-d h:i:s', strtotime("+60 days", strtotime($effectiveDate)));
        }

        $user =  User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'name' => $data['first_name'].' '.$data['last_name'],
            'email' => $data['email'],
            'country' => $data['country'],
            'password' => Hash::make($data['password']),
            'password_string' => $data['password'],
            'is_verified' => 1,
            'email_verified_at' => $trialDate,
        ]);

        if($res == true){
            $id = getUserIdByReferralId(request('memref'));
            $ur = ReferralUser::create([
                'user_id' => $user->id,
                'referral_id' => $id,
            ]);
            if(!empty($ur->id)){
                $dat = [
                    'user_name' => $user->name,
                    'referral_name' => getUserNameById($id)->name,
                ];
                Mail::to(getUserNameById($id)->email)->send(new ReferralMail($dat));
            }
        }

        $data['trial_duration'] = $trial_duration;
        Mail::to($data['email'])->send(new TrialWelcomeEmail($data));

        return $user;
    }
}
