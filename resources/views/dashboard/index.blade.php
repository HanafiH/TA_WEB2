@extends('layouts.master')

@section('title','Dashborad')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="metric">
                        <span class="icon"><i class="fa fa-user"></i></span>
                        <p>
                            <span class="number">{{getJumlahSiswa()}}</span>
                            <span class="title">Siswa</span>
                        </p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="metric">
                        <span class="icon"><i class="fa fa-user"></i></span>
                        <p>
                            <span class="number">{{getJumlahGuru()}}</span>
                            <span class="title">Guru</span>
                        </p>
                    </div>
                </div>
                
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Ranking Siswa</h3>
                            <div class="right">
                                <button type="button" class="btn"><i class="lnr lnr-plus-circle" data-toggle="modal" data-target="#exampleModal"></i></button>
                                <!-- Button trigger modal -->
                                
                            </div>
                        </div>
                        <div class="panel-body">
                            <table class="table table-hover">
                                <thead>
                                <th>Ranking</th>
                                <th>Nama</th>
                                <th>Rata-rata nilai</th>
                                
                                </thead>
                                <tbody>
                                @foreach(getRanking() as $s)
                                <tr>
                                    <td>1</td>
                                    <td>{{$s->nama}}</td>
                                    <td>{{$s->rataRataNilai}}</td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection