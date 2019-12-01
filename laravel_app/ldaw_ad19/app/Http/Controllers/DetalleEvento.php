<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;

class DetalleEvento extends Controller
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

        $id = Input::get('id');
        $evento = DB::select('select * from Evento, Institucion WHERE id= '.$id.' and Evento.id_institucion = Institucion.id_institucion');
        $asistentes = DB::select('select * from `usuario_evento`, Asistentes WHERE usuario_evento.id_evento = '.$id.' and usuario_evento.id_asistente = Asistentes.id');

        return view('admin.Eventos.detalleEvento')->with('evento', $evento)->with('permisos', $permisos)->with('asistentes', $asistentes);
    }
}
