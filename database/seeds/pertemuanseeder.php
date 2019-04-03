<?php

use Illuminate\Database\Seeder;
use App\pertemuan;

class pertemuanseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $temu = new pertemuan;
        $temu->uraian_kegiatan = 'Biaya Paket Kegiatan';
        $temu->satuan = NULL;
        $temu->bruto = NULL;
        $temu->parent = '24';
        $temu->save();

        $temu = new pertemuan;
        $temu->uraian_kegiatan = 'Halfday';
        $temu->satuan = '5';
        $temu->bruto = '300000';
        $temu->parent = '25';
        $temu->save();

        $temu = new pertemuan;
        $temu->uraian_kegiatan = 'Fullday';
        $temu->satuan = '5';
        $temu->bruto = '350000';
        $temu->parent = '25';
        $temu->save();

        $temu = new pertemuan;
        $temu->uraian_kegiatan = 'Fullboard';
        $temu->satuan = '5';
        $temu->bruto = '900000';
        $temu->parent = '25';
        $temu->save();

        $temu = new pertemuan;
        $temu->uraian_kegiatan = 'Uang Harian';
        $temu->satuan = NULL;
        $temu->bruto = NULL;
        $temu->parent = '24';
        $temu->save();

        $temu = new pertemuan;
        $temu->uraian_kegiatan = 'Halfday/Fullday di dalam Kota';
        $temu->satuan = '1';
        $temu->bruto = '100000';
        $temu->parent = '26';
        $temu->save();

        $temu = new pertemuan;
        $temu->uraian_kegiatan = 'Fullboard di dalam Kota';
        $temu->satuan = '1';
        $temu->bruto = '115000';
        $temu->parent = '26';
        $temu->save();

        $temu = new pertemuan;
        $temu->uraian_kegiatan = 'Fullboard di luar Kota';
        $temu->satuan = '1';
        $temu->bruto = '140000';
        $temu->parent = '26';
        $temu->save();

        $temu = new pertemuan;
        $temu->uraian_kegiatan = 'Satuan Biaya Transportasi Kegiatan Dalam Kota (PP)';
        $temu->satuan = '6';
        $temu->bruto = '150000';
        $temu->parent = '27';
        $temu->save();
    }
}
