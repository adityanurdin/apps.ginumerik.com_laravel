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
use Dit;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('admin.users.index', compact('request'));
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
            'email'         => 'unique:users|required',
            'password'      => 'confirmed|required|min:6',
        ])->validate();

        $request->merge(['password' => Hash::make($request->password), 'email' => $request->email.'@ginumerik.com']);
        $user = User::create($request->all());
        if ($user) {
            Dit::Log(1,'Membuat user '.$user->name, 'Success');
            toast('User created successfully.','success');
            return redirect()->route('users.index');
        } else {
            Dit::Log(0,'Membuat user '.$user->name, 'Error');
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
        $username = explode('@', $user->email);
        $username = $username[0];
        
        return view('admin.users.edit', compact('user', 'username'));
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
            Dit::Log(1,'Mengedit user '.$user->name, 'Success');
            toast('User updated successfully.','success');
            return redirect()->route('users.index');
        } else {
            Dit::Log(0,'Mengedit user '.$user->name, 'Error');
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
            Dit::Log(1,'Menghapus user '.$user->name, 'Success');
            return redirect()->route('users.index')
                                ->with('info', 'User deleted successfully.');
        } else {
            Dit::Log(0,'Menghapus user '.$user->name, 'Error');
            return redirect()->route('users.edit', $id)
                                ->with('error', 'something wrong, please try again.');
        }
    }

    /**
     * Return data json for datatables serverside
     */
    public function data(Request $request)
    {
        $data = User::query();

        if ($request->has('year')) {
            $data->whereYear('created_at', $request->year);
        }

        return DataTables::of($data->get())
                            ->addIndexColumn()
                            ->editColumn('name', function($item) {
                                $result = ucfirst($item->name). '<br>';
                                $result .= '<a href='.route('users.edit', $item->id).'>Edit</a> <a href="javascript:void(0)" onclick="myConfirm('.$item->id.')">Delete</a> ';
                                return $result;
                            })
                            ->editColumn('role', function($item) {
                                // if ($item->role == 'ADMIN') {
                                //     return 'Admin System';
                                // } else {
                                //     return ucfirst($item->role);
                                // }
                                return $item->sub_role;
                            })
                            ->editColumn('status', function($item){
                                if ($item->status === 'inactive') {
                                    $status = 'Non Active';
                                } else {
                                    $status = 'Active';
                                }
                                return $status;
                            })
                            ->escapeColumns([])
                            ->make(true);
    }
}
