@extends('layouts.master')

@section('title','Edit Data Siswa')
@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                <div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Edit Data Siswa</h3>
				</div>
				<div class="panel-body">
                <form method="post" action="/siswa/{{$siswa->id}}/update" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input
                            type="text"
                            class="form-control"
                            id="nama"
                            placeholder="Enter nama"
                            name="nama"
                            value="{{$siswa->nama}}">
                    </div>
                    <div class="form-group">
                        <label for="gender">Jenis Kelamin</label>
                        <select class="form-control" id="gender" name="gender">
                            <option value="l" @if($siswa->gender == 'l') selected @endif>Laki-Laki</option>
                            <option value="p" @if($siswa->gender == 'p') selected @endif>Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="agama">Agama</label>
                        <input
                            type="text"
                            class="form-control"
                            id="agama"
                            placeholder="Enter agama"
                            name="agama"
                            value="{{$siswa->agama}}">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3">{{$siswa->alamat}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="avatar">Avatar</label>
                        <input type="file" name="avatar" id="avatar" class="form-control">
                        
                    </div>

                    <button type="submit" class="btn btn-warning">Update</button>

                </form>
				</div>
			</div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('content1')
        <div class="container">
            <div class="row">
                <div class="col">
                    
                </div>
            </div>
        </div>
@endsection