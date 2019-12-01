<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;


class modificarEvento extends Controller
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
            $id = Input::get('id');
            $evento = DB::select('select * from Evento where id ='.$id);
            $permisos = DB::select('select DISTINCT Permisos.nombre, Permisos.ruta  from Permisos, rols, rol_permiso WHERE rol_permiso.rol_id = 1 and Permisos.id_permiso = rol_permiso.id_permiso');
            $estados = DB::select('select id_estado, Nombre from Estado');
            $instituciones = DB::select('select id_institucion, nombre from Institucion');
            return view('admin.Eventos.modificarEvento')->with('instituciones', $instituciones)->with('estados', $estados)->with('permisos', $permisos)->with('evento', $evento);
        }else{
            return redirect('home');
        }
    }

    public function create(Request $request)
    {
        $request->user()->authorizeRoles(['Usuario', 'Administrador']);
        
        if($request->user()->hasRole('Administrador')){
            $id = Input::get('id');

            $titulo_evento = request('titulo_evento');
            $descripcion = request('descripcion');
            $fecha = request('fecha');
            $hora = request('hora');
            $sitio = request('sitio');
            $ciudad = request('ciudad');
            $telefono = request('telefono');
            $capacidad_maxima = request('capacidad_maxima');
            $costo = request('costo');
            $id_estado = request('id_estado');
            $id_institucion = request('id_institucion');

            DB::table('Evento')
                ->where('id', $id)
                ->update(['titulo_evento' => $titulo_evento,'descripcion' => $descripcion, 'fecha' => $fecha, 'hora' => $hora, 'sitio' => $sitio, 'ciudad' => $ciudad, 'telefono' => $telefono, 'capacidad_maxima' => $capacidad_maxima, 'costo' => $costo, 'id_estado' => $id_estado, 'id_institucion' => $id_institucion ]);

            $request->user()->authorizeRoles(['Usuario', 'Administrador']);
            
            if($request->user()->hasRole('Administrador')){
                $permisos = DB::select('select DISTINCT Permisos.nombre, Permisos.ruta  from Permisos, rols, rol_permiso WHERE rol_permiso.rol_id = 1 and Permisos.id_permiso = rol_permiso.id_permiso');
            }else{
                $permisos = DB::select('select DISTINCT Permisos.nombre, Permisos.ruta  from Permisos, rols, rol_permiso WHERE rol_permiso.rol_id = 2 and Permisos.id_permiso = rol_permiso.id_permiso');
            }
            $eventos = DB::select('select * from Evento');
            return view('admin.Eventos.eventos')->with('eventos', $eventos)->with('permisos', $permisos);
        }else{
            return redirect('home');
        }
      
     }
    
}
