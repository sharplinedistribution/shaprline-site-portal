<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Support;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Str;

class SupportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Support';
        $data['records'] = Support::with('user')->get();
        return view('admin-portal.pages.supports.index', $data);
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
        $data['title'] = 'Campaign Details';
        $data['show'] =  Support::where('id', $id)->with('user')->first();
        return view('admin-portal.pages.supports.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Support::where('id',$id)->firstOrFail();
        $data->delete();
        return redirect()->back()->with('error','Deleted successfully');
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
    public function changeStatus(Request $request)
    {
        $check = Support::where('id', $request->id)->first();
        if (!empty($check)) {
            if ($check->status == 1) {
                $update = $check->update([
                    'status' => 0,
                    'is_accepted_by_admin' => 0,
                    'accepted_date' => null,
                    'remarks' => isset($request->remarks) && !empty($request->remarks) ? $request->remarks : null,
                ]);
                $message = "Marked as Pending";
            } else {
                $update = $check->update([
                    'status' => 1,
                    'is_accepted_by_admin' => 1,
                    'accepted_date' => Carbon::now()->toDateString(),
                    'remarks' => isset($request->remarks) && !empty($request->remarks) ? $request->remarks : null,
                ]);
                $message = "Marked as Completed";
            }
            if ($update = 1) {
                return response()->json(['success' => true, 'message' => $message]);
            }
            return response()->json(['success' => false, 'message' => 'Failed to change status']);
        }
        return response()->json(['success' => false, 'message' => 'Record not found']);
    }
}
