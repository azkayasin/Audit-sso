<?php

use Illuminate\Database\Seeder;
use App\taksi;

class taksiseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $taksi = new taksi;
        $taksi->provinsi = 'Aceh';
        $taksi->satuan = '3';
        $taksi->besaran = '123000';
        $taksi->parent = '29';

        $taksi->save();

        $taksi = new taksi;
        $taksi->provinsi = 'Sumatera Utara';
        $taksi->satuan = '3';
        $taksi->besaran = '232000';
        $taksi->parent = '29';
        $taksi->save();

        $taksi = new taksi;
        $taksi->provinsi = 'Riau';
        $taksi->satuan = '3';
        $taksi->besaran = '94000';
        $taksi->parent = '29';
        $taksi->save();

        $taksi = new taksi;
        $taksi->provinsi = 'Kepulauan Riau';
        $taksi->satuan = '3';
        $taksi->besaran = '137000';
        $taksi->parent = '29';
        $taksi->save();

        $taksi = new taksi;
        $taksi->provinsi = 'Jambi';
        $taksi->satuan = '3';
        $taksi->besaran = '147000';
        $taksi->parent = '29';
        $taksi->save();

        $taksi = new taksi;
        $taksi->provinsi = 'Sumatera Barat';
        $taksi->satuan = '3';
        $taksi->besaran = '190000';
        $taksi->parent = '29';
        $taksi->save();
    }
}
