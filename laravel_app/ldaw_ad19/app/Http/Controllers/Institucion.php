<?php
namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class Institucion extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }
    /*public function showRegistrationForm()
    {
        $instituciones = Institucion::all();
        return view('auth.register')->with('instituciones', $instituciones);
    }*/
}
