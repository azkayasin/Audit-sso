<?php

use Illuminate\Database\Seeder;
use App\unit;

class unitseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $unit = new unit;
        $unit->nama = 'rektorat';
        $unit->save();

        $unit = new unit;
        $unit->nama = 'ftif';
        $unit->save();

        $unit = new unit;
        $unit->nama = 'fmipa';
        $unit->save();

        $unit = new unit;
        $unit->nama = 'industri';
        $unit->save();

        $unit = new unit;
        $unit->nama = 'informatika';
        $unit->save();

        $unit = new unit;
        $unit->nama = 'elektro';
        $unit->save();

        $unit = new unit;
        $unit->nama = 'mesin';
        $unit->save();

        $unit = new unit;
        $unit->nama = 'biologi';
        $unit->save();

        $unit = new unit;
        $unit->nama = 'kimia';
        $unit->save();
    }
}
