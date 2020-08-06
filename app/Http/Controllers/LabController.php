<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MsLab;

class LabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $labs = MsLab::all();
        return view('admin.labs.index', compact('labs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.labs.create_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $labs = MsLab::create($request->all());
        if ($labs) {
            toast('Sub Lab created successfully.','success');
            return redirect()->route('labs.index');
        }
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
        $labs = MsLab::findOrFail($id);
        return view('admin.labs.create_edit', compact('labs'));
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
        $labs = MsLab::findOrFail($id);
        $labs->update($request->all());
        if ($labs) {
            toast('Sub Lab updated successfully.','success');
            return redirect()->route('labs.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $labs = MsLab::findOrFail($id);
        $labs->delete();
        if ($labs) {
            return response()->json([
                'status' => 200
            ],200);
        } else {
            return response()->json([
                'status' => 500
            ],500);
        }
    }
}
