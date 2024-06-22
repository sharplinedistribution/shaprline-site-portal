<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Statement;
use App\Models\StatementExcel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Str;

class StatementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Statements List';
        // $data['records'] = Statement::where('user_id', Auth::user()->id)->orderby('created_at', 'desc')->get();
        $data['users']  = User::all();
        return view('admin-portal.pages.statements.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Create Statement';
        $data['statements']= Statement::where('user_id', request()->user)->get();
        return view('admin-portal.pages.statements.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'statement_month' => 'required',
            'collection_start_date' => 'required',
            'collection_end_date' => 'required',
            // 'csv' => 'required',
            // 'pdf' => 'required',

        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if ($request->pdf) {
            $pdf  = $request->file('pdf');
            $pdf_name = "pdf_" . rand(100,9999) . '.' . $pdf->getClientOriginalExtension();
            $pdf->move(config('upload_path.pdf'), $pdf_name);
        }
        $create = Statement::create([
            'user_id' => $request->user_id,
            'statement_month' => $request->statement_month,
            'release_date' => $request->release_date,
            'collection_start_date' => $request->collection_start_date,
            'collection_end_date' => $request->collection_end_date,
            'csv' => null,
            'pdf' => isset($pdf_name) && !empty($pdf_name) ? $pdf_name : null,
        ]);
        if ($create->id) {
            if (!empty($request->csv)) {
                foreach($request->csv as $index=>$excel){
                    $csv  = $excel;
                    $csv_name = "CSV_" . rand(100,9999) . '.' . $csv->getClientOriginalExtension();
                    $csv->move(config('upload_path.csv'), $csv_name);

                    $storeCSV = StatementExcel::create([
                        'name' => $csv_name,
                        'file' => $csv_name,
                        'user_id' => $request->user_id,
                        'statement_id' => $create->id
                    ]);
                }

            }
            return redirect()->back()->with('success', 'Successfuly Created');
        }
        return redirect()->back()->with('error', 'Failed to create');
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
    public function assignUser()
    {
    }
}
