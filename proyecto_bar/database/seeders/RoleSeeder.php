<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $admin=Role::create(['name'=>'Admin']);
        $encargado=Role::create(['name'=>'Encargado']);
        $cliente=Role::create(['name'=>'Cliente']);


        Permission::create(['name'=>'home'])->syncRoles([$admin,$encargado]);

        Permission::create(['name'=>'preferencias.index'])->syncRoles([$cliente, $admin]) ;
        Permission::create(['name'=>'preferencias.create'])->syncRoles([$cliente]);
        Permission::create(['name'=>'preferencias.edit'])->syncRoles([$cliente]);
     
    }
}
