<?php

namespace Database\Seeders;


use App\Models\User;
use App\Models\moduleMenu;
use App\Models\Permission;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid as Generator;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $authorities = config('module.authorities');

        $listPermission = [];
        $superAdminPermissions = [];

        foreach ($authorities as $label => $permissions) {

            // Add Module Sender
            $module = ModuleMenu::create([
                'module_name' => $label,
                'uuid' => (string) Str::uuid(), // Pastikan UUID dihasilkan dengan benar
            ]);

            foreach ($permissions as $permission) {
                $permissionData = [
                    'uuid' => (string) Str::uuid(), // UUID generation
                    'name' => $permission,
                    'module_id' => $module->uuid, // Pastikan modul menggunakan UUID
                    'guard_name' => 'web',
                ];
                
                // Use Permission::create() to handle model events properly
                $createdPermission = Permission::create($permissionData);
                $superAdminPermissions[] = $createdPermission; // Store Permission object
            }
        }

        // Insert Role
        // ----------------------------------------
        // Create SuperAdmin
        $superAdmin = Role::create([
            'uuid' => (string) Str::uuid(),
            'name' => "SuperAdmin",
            'guard_name' => 'web',
        ]);

        // Role -> Permission
        // Make sure to pass the Permission objects directly
        $superAdmin->givePermissionTo($superAdminPermissions);
    }
}
