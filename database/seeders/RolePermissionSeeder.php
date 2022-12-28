<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\RolePermission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::all()->each(function ($permission) {
            if (RolePermission::where('role_id', Role::where('slug', Role::SUPER_ADMIN)->first()->id)->where('permission_id', $permission->id)->count() == 0) {
                Role::where('slug', Role::SUPER_ADMIN)->first()->permissions()->attach($permission);
            }
        });
    }
}
