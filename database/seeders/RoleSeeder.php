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
        //
        $admin=Role::create(['name'=>'admin']);
        $user=Role::create(['name'=>'user']);
        ////////////////cuestionario////////////////////////////////////////////////////////////////
        $permission=Permission::create(['name'=>'cuestionario.index'])->syncRoles($admin);
        $permission=Permission::create(['name'=>'cuestionario.create'])->syncRoles($admin);
        $permission=Permission::create(['name'=>'cuestionario.store'])->syncRoles($admin);
        $permission=Permission::create(['name'=>'cuestionario.edit'])->syncRoles($admin);
        $permission=Permission::create(['name'=>'cuestionario.update'])->syncRoles($admin);
        // $permission=Permission::create(['name'=>'cuestionario.destroy'])->assignRole($role);

        ///////////////////categorias////////////////////////////////////////////////////////////////
        $permission=Permission::create(['name'=>'categorias.index'])->syncRoles($admin);
        $permission=Permission::create(['name'=>'categorias.create'])->syncRoles($admin);
        $permission=Permission::create(['name'=>'categorias.store'])->syncRoles($admin);
        $permission=Permission::create(['name'=>'categorias.edit'])->syncRoles($admin);
        $permission=Permission::create(['name'=>'categorias.update'])->syncRoles($admin);
        // $permission=Permission::create(['name'=>'categorias.destroy'])->assignRole($role);

        ///////////////////////videojuego//////////////////////////////////////////////////////////////
        $permission=permission::create(['name'=>'videojuego.index'])->syncRoles($user);
        $permission=permission::create(['name'=>'videojuego.categorias'])->syncRoles($user);
        $permission=permission::create(['name'=>'videojuego.cuestionario'])->syncRoles($user);
    }
}
