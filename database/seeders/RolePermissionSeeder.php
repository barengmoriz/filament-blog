<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();

        DB::table('roles')->delete();
        DB::table('permissions')->delete();

        collect([
            'Category',
            'Category Create',
            'Category Edit',
            'Category Delete',
            'Tag',
            'Tag Create',
            'Tag Edit',
            'Tag Delete',
            'Post',
            'Post Create',
            'Post View',
            'Post Edit',
            'Post Delete',
            'Post Status',
            'Permission',
            'Permission Create',
            'Permission Edit',
            'Permission Delete',
            'Role',
            'Role Create',
            'Role Edit',
            'Role Delete',
            'User',
            'User Create',
            'User Edit',
            'User Delete',
        ])->each(fn ($permissionName) => Permission::create(['name' => $permissionName]));

        Role::create(['name' => 'Super Admin']);
        Role::create(['name' => 'Writer'])->givePermissionTo([
            'Post',
            'Post Create',
        ]);
        Role::create(['name' => 'Editor'])->givePermissionTo([
            'Post',
            'Post Create',
            'Post View',
            'Post Edit',
            'Post Status',
        ]);
    }
}
