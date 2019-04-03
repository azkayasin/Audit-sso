<?php

use Illuminate\Database\Seeder;
use App\dinas_mahasiswa;
class dinas_mahasiswaseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $siswa = new dinas_mahasiswa;
        $siswa->jenis_perjalanan = 'Perjalanan dalam negeri';
        $siswa->uang_harian = '200000';
        $siswa->biaya_penginapan = '7';
        $siswa->biaya_transport = '7';
        $siswa->parent = '28';
        $siswa->save();

        $siswa = new dinas_mahasiswa;
        $siswa->jenis_perjalanan = 'Perjalanan luar negeri';
        $siswa->uang_harian = '400000';
        $siswa->biaya_penginapan = '7';
        $siswa->biaya_transport = '7';
        $siswa->parent = '28';
        $siswa->save();
    }
}
