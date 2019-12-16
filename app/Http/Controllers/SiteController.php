<?php

namespace App\Http\Controllers;

use App\User;
use App\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SiteController extends Controller
{
    public function home(){
        return view('sites.home');
    }

    public function about(){
        return view('sites.about');
    }
    public function register(){
        return view('sites.register');
    }
    public function postRegister(Request $request){
        //insert table users
        $user = new User;
        $user->role = 'siswa';
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->remember_token = Str::random(60);
        $user->save();

        //insert table siswa
        $request->request->add(['user_id' => $user->id]);
        $siswa = Siswa::create($request->all());

        return redirect('/')->with('sukses'.'Berhasil Daftar');
    }
}
