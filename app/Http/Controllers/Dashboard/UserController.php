<?php

/**
 * Welcome to Labs Litecloud.id, Develop your project into The Labs
 * 
 * Start Date : 23/06/2020 22:01
 * Developer  : Muhammad Aditya Nurdin
 * Link       : https://labs.litecloud.id
 * Project    : Internal App for PT. Gaya Instrumentasi Numerik
 */

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;
use App\Models\Biodata;
use DataTables;
Use Alert;
use Validator;
use Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name'          => 'string|required',
            'email'         => 'email|unique:users|required',
            'password'      => 'confirmed|required|min:6',
        ])->validate();

        $request->merge(['password' => Hash::make($request->password)]);
        $user = User::create($request->all());
        if ($user) {
            toast('User created successfully.','success');
            return redirect()->route('users.index');
        } else {
            toast('User created failed.','error');
            return redirect()->route('users.index');
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
        $user = User::with('biodata')->find($id);
        return view('admin.users.edit', compact('user'));
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
        $user = User::find($id);
        $user->update($request->all());

        if ($request->NIK != NULL) {
            $biodata = Biodata::where('user_id',$user->id)->first();
            $biodata->update([
                'NIK' => $request->NIK,
                'tempat_lahir' => $request->tempat_lahir,
                'tgl_lahir' => $request->tgl_lahir,
                'alamat'    => $request->alamat
            ]);
        }
        
        Biodata::create([
            'user_id' => $user->id,
            'NIK'     => $request->NIK,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir'    => $request->tgl_lahir,
            'alamat'       => $request->alamat
        ]);
        
        if ($user) {
            toast('User updated successfully.','success');
            return redirect()->route('users.index');
        } else {
            toast('something wrong, please try again.','error');
            return redirect()->route('users.edit', $id);
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
        $user = User::find($id);
        $user->delete();

        if ($user) {
            return redirect()->route('users.index')
                                ->with('info', 'User deleted successfully.');
        } else {
            return redirect()->route('users.edit', $id)
                                ->with('error', 'something wrong, please try again.');
        }
    }

    /**
     * Return data json for datatables serverside
     */
    public function data()
    {
        $data = User::all();
        return DataTables::of($data)
                            ->addIndexColumn()
                            ->editColumn('name', function($item) {
                                $result = ucfirst($item->name). '<br>';
                                $result .= '<a href='.route('users.edit', $item->id).'>Edit</a> <a href="javascript:void(0)" onclick="myConfirm('.$item->id.')">Delete</a> ';
                                return $result;
                            })
                            ->editColumn('role', function($item) {
                                if ($item->role == 'ADMIN') {
                                    return 'Admin System';
                                } else {
                                    return ucfirst($item->role);
                                }
                            })
                            ->editColumn('status', function($item){
                                return ucfirst($item->status);
                            })
                            ->escapeColumns([])
                            ->make(true);
    }
}
