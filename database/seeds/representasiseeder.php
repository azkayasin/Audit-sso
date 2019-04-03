<?php

use Illuminate\Database\Seeder;
use App\Representasi;

class representasiseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rep = new representasi;
    	$rep->uraian = 'Rektor dan Wakil Rektor';
    	$rep->satuan = '4';
    	$rep->luar_kota = '250000';
    	$rep->dalam_kota = '125000';
    	$rep->parent = '22';
    	$rep->save();

    	$rep = new representasi;
    	$rep->uraian = 'Sekretaris Institut, Direktur, Kepala Lembaga, Kepala Badan, Dekan, Kepala Kantor, Kepala Biro';
    	$rep->satuan = '4';
    	$rep->luar_kota = '200000';
    	$rep->dalam_kota = '100000';
    	$rep->parent = '22';
    	$rep->save();

    	$rep = new representasi;
    	$rep->uraian = 'Wakil Dekan, Sekretaris Lembaga, Kepala Subdirektorat, Kepala Unit, Kepala Departemen, Kepala Perpustakan, Kepala Bagian ';
    	$rep->satuan = '4';
    	$rep->luar_kota = '150000';
    	$rep->dalam_kota = '75000';
    	$rep->parent = '22';
    	$rep->save();
    }
}
