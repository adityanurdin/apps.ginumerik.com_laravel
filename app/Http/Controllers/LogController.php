<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Log;
use DataTables;
use Arr;
use Dit;

class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.logs.index');
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
        $log = Log::create($request->all());

        if ($log) {
            $result = [
                'status' => true,
                'msg'    => 'Success create logs',
                'data'   => $log
            ];
            $code   = 200;
        } else {
            $result = [
                'status' => false,
                'msg'    => 'Failed create logs',
                'data'   => $log
            ];
            $code   = 500;
        }
        
        return response()->json($result, $code);
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

    public function data()
    {
        $log = Log::with('user')->get();

        return Datatables::of($log)
                    ->addIndexColumn()
                    ->editColumn('created_at', function($item) {
                        return date('d-M-y h:i', strtotime($item->created_at));
                    })
                    ->editColumn('status_log', function($item) {
                        return ucfirst($item->status_log);
                    })
                    ->escapeColumns([])
                    ->make(true);
    }
}
