<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\People;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $superAdminRole = Role::updateOrCreate(
            ['slug' => 'super-admin'],
            ['name' => 'Super Admin', 'is_super_admin' => true]
        );

        $adminRole = Role::updateOrCreate(
            ['slug' => 'admin'],
            ['name' => 'Admin', 'is_super_admin' => false]
        );

        User::updateOrCreate(
            ['email' => 'imran.molla@gmail.com'],
            [
                'name' => 'Imran Molla',
                'role_id' => $superAdminRole->id,
                'password' => Hash::make('123456'),
            ]
        );

        People::updateOrCreate(
            ['email' => 'citizen@example.com'],
            [
                'name' => 'Demo Citizen',
                'phone' => '01700000000',
                'password' => Hash::make('123456'),
            ]
        );
    }
}
