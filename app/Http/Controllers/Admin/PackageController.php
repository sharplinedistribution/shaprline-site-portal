<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\PackageDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Str;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Packages';
        $data['records'] = Package::with('details')->get();

        return view('admin-portal.pages.packages.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Create Package';
        return view('admin-portal.pages.packages.create', $data);
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
            'name' => 'required|string|max:255',
            'price' => 'required',
            // 'feature' => 'required|string',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $create = Package::create([
            'name' => $request->name,
            'price' => $request->price,
            'status' => $request->status,
        ]);
        if ($create->id) {
            if ($request->feature) {
                foreach ($request->feature as $index => $value) {
                    if (!empty($value)) {
                        $p_create = PackageDetail::create([
                            'package_id' => $create->id,
                            'feature' => $value,
                        ]);
                    }
                }
            }
            return redirect()->route('admin.packages.index')->with('success', 'Package added successfuly!');
        }
        return redirect()->back()->with('error', 'Failed to add package');
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
        $data['title'] = 'Package Edit';
        $data['edit'] = Package::with('details')->where('id', $id)->first();
        if (!empty($data['edit'])) {
            return view('admin-portal.pages.packages.edit', $data);
        }
        return redirect()->route('admin.packages.index')->with('error', 'Package not found!');
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'price' => 'required',

        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $check = Package::where('id', $id)->first();
        if (!empty($check)) {
            $update = $check->update([
                'name' => $request->name,
                'price' => $request->price,
            ]);
        }

        if ($update = 1) {
            if ($request->feature) {
                $old_feature = PackageDetail::where('package_id', $id)->get();
                foreach ($old_feature as $value) {
                    $value->delete();
                }
                foreach ($request->feature as $index => $value) {
                    if (!empty($value)) {
                        $create = PackageDetail::create([
                            'package_id' => $id,
                            'feature' => $value,
                        ]);
                    }
                }
            }
            return redirect()->route('admin.packages.index')->with('success', 'Updated Successfuly');
        }
        return redirect()->back()->with('error', 'Failed to update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $check = Package::where('id', $id)->with('details')->first();
        if (!empty($check)) {
            if (!empty($check->details)) {
                foreach ($check->details as $value) {
                    $value->delete();
                }
            }
            $check->delete();
            return back()->with('success', ' Package deleted');
        }
        return back()->with('success', 'Failed to  delete package');
    }

    public function changeStatus($id)
    {
        $check = Package::where('id', $id)->first();
        if (!empty($check)) {
            if ($check->status == 1) {
                $update = $check->update([
                    'status' => 0,
                ]);
                $message = "Disabled Successfuly";
            } else {
                $update = $check->update([
                    'status' => 1,
                ]);
                $message = "Enabled Successfuly!";
            }
            if ($update = 1) {
                return redirect()->back()->with('success', $message);
            }
            return redirect()->back()->with('error', 'Failed to change status');
        }
        return redirect()->back()->with('error', 'Campaign not found');
    }
}
