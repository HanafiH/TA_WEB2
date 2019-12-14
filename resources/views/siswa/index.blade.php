@extends('layouts.master')

@section('title','Home')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Data Siswa</h3>
                        <div class="right">
                            <a href="/siswa/exportexcel" class="btn btn-sm btn-primary">Download Excel</a>
                            <a href="/siswa/exportpdf" class="btn btn-sm btn-primary">Download PDF</a>
                            <button type="button" class="btn">Tambah siswa<i class="lnr lnr-plus-circle" data-toggle="modal" data-target="#exampleModal"></i></button>
                            <!-- Button trigger modal -->
                            
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Agama</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                            </thead>
                            <tbody>
                            @foreach($data_siswa as $siswa)
                            <tr>
                                <td>
                                    <a href="/siswa/{{$siswa->id}}/profile">
                                    {{$siswa->nama}}
                                    </a>
                                </td>
                                <td>{{$siswa->gender}}</td>
                                <td>{{$siswa->agama}}</td>
                                <td>{{$siswa->alamat}}</td>
                                <td>
                                    <a href="/siswa/{{$siswa->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="#" class="btn btn-danger btn-sm delete" siswa_id="{{$siswa->id}}" >Hapus</a>
                                </td>
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


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Siswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form method="post" action="/siswa/store" enctype="multipart/form-data">
                @csrf
                    <div class="form-group {{$errors->has('nama') ? 'has-error' : ''}}">
                        <label for="nama">Nama</label>
                        <input value="{{old('nama')}}" type="text" class="form-control" id="nama" placeholder="Enter nama" name="nama" >
                        @if($errors->has('nama'))
                            <span class="help-block">{{$errors->first('nama')}}</span>
                        @endif
                    </div>
                    <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
                        <label for="email">Email</label>
                        <input value="{{old('email')}}" type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                        @if($errors->has('email'))
                            <span class="help-block">{{$errors->first('email')}}</span>
                        @endif
                    </div>
                    <div class="form-group {{$errors->has('gender') ? 'has-error' : ''}}">
                        <label for="gender">Jenis Kelamin</label>
                        <select class="form-control" id="gender" name="gender">
                        <option value="l" {{old('gender') == 'l' ? 'selected' : ''}}>Laki-Laki</option>
                        <option value="p" {{old('gender') == 'p' ? 'selected' : ''}}>Perempuan</option>
                        </select>
                        @if($errors->has('gender'))
                            <span class="help-block">{{$errors->first('gender')}}</span>
                        @endif
                    </div>
                    <div class="form-group {{$errors->has('agama') ? 'has-error' : ''}}">
                        <label for="agama">Agama</label>
                        <input value="{{old('agama')}}" type="text" class="form-control" id="agama" placeholder="Enter agama" name="agama">
                        @if($errors->has('agama'))
                            <span class="help-block">{{$errors->first('agama')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="avatar">Avatar</label>
                        <input type="file" name="avatar" id="avatar" class="form-control">
                        
                    </div>

                    <div class="form-group ">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3">{{old('alamat')}}</textarea>
                    </div>
                    
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>        
                    <button type="submit" class="btn btn-primary">Submit</button>

                </form>
                </div>
                </div>
            </div>
</div>
@endsection

@section('footer')
<script>
    $('.delete').click(function(){
        var siswa_id = $(this).attr('siswa_id');
        swal({
            title: "Hapus data siswa",
            text: "Mau dihapus data siswa ini?!?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                window.location = "/siswa/" + siswa_id + "/delete";
            } 
        });
    });
</script>
@endsection


