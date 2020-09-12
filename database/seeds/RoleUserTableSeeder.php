<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class RoleUserTableSeeder extends Seeder
{
    public function run()
    {
        // Admin
        User::findOrFail(1)->roles()->sync(1);

        // Hotel Guest
        User::findOrFail(2)->roles()->sync(2);
    }
}
