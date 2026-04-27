<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            // RolePermissionSeeder::class,
            AdminUserSeeder::class,
            GeneralSettingSeeder::class,
            AdmissionLevelSeeder::class,
        ]);
    }
}
// $this->middleware('role:admin|supervisor')->only('index');
