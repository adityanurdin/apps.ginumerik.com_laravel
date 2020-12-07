<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Setting;

use Auth;
use Validator;
use Hash;
use Arr;

class Installations extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($steps)
    {
        switch ($steps) {
            case 'create-admin-account':
                $wizardID = 1;
                break;
            case 'setup-application':
                $wizardID = 2;
                break;
            case 'finish':
                $wizardID = 3;
                break;
            default:
                return redirect()->route('installations.index', 'create-admin-account');
                break;
        }
        
        $setup = Setting::all();
        return view('installation.setup', compact('steps', 'wizardID', 'setup'));
    }

    public function store(Request $request, $steps)
    {
        if($steps == 'create-admin-account') {

            $validation = Validator::make($request->all(), [
                'name'          => 'string|required',
                // 'email'         => 'unique:users|required',
                'password'      => 'confirmed|required',
            ])->validate();
            

            $input = $request->all();

            $input['email']    = 'admin@ginumerik.com';
            $input['password'] = Hash::make($request->password);
            $input['role']     = 'ADMIN';
            $input['status']   = 'active';

            if (User::create($input)) {
                User::create([
                    'name'      => 'Developer',
                    'email'     => 'dev',
                    'password'  => Hash::make('@DeveloperGIN'),
                    'role'      => 'ADMIN',
                    'status'    => 'active'
                ]);
                return redirect()->route('installations.index', 'setup-application');
            }

        } else if ($steps == 'setup-application') {

            $validation = Validator::make($request->all(), [
                'no_order'        => 'required',
                'secret_code'     => 'required|max:6|min:6',
            ])->validate();

            Setting::create([
                'key'   => 'name',
                'value' => $request->name
            ]);
            Setting::create([
                'key'   => 'no_order',
                'value' => $request->no_order
            ]);
            Setting::create([
                'key'   => 'secret_code',
                'value' => $request->secret_code
            ]);

            return redirect()->route('installations.index', 'finish');
        }
    }
}
