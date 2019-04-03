<?php

use Illuminate\Database\Seeder;
use App\Satuan;

class satuanseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $satuan = new satuan;
        $satuan->satuan = 'Orang/Hari';
      	$satuan->save();

      	$satuan = new satuan;
        $satuan->satuan = 'Orang/Jam';
      	$satuan->save();

	    $satuan = new satuan;
        $satuan->satuan = 'Orang/Kali';
      	$satuan->save();      	

    }
}
