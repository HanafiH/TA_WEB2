<?php

namespace App\Http\Controllers;

use App\Siswa;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function editNilai(Request $request,$idSiswa){
        $siswa = Siswa::find($idSiswa);
        $siswa->mapel()->updateExistingPivot($request->pk, ['nilai' => $request->value]);
        
    }
}
