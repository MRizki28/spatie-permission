<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'user']);

        // Membuat izin
        $getData = Permission::create(['name' => 'get-data']);
        $createPostPermission = Permission::create(['name' => 'create-post']);
        $editPostPermission = Permission::create(['name' => 'edit-post']);
        $deletePostPermission = Permission::create(['name' => 'delete-post']);

        // Menetapkan izin ke peran
        $adminRole->givePermissionTo([$createPostPermission, $editPostPermission, $deletePostPermission]);
        $userRole->givePermissionTo($getData);
    }
}
