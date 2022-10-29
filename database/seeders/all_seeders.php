<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class all_seeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //make Admin Account
        $admin = new Admin();
        $admin->create([
            'name'=>'Omar Mahgoub',
            'user_name'=>'admin',
            'password'=>bcrypt('123456')
        ]);
    }
}
