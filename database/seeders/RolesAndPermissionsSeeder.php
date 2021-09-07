<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'view complex']);
        Permission::create(['name' => 'view cladiri']);
        Permission::create(['name' => 'view apartamente']);
        Permission::create(['name' => 'view proprietari']);
        
        $admin = Role::create(['name' => 'admin']);
        $admin->givePermissionTo(Permission::all());
   
        
        $contabil = Role::create(['name' => 'contabil']);
        $contabil->givePermissionTo('view proprietari');


        $agent = Role::create(['name' => 'agent']);
        $agent->givePermissionTo(['view complex', 'view cladiri', 'view apartamente']);

    }
}
