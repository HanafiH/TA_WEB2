@extends('layouts.master')

@section('title','Profil Data Siswa')

@section('content')
<div class="main">

<!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="panel panel-profile">
                <div class="clearfix">
                    <!-- LEFT COLUMN -->
                    <div class="profile-left">

                        <!-- PROFILE HEADER -->
                        <div class="profile-header">
                            <div class="overlay"></div>
                            <div class="profile-main">
                                <img style="max-width:100px" src="{{$siswa->getAvatar()}}" class="img-circle" alt="Avatar">
                                <h3 class="name">{{$siswa->nama}}</h3>
                                <span class="online-status status-available">Available</span>
                            </div>
                            <div class="profile-stat">
                                <div class="row">
                                    <div class="col-md-4 stat-item">
                                        {{$siswa->mapel->count()}} <span>Mata Pelajaran</span>
                                    </div>
                                    <div class="col-md-4 stat-item">
                                        15 <span>Awards</span>
                                    </div>
                                    <div class="col-md-4 stat-item">
                                        2174 <span>Points</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END PROFILE HEADER -->

                        <!-- PROFILE DETAIL -->
                        <div class="profile-detail">
                            <div class="profile-info">
                                <h4 class="heading">Data Diri</h4>
                                <ul class="list-unstyled list-justify">
                                    <li>Jenis Kelamin <span>{{$siswa->gender}}</span></li>
                                    <li>Agama <span>{{$siswa->agama}}</span></li>
                                    <li>Alamat <span>{{$siswa->alamat}}</span></li>
                                    
                                </ul>
                            </div>
                            
                            
                            <div class="text-center"><a href="/siswa/{{$siswa->id}}/edit" class="btn btn-warning">Edit Profile</a></div>
                        </div>
                        <!-- END PROFILE DETAIL -->
                    </div>
                    <!-- END LEFT COLUMN -->

                    <!-- RIGHT COLUMN -->
                    <div class="profile-right">
                        
                    <div class="panel">
                    @if(session('sukses'))
                        <div class="alert alert-success">
                            {{session('sukses')}}
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{session('error')}}
                        </div>
                    @endif
                         <!-- Button trigger modal -->
                         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Tambah Nilai
                            </button>
                        <div class="panel-heading">
                           
                            <h3 class="panel-title">Mata Pelajaran</h3>
                        </div>
                        <div class="panel-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Kode</th>
                                        <th>Nama</th>
                                        <th>Semester</th>
                                        <th>Nilai</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($siswa->mapel as $mapel)
                                    <tr>
                                        <td>{{$mapel->kode}}</td>
                                        <td>{{$mapel->nama}}</td>
                                        <td>{{$mapel->semester}}</td>
                                        <td>{{$mapel->pivot->nilai}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    </div>
                    <!-- END RIGHT COLUMN -->
                </div>
            </div>

        </div>
    </div>
    <!-- END MAIN CONTENT -->
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Nilai</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="/siswa/{{$siswa->id}}/addnilai" enctype="multipart/form-data">
        @csrf
            <div class="form-group {{$errors->has('mapel') ? 'has-error' : ''}}">
                <label for="mapel">Mata Pelajaran</label>
                <select class="form-control" id="mapel" name="mapel">
                @foreach($mataPelajaran as $mpl)
                <option value="{{$mpl->id}}" >{{$mpl->nama}}</option>
                @endforeach
                </select>
                @if($errors->has('mapel'))
                    <span class="help-block">{{$errors->first('mapel')}}</span>
                @endif
            </div>

            <div class="form-group {{$errors->has('nilai') ? 'has-error' : ''}}">
                <label for="nilai">Nilai</label>
                <input value="{{old('nilai')}}" type="text" class="form-control" id="nilai" placeholder="Enter nilai" name="nilai" >
                @if($errors->has('nilai'))
                    <span class="help-block">{{$errors->first('nilai')}}</span>
                @endif
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection