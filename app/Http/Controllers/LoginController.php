<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Agenda;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function register(Request $request)
    {
        return view('User.registration');
    }
    
    public function saveregister(Request $request)
    {
        // dd($request->all());
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'teacher',
            'remember_token' => Str::random(60)
        ]);
        $jumlahmapel = Mapel::count();
        $jumlahguru = Guru::count();
        $jumlahkelas = Kelas::count();
        $jumlahagenda = Agenda::count();
        return view("adminhome", compact('jumlahmapel','jumlahguru', 'jumlahkelas', 'jumlahagenda'));
    }

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

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }

}
