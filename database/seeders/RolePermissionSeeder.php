<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Enums\RoleEnum;
use App\Enums\PermissionEnum;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Teams enabled — set the team context first (team 1).
        app(\Spatie\Permission\PermissionRegistrar::class)->setPermissionsTeamId(1);

        // Create roles from the enum
        foreach (RoleEnum::cases() as $roleCase) {
            Role::firstOrCreate(['name' => $roleCase->value]);
        }

        // Create permissions from the enum
        foreach (PermissionEnum::cases() as $permissionCase) {
            Permission::firstOrCreate(['name' => $permissionCase->value]);
        }

        // Give the superadmin role every permission
        $superadmin = Role::where('name', RoleEnum::SUPERADMIN->value)->first();
        $superadmin->givePermissionTo(Permission::all());

        // Create a superadmin user and assign the role
        $user = User::firstOrCreate(
            ['email' => 'admin@admin.com'],
            [
                'name' => 'Test User',
                'password' => bcrypt('admin123!'),
            ]
        );
        $user->assignRole(RoleEnum::SUPERADMIN->value);
    }
}