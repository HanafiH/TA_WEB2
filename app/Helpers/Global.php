<?php

use App\Siswa;
use App\Guru;

function getRanking(){
    $siswa = Siswa::all();
    $siswa->map(function($s){
        $s->rataRataNilai = $s->getRataRataNilai();
        return $s;
    });
    $siswa = $siswa->sortByDesc('rataRataNilai');
    return $siswa;
}

function getJumlahSiswa(){
    return Siswa::count();
}

function getJumlahGuru(){
    return Guru::count();
}


?>