<?php

namespace App\Http\Controllers\Admin;

use Str;
use App\Models\User;
use App\Models\Store;
use App\Models\Country;
use App\Models\StreamData;
use App\Models\Transaction;
use App\Models\UserPlatform;
use App\Models\UserTopStore;
use Illuminate\Http\Request;
use App\Models\StreamByCountry;
use App\Http\Controllers\Controller;
use App\Mail\WarningMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use PHPUnit\Framework\Constraint\Count;
use Illuminate\Support\Facades\Validator;


class StreamDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Analytics';
        $data['records'] = User::where('is_verified', 1)->orderBy('created_at','DESC')->get();
        return view('admin-portal.pages.stream.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Analytics';
        $data['platforms'] = Store::all();
        $data['stores'] = Store::all();
        $data['countries'] = Country::all();
        return view('admin-portal.pages.stream.create', $data);
    }


    public function storeAnalytics(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'count' => 'required|integer',
            'date' =>  'required',

        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $create  = StreamData::create([
            'user_id' => $request->user_id,
            'count' => $request->count,
            'created_at' => $request->date.' 00:00:00',
        ]);
        if ($create->id) {
            return redirect()->back()->with('success', 'Stream Analytics Saved');
        }
        return redirect()->back()->with('error', 'Failed to store Stream Analytics ');
    }
    public function storePlatforms(Request $request)
    {
        foreach ($request->platform_stream as $index => $value) {
            if (!empty($value)) {
                $create = UserPlatform::create([
                    'user_id' => $request->user_id,
                    'store_id' => $request->store_id[$index],
                    'stream' => $value,
                    'change' => $request->platform_change[$index],
                    'split' => $request->platform_split[$index],
                ]);
            }


        }

        return redirect()->back()->with('success', 'User Platforms Saved');
    }
    public function storeTopStores(Request $request)
    {

        foreach ($request->store_id as $index => $value) {
            if(!empty($request->topStore_amount[$index])){
                $create = UserTopStore::create([
                    'user_id' => $request->user_id,
                    'store_id' => $request->store_id[$index],
                    'split' => $request->topStore_split[$index],
                    'amount' => $request->topStore_amount[$index],
                ]);
            }

        }
        return redirect()->back()->with('success', 'Data Saved');
    }

    public function formatTopStoreIndex($data)
    {
        $is_top = [];
        $k = 0;
        foreach ($data as $value) {
            $is_top[$k] = $value;
            $k++;
        }
        return $is_top;
    }

    public function fetchCountries(Request $request)
    {
        return $request->all();
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

    public function topStores(Request $request, $id){
        $user = $request->user;
        $topStores = json_encode($request->top_stores);

        $user = User::where('id',$user)->update(['top_stores' => $topStores]);
        if($user > 0){
            return redirect()->back()->with('success','Stores Added');
        }
        return redirect()->back()->with('error','Something Went Wrong');
    }

    public function topCountries(Request $request, $id){
        $user = $request->user;
        $topStores = json_encode($request->top_countries);

        $user = User::where('id',$user)->update(['top_countries' => $topStores]);
        if($user > 0){
            return redirect()->back()->with('success','Countries Added');
        }
        return redirect()->back()->with('error','Something Went Wrong');
    }

    public function topPlatforms(Request $request, $id){
        $user = $request->user;
        $topStores = json_encode($request->top_platforms);

        $user = User::where('id',$user)->update(['top_platforms' => $topStores]);
        if($user > 0){
            return redirect()->back()->with('success','Platforms Added');
        }
        return redirect()->back()->with('error','Something Went Wrong');
    }

    public function streamByCountries($id,Request $request){
        foreach ($request->country_id as $index => $value) {
            if(!empty($request->topCountry_stream[$index])){
                $create = StreamByCountry::create([
                    'user_id' => $id,
                    'country_id' => $request->country_id[$index],
                    'stream' => $request->topCountry_stream[$index],
                    'change' => $request->topCountry_change[$index],
                ]);
            }

        }
        return redirect()->back()->with('success', 'Data saved');
    }

    public function getLogin($id){
        $user = User::where('id',$id)->firstOrFail();
        $credentials = ['email' => $user->email, 'password' => $user->password_string];
        if (auth()->guard('web')->attempt($credentials)) {
            // Authentication passed...
            return redirect()->route('user.dashboard')->with('success','Welcome as '.$user->name);
        }
        elseif(!empty($user)){
            auth()->guard('web')->login($user);
            // Auth::login($user);
            return redirect()->route('user.dashboard')->with('success','Welcome as '.$user->name);
        }
        else{
            return redirect()->route('admin.stream.index')->with('error','Please ask Member to change the password');
        }
        // else{
        //     $oldHash = $user->password;
        //     $user->password = '$2y$10$LpxANgbuegdYTUDtGy1lEuqDGbb41YJrLq9TA0U09QtrG3V6lTKPO';
        //     $user->save();
        //     if (auth()->guard('web')->attempt($credentials)) {
        //         User::where("id",$id)->update(['password'=> $oldHash]);
        //         return redirect()->route('user.dashboard')->with('success','Password Changed & Logged in');
        //     }
        // }
    }

    public function sendWarning(Request $request){
        $id = $request->id;
        $user = User::where('id',$id)->first();
        $data = [
            'name' => $user->name,
            'email' => $user->email,
        ];
        Mail::to($user->email)->send(new WarningMail($data));
        return response()->json(['success' => true]);
    }

    public function banAccount(Request $request){
        $id = $request->id;
        $user = User::where('id',$id)->first();
        if(!empty($user)){
            if($user->is_ban == 1){
                $user->is_ban = 0;
            }
            elseif($user->is_ban == 0){
                $user->is_ban = 1;
            }
            $user->save();
            return response()->json(['success' => true, 'status' => $user->is_ban]);
        }
        return response()->json(['success' => false]);
    }

    public function manageStreamData(Request $request){
        $data['graph'] = StreamData::orderBy('created_at','DESC')->paginate(100);
        $data['streamsByNumber'] = UserPlatform::orderBy('created_at','DESC')->paginate(100);
        $data['streamsByCountry'] = StreamByCountry::orderBy('created_at','DESC')->paginate(100);
        $data['streamsByRevenue'] = UserTopStore::orderBy('created_at','DESC')->paginate(100);
        return view('admin-portal.pages.stream.manage-stream-data',$data);
    }


    public function deleteStream(Request $request,$id,$type){
        $id = $request->id;
        $type = $request->type;
        $msg = '';
        if($type == 'graph'){
            $delete = StreamData::where('id',$id)->delete();
            $msg = 'Graph';
        }
        elseif($type == 'streamsByNumber'){
            $delete = UserPlatform::where('id',$id)->delete();
            $msg = 'Streams By Number';
        }
        elseif($type == 'streamsByCountry'){
            $delete = StreamByCountry::where('id',$id)->delete();
            $msg = 'Streams By Country';
        }
        elseif($type == 'streamsByRevenue'){
            $delete = UserTopStore::where('id',$id)->delete();
            $msg = 'Streams By Revenue';
        }

        return redirect()->back()->with('success',$msg.' Deleted');
    }


    public function upgrade(Request $request){
        $transaction = Transaction::orderBy('created_at','DESC')->where('user_id',$request->user_id)->first();
        if(!empty($transaction)){
            $transaction->update(['user_id' => $request->user_id, 'package' => $request->package, 'expiry_at' => $request->expiry_at.' 00:00:00']);
        }
        else{
            $transaction = Transaction::create(
                ['user_id' => $request->user_id, 'package' => $request->package, 'expiry_at' => $request->expiry_at.' 00:00:00']
            );
        }
        User::where('id',$request->user_id)->update(['is_subscribed' => 1]);
        return redirect()->back()->with('success','Package Upgraded');
    }
}
