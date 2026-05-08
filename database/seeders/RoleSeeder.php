<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Role::create(['name' => 'admin']);
        Role::create(['name' => 'accountant head']);
        Role::create(['name' => 'admission head']);
        Role::create(['name' => 'accountant officer']);
        Role::create(['name' => 'admission officer']);
        Role::create(['name' => 'student']);
    }
}
