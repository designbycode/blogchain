<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();


        // Create permissions for posts
        $permissions = [
            'posts-view',
            'posts-create',
            'posts-edit',
            'posts-update',
            'posts-delete',

            'category-view',
            'category-create',
            'category-edit',
            'category-update',
            'category-delete',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Create roles and assign created permissions
        $roleSuperAdmin = Role::create(['name' => 'super-admin']);
        $roleSuperAdmin->givePermissionTo(Permission::all());

        $roleAdmin = Role::create(['name' => 'admin']);
        $roleAdmin->givePermissionTo($permissions);

        $roleModerator = Role::create(['name' => 'moderator']);
        $roleModerator->givePermissionTo([
            'posts-view',
            'posts-edit',
            'posts-update',
        ]);

        $roleGuest = Role::create(['name' => 'guest']);
        $roleGuest->givePermissionTo([
            'posts-view',
        ]);
    }
}
