<?php

namespace Database\Seeders;

// use App\Models\Permission;
// use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

 class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // $superAdmin = Role::create(['name'=>'Super Admin','guard_name' => 'web' ]);
        // $adminRole = Role::create(['name' => 'Admin','guard_name' => 'web']);
        // $userRole = Role::create(['name' => 'User','guard_name' => 'web']);

$role = Role::create(['name'=>'Suprt Admin','guard_name' => 'web' ]);
        $permissions = Permission::all();

        $role->syncPermissions($permissions);






    }
}
