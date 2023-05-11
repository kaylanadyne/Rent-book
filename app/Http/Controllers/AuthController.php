<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{   
    // register
    public function indexRegister(){
        return view('auth.register');
    }

    public function indexBook(){
        return view('dashboard.book');
    }

    public function storeRegister(Request $request){

        $validateData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'no_hp' => 'required',
            'address' => 'required',

        ]);

        $validateData['password'] = bcrypt($validateData['password']);

        User::create($validateData);

        return redirect('/register')->with('success', 'Register berhasil! Silakan lakukan login.');

    }
    // login
    public function indexLogin(){
        return view('auth.login');
    }

    public function auth(Request $request){
        $login = $request->validate([
            'email' =>['required'],
            'password' =>['required']
        ]);

        if(Auth::attempt($login)){
            $request->session()->regenerate();
            if(Auth::user() && Auth::user()->role_id == 1){
                return redirect('/user');
            }
            return redirect('/dashboard');
        }

        return back()->with('loginError', 'Login error!');
    }
    // logout
    public function logout(Request $request){
        Auth::logout();
            request()->session()->invalidate();
            request()->session()->regenerateToken();
        return redirect('/');
    }
    
}
