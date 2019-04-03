<?php

use Illuminate\Database\Seeder;
Use App\Perjalanan_dinas;

class perjalanan_dinasseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$dinas = new perjalanan_dinas;
    	$dinas->provinsi = 'Aceh';
    	$dinas->satuan = '4';
    	$dinas->luar_kota = '360000';
    	$dinas->dalam_kota = '140000';
    	$dinas->diklat = '110000';
    	$dinas->parent = '21';
    	$dinas->save();

    	$dinas = new perjalanan_dinas;
    	$dinas->provinsi = 'Sumatera Utara';
    	$dinas->satuan = '4';
    	$dinas->luar_kota = '370000';
    	$dinas->dalam_kota = '150000';
    	$dinas->diklat = '110000';
    	$dinas->parent = '21';
    	$dinas->save();

    	$dinas = new perjalanan_dinas;
    	$dinas->provinsi = 'Riau';
    	$dinas->satuan = '4';
    	$dinas->luar_kota = '370000';
    	$dinas->dalam_kota = '150000';
    	$dinas->diklat = '110000';
    	$dinas->parent = '21';
    	$dinas->save();

    	$dinas = new perjalanan_dinas;
    	$dinas->provinsi = 'Kepulauan Riau';
    	$dinas->satuan = '4';
    	$dinas->luar_kota = '370000';
    	$dinas->dalam_kota = '150000';
    	$dinas->diklat = '110000';
    	$dinas->parent = '21';
    	$dinas->save();

    	$dinas = new perjalanan_dinas;
    	$dinas->provinsi = 'Jambi';
    	$dinas->satuan = '4';
    	$dinas->luar_kota = '370000';
    	$dinas->dalam_kota = '150000';
    	$dinas->diklat = '110000';
    	$dinas->parent = '21';
    	$dinas->save();

    	$dinas = new perjalanan_dinas;
    	$dinas->provinsi = 'Sumatera Barat';
    	$dinas->satuan = '4';
    	$dinas->luar_kota = '380000';
    	$dinas->dalam_kota = '150000';
    	$dinas->diklat = '110000';
    	$dinas->parent = '21';
    	$dinas->save();

    	$dinas = new perjalanan_dinas;
    	$dinas->provinsi = 'Sumatera Selatan';
    	$dinas->satuan = '4';
    	$dinas->luar_kota = '380000';
    	$dinas->dalam_kota = '150000';
    	$dinas->diklat = '110000';
    	$dinas->parent = '21';
    	$dinas->save();

    	$dinas = new perjalanan_dinas;
    	$dinas->provinsi = 'Lampung';
    	$dinas->satuan = '4';
    	$dinas->luar_kota = '380000';
    	$dinas->dalam_kota = '150000';
    	$dinas->diklat = '110000';
    	$dinas->parent = '21';
    	$dinas->save();

    	$dinas = new perjalanan_dinas;
    	$dinas->provinsi = 'Bengkulu';
    	$dinas->satuan = '4';
    	$dinas->luar_kota = '380000';
    	$dinas->dalam_kota = '150000';
    	$dinas->diklat = '110000';
    	$dinas->parent = '21';
    	$dinas->save();

    	$dinas = new perjalanan_dinas;
    	$dinas->provinsi = 'Bangka Belitung';
    	$dinas->satuan = '4';
    	$dinas->luar_kota = '380000';
    	$dinas->dalam_kota = '150000';
    	$dinas->diklat = '120000';
    	$dinas->parent = '21';
    	$dinas->save();

    	$dinas = new perjalanan_dinas;
    	$dinas->provinsi = 'Banten';
    	$dinas->satuan = '4';
    	$dinas->luar_kota = '370000';
    	$dinas->dalam_kota = '150000';
    	$dinas->diklat = '110000';
    	$dinas->parent = '21';
    	$dinas->save();
    }
}
