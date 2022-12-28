<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (UserRole::where('user_id', User::first()->id)->count() == 0) {
            User::first()->roles()->attach(Role::where('slug', Role::SUPER_ADMIN)->first());
        }
    }
}
