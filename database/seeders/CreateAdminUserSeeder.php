<?php

namespace Database\Seeders;

use App\Models\group;
use App\Models\park;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Omar Mahgoub',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123456'),
            'role_name'=>'["owner"]',
        ]);

        $role = Role::create(['name' => 'owner']);

        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);

        group::create([
            'g_name'=>'م 1'
        ]);

        for ($i=0 ; $i<=5 ; $i++){
        park::create([
            'p_name'=>'P'.$i,
            'g_id'=>1
        ]);
    }



    }
}
