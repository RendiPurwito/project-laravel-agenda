<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function postlogin(Request $request){
        // dd($request->all());
        if (Auth::attempt($request->only('email', 'password'))) {
            if (auth()->user()->role =='administrator') {
                return redirect ('adminhome');
            }else{
                return redirect ('home');
            }
        }
        return redirect ('login');
    }

    // public function postlogin(Request $request)
    // {
    //     $input = $request->all();

    //     $this->validate($request, [
    //         'email' => 'required|email',
    //         'password' => 'required',
    //     ]);

    //     if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
    //         if (auth()->user()->role == 'administrator') {
    //             return redirect()->route('admin.home');
    //         } else {
    //             return redirect()->route('home');
    //         }
    //     } else {
    //         return redirect()->route('login')
    //             ->with('error', 'Email-Address And Password Are Wrong.');
    //     }
    // }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }

    public function register(Request $request)
    {
        return view('User.registration');
    }

    public function saveRegister(Request $request)
    {
        // dd($request->all());
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'teacher',
            'remember_token' => Str::random(60)
        ]);
        return view('welcome');
    }
}
