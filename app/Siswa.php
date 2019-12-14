<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    protected $fillable = [
        'nama','gender','agama','alamat','avatar','user_id'
    ];

    public function getAvatar(){
        if(!$this->avatar){
            return asset('images/default.jpg');
        }
        return asset('images/'.$this->avatar);
    }

    public function mapel(){
        return $this->belongsToMany(Mapel::class)->withPivot(['nilai']);
    }

    public function getRataRataNilai(){
        If($this->mapel->isNotEmpty()){
            $total = 0;
            $hitung =0;
            foreach($this->mapel as $mapel){
                $total += $mapel->pivot->nilai;
                $hitung++;
            }
            return $total/$hitung;
        }else{
            return 0;
        }
    }
}
