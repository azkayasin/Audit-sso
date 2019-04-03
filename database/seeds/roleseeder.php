<?php

use Illuminate\Database\Seeder;
use App\Role;

class roleseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $role = new Role;
        $role->nama = 'admin';
        $role->save();

        $role = new Role;
        $role->nama = 'member';
        $role->save();
    }
}
