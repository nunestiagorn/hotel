<?php

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{
    public function run()
    {
        // Todas as permissões
        $admin_permissions = Permission::all();
        Role::findOrFail(1)->permissions()->sync($admin_permissions->pluck('id'));
        
        // Só criar e deletar(cancelar) reserva
        $hotel_guest_permissions = [32, 35];
        Role::findOrFail(2)->permissions()->sync($hotel_guest_permissions);
    }
}
