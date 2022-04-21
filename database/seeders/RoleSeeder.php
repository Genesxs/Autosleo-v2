<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name'=>'Admin']);
        $role2 = Role::create(['name' => 'Cliente']);

        Permission::create(['name'=> 'admin.home'])->assignRole($role1);
        
        Permission::create(['name'=> 'admin.backend.discounts.create'])->assignRole($role1);
        Permission::create(['name'=> 'admin.backend.discounts.edit'])->assignRole($role1);
        Permission::create(['name'=> 'admin.backend.discounts.fields'])->assignRole($role1);
        Permission::create(['name'=> 'admin.backend.discounts.index'])->assignRole($role1);
        Permission::create(['name'=> 'admin.backend.discounts.show_fields'])->assignRole($role1);
        Permission::create(['name'=> 'admin.backend.discounts.show'])->assignRole($role1);
        Permission::create(['name'=> 'admin.backend.discounts.table'])->assignRole($role1);

        Permission::create(['name'=> 'admin.backend.providers.create'])->assignRole($role1);
        Permission::create(['name'=> 'admin.backend.providers.edit'])->assignRole($role1);
        Permission::create(['name'=> 'admin.backend.providers.fields'])->assignRole($role1);
        Permission::create(['name'=> 'admin.backend.providers.index'])->assignRole($role1);
        Permission::create(['name'=> 'admin.backend.providers.show_fields'])->assignRole($role1);
        Permission::create(['name'=> 'admin.backend.providers.show'])->assignRole($role1);
        Permission::create(['name'=> 'admin.backend.providers.table'])->assignRole($role1);

        Permission::create(['name'=> 'admin.backend.services.create'])->assignRole($role1);
        Permission::create(['name'=> 'admin.backend.services.edit'])->assignRole($role1);
        Permission::create(['name'=> 'admin.backend.services.fields'])->assignRole($role1);
        Permission::create(['name'=> 'admin.backend.services.index'])->assignRole($role1);
        Permission::create(['name'=> 'admin.backend.services.show_fields'])->assignRole($role1);
        Permission::create(['name'=> 'admin.backend.services.show'])->assignRole($role1);
        Permission::create(['name'=> 'admin.backend.services.table'])->assignRole($role1);

        Permission::create(['name'=> 'admin.backend.spare_parts.create'])->assignRole($role1);
        Permission::create(['name'=> 'admin.backend.spare_parts.edit'])->assignRole($role1);
        Permission::create(['name'=> 'admin.backend.spare_parts.fields'])->assignRole($role1);
        Permission::create(['name'=> 'admin.backend.spare_parts.index'])->assignRole($role1);
        Permission::create(['name'=> 'admin.backend.spare_parts.show_fields'])->assignRole($role1);
        Permission::create(['name'=> 'admin.backend.spare_parts.show'])->assignRole($role1);
        Permission::create(['name'=> 'admin.backend.spare_parts.table'])->assignRole($role1);

        Permission::create(['name'=> 'admin.backend.trademarks.create'])->assignRole($role1);
        Permission::create(['name'=> 'admin.backend.trademarks.edit'])->assignRole($role1);
        Permission::create(['name'=> 'admin.backend.trademarks.fields'])->assignRole($role1);
        Permission::create(['name'=> 'admin.backend.trademarks.index'])->assignRole($role1);
        Permission::create(['name'=> 'admin.backend.trademarks.show_fields'])->assignRole($role1);
        Permission::create(['name'=> 'admin.backend.trademarks.show'])->assignRole($role1);
        Permission::create(['name'=> 'admin.backend.trademarks.table'])->assignRole($role1);

        Permission::create(['name'=> 'admin.backend.type_services.create'])->assignRole($role1);
        Permission::create(['name'=> 'admin.backend.type_services.edit'])->assignRole($role1);
        Permission::create(['name'=> 'admin.backend.type_services.fields'])->assignRole($role1);
        Permission::create(['name'=> 'admin.backend.type_services.index'])->assignRole($role1);
        Permission::create(['name'=> 'admin.backend.type_services.show_fields'])->assignRole($role1);
        Permission::create(['name'=> 'admin.backend.type_services.show'])->assignRole($role1);
        Permission::create(['name'=> 'admin.backend.type_services.table'])->assignRole($role1);

        Permission::create(['name'=> 'admin.backend.type_vehicles.create'])->assignRole($role1);
        Permission::create(['name'=> 'admin.backend.type_vehicles.edit'])->assignRole($role1);
        Permission::create(['name'=> 'admin.backend.type_vehicles.fields'])->assignRole($role1);
        Permission::create(['name'=> 'admin.backend.type_vehicles.index'])->assignRole($role1);
        Permission::create(['name'=> 'admin.backend.type_vehicles.show_fields'])->assignRole($role1);
        Permission::create(['name'=> 'admin.backend.type_vehicles.show'])->assignRole($role1);
        Permission::create(['name'=> 'admin.backend.type_vehicles.table'])->assignRole($role1);



    }
}
