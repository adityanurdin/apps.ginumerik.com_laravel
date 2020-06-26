<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;
use Auth;
use Validator;
use Hash;

class AuthController extends Controller
{
    
    public function loginPage()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $remember = $request->remember ? true : false;

        if (Auth::attempt($credentials, $remember)) {
            $user = User::whereEmail($request->email)->first();
            if ($user->status == 'inactive') {
                return redirect()->route('login')
                                ->with('error' , 'Akun anda sudah tidak aktif, silahkan hubungi admin.');
            } else {
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
            'email'         => 'email|unique:users|required',
            'password'      => 'confirmed|required',
            'secret_code'   => 'required|min:6|max:6',
        ])->validate();

        $input = $request->all();

        $input['password'] = Hash::make($request->password);
        $input['role']     = 'guest';
        $input['status']   = 'active';

        if($request->secret_code == env('APP_SECRET_CODE')) {
            if (User::create($input)) {
                return redirect()->route('login')
                                ->with('info', 'User created successfully.');
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
