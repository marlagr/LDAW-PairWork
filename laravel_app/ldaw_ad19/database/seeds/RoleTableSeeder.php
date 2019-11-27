<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Rol();
        $role->nombre = 'Administrador';
        $role->descripcion = 'Encargado de logistica';
        $role->save();

        $role = new Rol();
        $role->nombre = 'Usuario';
        $role->descripcion = 'Usuario asistente';
        $role->save();
    }
}
