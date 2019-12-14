
<style>
table, td, th {  
  border: 1px solid #ddd;
  text-align: left;
}

table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 15px;
}
</style>

<table class="table">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Agama</th>
            <th>Alamat</th>
            <th>Rata-rata Nilai</th>
        </tr>
    </thead>
    <tbody>
        @foreach($siswa as $s)
        <tr>
            <td>{{$s->nama}}</td>
            <td>{{$s->gender}}</td>
            <td>{{$s->agama}}</td>
            <td>{{$s->alamat}}</td>
            <td>{{$s->getRataRataNilai()}}</td>
        </tr>
        @endforeach
    </tbody>
</table>