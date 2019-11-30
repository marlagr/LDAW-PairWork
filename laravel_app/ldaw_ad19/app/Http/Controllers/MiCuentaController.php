<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class MiCuentaController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $request->user()->authorizeRoles(['Usuario', 'Administrador']);
        
        if($request->user()->hasRole('Administrador')){
            $permisos = DB::select('select DISTINCT Permisos.nombre, Permisos.ruta  from Permisos, rols, rol_permiso WHERE rol_permiso.rol_id = 1 and Permisos.id_permiso = rol_permiso.id_permiso');
        }else{
            $permisos = DB::select('select DISTINCT Permisos.nombre, Permisos.ruta  from Permisos, rols, rol_permiso WHERE rol_permiso.rol_id = 2 and Permisos.id_permiso = rol_permiso.id_permiso');
        }

        $ins = DB::select('select * from Institucion');
        return view('normaluser.miCuenta')->with('ins', $ins)->with('permisos', $permisos);
    }
}
