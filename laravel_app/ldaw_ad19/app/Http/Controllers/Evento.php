<?php

namespace App;

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;

use App\Rol;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Evento extends Controller
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'Evento';

    protected $fillable = [
        'id', 'titulo_evento', 'descripcion', 'fecha', 'hora', 'sitio', 'ciudad', 'telefono','capacidad_maxima', 'afluencia_actual','costo', 'visible', 'id_estado','id_institucion',
    ];


    
}
