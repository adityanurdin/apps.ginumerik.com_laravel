<?php

/**
 * Welcome to Labs Litecloud.id, Develop your project into The Labs
 * 
 * Start Date : 23/06/2020 22:01
 * Developer  : Muhammad Aditya Nurdin
 * Link       : https://labs.litecloud.id
 * Project    : Internal App for PT. Gaya Instrumentasi Numerik
 */

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Setting;

use App\User;
use Auth;
use Validator;
use Hash;
use Dit;

class AuthController extends Controller
{
    
    public function loginPage()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $new_mail    = $request->email.'@ginumerik.com';
        $credentials = [
            'email' => $new_mail,
            'password' => $request->password
        ];
        
        $remember = $request->remember ? true : false;

        if (Auth::attempt($credentials, $remember)) {
            $user = Auth::user();
            if ($user->status === 'inactive') {
                Dit::Log(0,'Mencoba login, user status inactive.', 'Error');
                Auth::logout();
                return redirect()->route('login')
                                ->with('error' , 'Akun anda sudah tidak aktif, silahkan hubungi admin.');
            } else {
                Dit::Log(1,'Berhasil login ke dashboard', 'Success');
                alert()->image('PT GAYA INSTRUMENTASI NUMERIK','Selamat datang',asset('assets/img/logo-gin.png'),'250','250');
                return redirect()->route('dashboard.index');
            }
        } else {
            return redirect()->route('login')
                                ->with('error' , 'Email atau Password salah !');
        }
    }

    public function registerPage()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name'          => 'string|required',
            'email'         => 'unique:users|required',
            'password'      => 'confirmed|required',
            'secret_code'   => 'required|min:6|max:6',
        ])->validate();

        $input = $request->all();

        $input['email']    = $request->email.'@ginumerik.com';
        $input['password'] = Hash::make($request->password);
        $input['role']     = 'guest';
        $input['status']   = 'active';

        $setting = Setting::where('key', 'secret_code')->first();
        if($request->secret_code == $setting->value) {
            if (User::create($input)) {
                $credentials = $request->only('email', 'password');
                if(Auth::attempt($credentials)) {
                    toast('User register successfully.','success');
                    return redirect()->route('dashboard.index');
                } else {
                    return redirect()->route('login')
                                    ->with('info', 'User created successfully.');
                }
            } else {
                return redirect()->route('register')
                                ->with('error', 'User created failed, please try again leter.');
            }
        } else {
            return redirect()->route('register')
                                ->with('error', 'User created failed, Secret Code is invalid.');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')
                            ->with('info', "Thank you for today's work.");
    }

}
