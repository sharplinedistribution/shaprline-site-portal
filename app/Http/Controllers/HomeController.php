<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\StreamData;
use App\Models\UserPlatform;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return redirect()->route('user.dashboard');
        // return view('home');
    }

    public function dashboard(Request $request)
    {
        $dates = dateRange($request->last_days);
        $start_date = Carbon::parse($dates['start_date']);
        $end_date = Carbon::parse($dates['end_date']);
        $data['platforms'] = UserPlatform::with('store')
                                        ->where('user_id', Auth::user()->id)
                                        ->orderby('created_at', 'desc')
                                        ->get();
        $data['analytics'] = false;
        $data['analytics'] = false;

        $data['graphDataCounts'] = null;
        $data['gdd'] = null;
        $data['graphDataDates'] = null;

        $graphDataCount = StreamData::where('user_id', auth()->user()->id);
                                if($dates['start_date'] && $dates['end_date']){
                                    $graphDataCount = $graphDataCount->where('created_at','<=',$start_date)->where('created_at','>=',$end_date);
                                }
        $graphDataCount = $graphDataCount
                                    // ->orderBy('created_at','DESC')
                                    // ->take(5)
                                    ->pluck('count')
                                    ->toArray();
        // array_reverse($graphDataCount);
        if(!empty($graphDataCount)){
            $data['analytics'] = true;
            $data['graphDataCounts'] = json_encode($graphDataCount);
        }

        $graphDataDate = StreamData::where('user_id', auth()->user()->id);
                                    if($dates['start_date'] && $dates['end_date']){
                                        $graphDataDate = $graphDataDate->where('created_at','<=',$start_date)->where('created_at','>=',$end_date);
                                    }
        $graphDataDate = $graphDataDate
                                    // ->orderBy('created_at','DESC')
                                    // ->take(5)
                                    ->get('created_at');

        if(!empty($graphDataDate)){
            foreach($graphDataDate as $key=>$value){
                $data['gdd'][] = date('d M',strtotime($value->created_at));
            }
            if(!empty($data['gdd'])){
                $data['graphDataDates'] = json_encode(array_reverse($data['gdd']));
            }
            else{
            }
            $data['graphDataDates'] = json_encode($data['gdd']);
        }
        $data['streamAnalyticsCount'] = StreamData::where('user_id', auth()->user()->id)
                    ->sum('count');




        $result[] = ['Date',$data['streamAnalyticsCount'].' Streams'];
        if(!empty($data['graphData'])){
            foreach ($data['graphData'] as $key => $value) {
                $data['analytics'] = true;
                $result[++$key] = [date('Y-m-d',strtotime($value->created_at)), (int)$value->count];
            }

            $data['chart'] = json_encode($result);
        }
        else{

            $data['chart'] = null;
        }
        // return view('user-portal.pages.dashboard', $data);
        return view('user-portal.pages.revamp.dashboard',$data);
    }

    public function top($slug){
        $data['slug']  = ucwords(str_replace('-',' ',$slug));
        if($data['slug'] == 'Streams By Number'){
            $data['new_slug'] = 'Top Performing DSPs';
        }
        elseif($data['slug'] == 'Streams By Country'){
            $data['new_slug'] = 'Top Performing Countries';
        }
        elseif($data['slug'] == 'Streams By Revenue'){
            $data['new_slug'] = 'Revenue Analytics';
        }
        elseif($data['slug'] == 'Top Performing Releases'){
            $data['new_slug'] = 'Top Performing Releases';
        }
        return view('user-portal.pages.revamp.top',$data);
    }


    public function royaltySplits(){
        return view('user-portal.pages.revamp.royalty-splits');
    }

    public function freeVideodistribution(){
        return view('user-portal.pages.revamp.free-video-distributon');
    }
}
