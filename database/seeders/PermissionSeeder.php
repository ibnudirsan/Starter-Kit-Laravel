<?php

namespace Database\Seeders;


use App\Models\User;
use App\Models\moduleMenu;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid as Generator;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $useradmin = User::whereLevel(1)->first();

        $authorities            = config('module.authorities');

        $listPermission         = [];
        $superAdminPermissions  = [];

        foreach ($authorities as $lable => $permissions) {

            // Add Module Seender
            $module = moduleMenu::create([
                'module_name' => $lable
            ]);

            foreach ($permissions as $permission) {

                $listPermission[] = [
                    'name'          => $permission,
                    'module_id'     => $module->id,
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
        // Super Admin
        $superAdmin = Role::create([
            'name'          => "SuperAdmin",
            'guard_name'    => 'web',
        ]);

        // Role -> Permission
        $superAdmin->givePermissionTo($superAdminPermissions);
        $useradmin->assignRole("SuperAdmin");
    }
}
