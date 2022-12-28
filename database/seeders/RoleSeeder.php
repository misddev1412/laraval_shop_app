<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'Admin',
                'slug' => Role::ADMIN,
                'text_color' => '#fff',
                'icon' => 'fas fa-user-shield',
            ],
            [
                'name' => 'Editor',
                'slug' => Role::EDITOR,
                'text_color' => '#fff',
                'icon' => 'fas fa-user-edit',
            ],
            [
                'name' => 'User',
                'slug' => Role::USER,
                'text_color' => '#fff',
                'icon' => 'fas fa-user',
            ],
            [
                'name' => 'Super Admin',
                'slug' => Role::SUPER_ADMIN,
                'text_color' => '#fff',
                'icon' => 'fas fa-user-shield',
            ],
            [
                'name' => 'Staff',
                'slug' => Role::STAFF,
                'text_color' => '#fff',
                'icon' => 'fas fa-user-shield',
            ],
            [
                'name' => 'Accountant',
                'slug' => Role::ACCOUNTANT,
                'text_color' => '#fff',
                'icon' => 'fas fa-user-shield',
            ],
            [
                'name' => 'Manager',
                'slug' => Role::MANAGER,
                'text_color' => '#fff',
                'icon' => 'fas fa-user-shield',
            ],
            [
                'name' => 'Marketing',
                'slug' => Role::MARKETING,
                'text_color' => '#fff',
                'icon' => 'fas fa-user-shield',
            ],
            [
                'name' => 'Partner',
                'slug' => Role::PARTNER,
                'text_color' => '#fff',
                'icon' => 'fas fa-user-shield',
            ],
        ];

        foreach ($roles as $role) {
            Role::firstOrCreate($role);
        }

    }
}
