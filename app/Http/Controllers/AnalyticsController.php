<?php

namespace App\Http\Controllers;

use Str;
use Carbon\Carbon;
use App\Models\StreamData;
use App\Models\UserPlatform;
use App\Models\UserTopStore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AnalyticsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
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
                                    // ->take(5)
                                    ->pluck('count')
                                    ->toArray();
        if(!empty($graphDataCount)){
            $data['analytics'] = true;
            $data['graphDataCounts'] = json_encode($graphDataCount);
        }

        $graphDataDate = StreamData::where('user_id', auth()->user()->id);
                                    if($dates['start_date'] && $dates['end_date']){
                                        $graphDataDate = $graphDataDate->where('created_at','<=',$start_date)->where('created_at','>=',$end_date);
                                    }
        $graphDataDate = $graphDataDate
                                    // ->take(5)
                                    ->get('created_at');
        if(!empty($graphDataDate)){
            foreach($graphDataDate as $key=>$value){
                $data['gdd'][] = date('d M',strtotime($value->created_at));
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
        // return view('user-portal.pages.analytics.index', $data);
        return view('user-portal.pages.revamp.analytics.index',$data);
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
}
