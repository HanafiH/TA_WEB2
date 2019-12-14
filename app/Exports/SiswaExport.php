<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\WithMapping;

use App\Siswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class SiswaExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Siswa::all();
    }
    public function map($siswa): array
    {
        return [
            $siswa->nama,
            $siswa->gender,
            $siswa->agama,
            $siswa->alamat,
            $siswa->getRataRataNilai()

        ];
    }
    public function headings(): array
    {
        return [
            'Nama',
            'Jenis Kelamin',
            'Agama',
            'Alamat',
            'Nilai rata-rata'
        ];
    }
}
