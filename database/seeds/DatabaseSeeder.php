<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	$this->call([
    		roleseeder::class,
    		roleuserseeder::class,
    		masterseeder::class,
    		satuanseeder::class,
    		uangseeder::class,
            perjalanan_dinasseeder::class,
            representasiseeder::class,
            dinas_luarseeder::class,
            pertemuanseeder::class,
            dinas_mahasiswaseeder::class,
            taksiseeder::class,
            unitseeder::class,
            template_summernote::class,
    	]);
    }
}
