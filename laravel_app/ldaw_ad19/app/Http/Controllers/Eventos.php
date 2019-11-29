<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class Eventos extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $eventos = DB::select('select * from Evento');
        return view('admin.Eventos.eventos')->with('eventos', $eventos);
    }
}
