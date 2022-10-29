<?php

namespace Database\Seeders;


use App\Models\User;
use App\Models\moduleMenu;
use App\Models\Permission;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Ramsey\Uuid\Uuid as Generator;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $authorities    = config('module.authorities');

        $listPermission         = [];
        $superAdminPermissions  = [];

        foreach ($authorities as $lable => $permissions) {

            // Add Module Seender
            $module = moduleMenu::create([
                'module_name' => $lable
            ]);

            foreach ($permissions as $permission) {

                $listPermission[] = [
                    'uuid'          => str_replace('-', '', Generator::uuid4()->toString()),
                    'name'          => $permission,
                    'module_id'     => $module->uuid,
                    'guard_name'    => 'web',
                ];
                // SuperAdmin
                $superAdminPermissions[] = $permission;
            }
        }

        // Insert Permission
        Permission::insert($listPermission);

        // Insert Role
        // ----------------------------------------
        // Create SuperAdmin
        $superAdmin = Role::create([
            'uuid'          => str_replace('-', '', Generator::uuid4()->toString()),
            'name'          => "SuperAdmin",
            'guard_name'    => 'web',
        ]);

        // Role -> Permission
        $superAdmin->givePermissionTo($superAdminPermissions);
    }
}
