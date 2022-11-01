<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'settings',
            'groups-list',
            'groups-add',
            'groups-show',
            'groups-edit',
            'groups-delete',
            'park-list',
            'park-add',
            'park-show',
            'park-edit',
            'park-delete',
            'users-management',
            'customers',
            'customers-list',
            'customers-add',
            'customers-subscript',
            'customers-edit',
            'customers-delete',
            'reports',

        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
