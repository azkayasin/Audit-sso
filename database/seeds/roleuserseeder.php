<?php

use Illuminate\Database\Seeder;
use App\UserRole;

class roleuserseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new UserRole;
        $role->user_id = '1';
        $role->role_id = '1';
        $role->save();

        $role = new UserRole;
        $role->user_id = '2';
        $role->role_id = '2';
        $role->save();
    }
}
