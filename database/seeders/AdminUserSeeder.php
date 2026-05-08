<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Super Admin',
            'email' => 'admin.super@riphah.edu.pk',
            'mobile' => null,
            'password' => Hash::make('password'),
            'role' => 1,
        ]);
        if (! $user->hasRole('admin')) {
            $user->assignRole('admin');
        }

        $user = User::create([
            'name' => 'Accountant Head',
            'email' => 'admin.finance@riphah.edu.pk',
            'mobile' => null,
            'password' => Hash::make('password'),
            'role' => 2,
        ]);
        if (! $user->hasRole('accountant head')) {
            $user->assignRole('accountant head');
        }


        $user = User::create([
            'name' => 'Admission Head',
            'email' => 'admin.admission@riphah.edu.pk',
            'mobile' => null,
            'password' => Hash::make('password'),
            'role' => 3,
        ]);
        if (! $user->hasRole('admission head')) {
            $user->assignRole('admission head');
        }
    }
}
