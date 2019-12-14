<?php

namespace App\Http\Controllers;

use App\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function profile($idGuru){
        $guru = Guru::find($idGuru);
        return view('guru.profile',['guru' => $guru]);
    }
}
