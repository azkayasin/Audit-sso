<?php

use Illuminate\Database\Seeder;
use App\Uang;

class uangseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $uang = new uang;
        $uang->detail = 'Satuan biaya uang makan pegawai tetap';
        $uang->satuan = NULL;
        $uang->bruto = NULL;
        $uang->parent = '2';
        $uang->save();

        $uang = new uang;
        $uang->detail = 'golongan IV/ Setara';
        $uang->satuan = '1';
        $uang->bruto = '41000';
        $uang->parent = '16';
        $uang->save();

        $uang = new uang;
        $uang->detail = 'golongan III/Setara';
        $uang->satuan = '1';
        $uang->bruto = '37000';
        $uang->parent = '16';
        $uang->save();

        $uang = new uang;
        $uang->detail = 'golongan II dan I/ Setara';
        $uang->satuan = '1';
        $uang->bruto = '35000';
        $uang->parent = '16';
        $uang->save();

        $uang = new uang;
        $uang->detail = 'satuan biaya lembur';
        $uang->satuan = NULL;
        $uang->bruto = NULL;
        $uang->parent = '2';
        $uang->save();

        $uang = new uang;
        $uang->detail = 'golongan IV/ Setara';
        $uang->satuan = '2';
        $uang->bruto = '25000';
        $uang->parent = '17';
        $uang->save();

        $uang = new uang;
        $uang->detail = 'golongan III/Setara';
        $uang->satuan = '2';
        $uang->bruto = '20000';
        $uang->parent = '17';
        $uang->save();

        $uang = new uang;
        $uang->detail = 'golongan II/ Setara';
        $uang->satuan = '2';
        $uang->bruto = '17000';
        $uang->parent = '17';
        $uang->save();

        $uang = new uang;
        $uang->detail = 'golongan I/Setara';
        $uang->satuan = '2';
        $uang->bruto = '13000';
        $uang->parent = '17';
        $uang->save();

        $uang = new uang;
        $uang->detail = 'Satuan biaya konsumsi penyelenggaraan rapat atau pertemuan lain';
        $uang->satuan = NULL;
        $uang->bruto = NULL;
        $uang->parent = '2';
        $uang->save();

        $uang = new uang;
        $uang->detail = 'Rapat Koordinasi/ Workshop/Seminar/FGD/ Kegiatan Sejenis';
        $uang->satuan = NULL;
        $uang->bruto = NULL;
        $uang->parent = '18';
        $uang->save();

        $uang = new uang;
        $uang->detail = 'makan';
        $uang->satuan = '3';
        $uang->bruto = '44000';
        $uang->parent = '19';
        $uang->save();

        $uang = new uang;
        $uang->detail = 'kudapan';
        $uang->satuan = '3';
        $uang->bruto = '23000';
        $uang->parent = '19';
        $uang->save();

        $uang = new uang;
        $uang->detail = 'Rapat/Kegiatan  Mengundang Pejabat Tingkat   Menteri/Eselon I/ Setara';
        $uang->satuan = NULL;
        $uang->bruto = NULL;
        $uang->parent = '18';
        $uang->save();

        $uang = new uang;
        $uang->detail = 'makan';
        $uang->satuan = '3';
        $uang->bruto = '110000';
        $uang->parent = '20';
        $uang->save();

        $uang = new uang;
        $uang->detail = 'kudapan';
        $uang->satuan = '3';
        $uang->bruto = '49000';
        $uang->parent = '20';
        $uang->save();
    }
}
