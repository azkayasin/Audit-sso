<?php

use Illuminate\Database\Seeder;
use App\dinas_luar;

class dinas_luarseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $luar = new dinas_luar;
    	$luar->negara = 'Amerika Utara';
    	$luar->satuan = NULL;
    	$luar->a = NULL;
    	$luar->b = NULL;
    	$luar->c = NULL;
    	$luar->d = NULL;
    	$luar->parent = '23';
    	$luar->save();

    	$luar = new dinas_luar;
    	$luar->negara = 'Amerika Serikat';
    	$luar->satuan = '4';
    	$luar->a = '578';
    	$luar->b = '513';
    	$luar->c = '440';
    	$luar->d = '382';
    	$luar->parent = '23';
    	$luar->save();

    	$luar = new dinas_luar;
    	$luar->negara = 'Kanada';
    	$luar->satuan = '4';
    	$luar->a = '447';
    	$luar->b = '404';
    	$luar->c = '368';
    	$luar->d = '307';
    	$luar->parent = '23';
    	$luar->save();

    	$luar = new dinas_luar;
    	$luar->negara = 'Amerika Selatan';
    	$luar->satuan = NULL;
    	$luar->a = NULL;
    	$luar->b = NULL;
    	$luar->c = NULL;
    	$luar->d = NULL;
    	$luar->parent = '23';
    	$luar->save();

    	$luar = new dinas_luar;
    	$luar->negara = 'Argentina';
    	$luar->satuan = '4';
    	$luar->a = '534';
    	$luar->b = '402';
    	$luar->c = '351';
    	$luar->d = '349';
    	$luar->parent = '23';
    	$luar->save();

    	$luar = new dinas_luar;
    	$luar->negara = 'Kanada';
    	$luar->satuan = '4';
    	$luar->a = '557';
    	$luar->b = '388';
    	$luar->c = '344';
    	$luar->d = '343';
    	$luar->parent = '23';
    	$luar->save();


    }
}
