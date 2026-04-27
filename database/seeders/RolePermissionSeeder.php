<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        $permissions = [
            'create campus',
            'edit campus',
            'create departments',
            'edit departments',
            'create programs',
            'edit programs',
            'create sessions',
            'edit sessions',
            'create fee structure',
            'edit fee structure',
            'delete fee structure',
            'manage roles',
            // Admission related permissions
            'manage applications',
            'analytics review',
            'view reports'
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        $admin = Role::where('name', 'admin')->first();
        if ($admin) {
            $admin->syncPermissions(Permission::all());
        }

        $admission = Role::where('name', 'admission')->first();
        if ($admission) {
            $admission->syncPermissions(['manage applications', 'analytics review', 'view reports']);
        }
    }
}
