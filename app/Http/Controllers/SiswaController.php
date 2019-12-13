<?php

namespace App\Http\Controllers;

use App\Mapel;
use App\Siswa;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            // dd($request->search);
            // $data_siswa = Siswa::search($request->search)->get();salah
            $data_siswa = Siswa::where('nama','LIKE','%'.$request->search.'%')->get();
            
        }else{
            $data_siswa = Siswa::all();

        }

        return view('siswa.index',['data_siswa' => $data_siswa]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        // dd($request->all());
        
        $this->validate($request,[
            'nama' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'gender' => 'required',
            'agama' => 'required',
            'avatar' => 'mimes:jpg,png'
        ]);

        //insert table users
        $user = new User;
        $user->role = 'siswa';
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->password = bcrypt('rahasia');
        $user->remember_token = Str::random(60);
        $user->save();

        //insert table siswa
        $request->request->add(['user_id' => $user->id]);
        $siswa = Siswa::create($request->all());
        if($request->hasFile('avatar')){
            $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }

        return redirect('/siswa')->with('sukses','Data berhasil diinput');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $siswa = Siswa::find($id);
        return view('siswa.edit',['siswa' => $siswa]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {  

        $siswa = Siswa::find($id);
        $siswa->update($request->all());
        if($request->hasFile('avatar')){
            $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }

        return redirect('/siswa')->with('sukses','Data berhasil diupdate');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function delete($id){
        $siswa = Siswa::find($id);
        $siswa->delete();
        return redirect('/siswa')->with('sukses','Data berhasil dihapus');
    }

    public function profile($id){
        $siswa = Siswa::find($id);
        $mataPelajaran = Mapel::all();

        $categories = [];
        $dataNilai = [];

        foreach($mataPelajaran as $mpl){
            if($siswa->mapel()->wherePivot('mapel_id',$mpl->id)->first()){
                $categories[] = $mpl->nama;
                $dataNilai[] = $siswa->mapel()->wherePivot('mapel_id',$mpl->id)->first()->pivot->nilai;
            }
        }

        // dd($dataNilai);

        return view('siswa.profile',['siswa' => $siswa, 'mataPelajaran' => $mataPelajaran, 'categories' => $categories, 'dataNilai' => $dataNilai]);
    }

    public function addNilai(Request $request, $idSiswa){
        $siswa = Siswa::find($idSiswa);
        if($siswa->mapel()->where('mapel_id',$request->mapel)->exists()){
            return redirect('/siswa/'.$idSiswa.'/profile')->with('error','data pelajaran sudah ada');
        }

        $siswa->mapel()->attach($request->mapel, ['nilai' => $request->nilai]);

        return redirect('/siswa/'.$idSiswa.'/profile')->with('sukses','data nilai berhasil dimasukkan');
    }
}
