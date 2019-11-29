<?php

namespace App\Http\Controllers\Auth;

use DB;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Rol;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
    protected $instituciones;
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
       
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        return Validator::make($data, [
            'name' => ['required', 'string', 'max:30'],
            'apellido_paterno' => ['required', 'string', 'max:25'],
            'apellido_materno' => ['required', 'string', 'max:25'],
            'edad' => ['required', 'numeric', 'max:25'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:Asistentes'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'ciudad' => ['required', 'string', 'max:30'],
            'id_institucion' => ['required', 'numeric', 'max:30'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'apellido_paterno' => $data['apellido_paterno'],
            'apellido_materno' => $data['apellido_materno'],
            'edad' => $data['edad'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'ciudad' => $data['ciudad'],
            'id_institucion' => $data['id_institucion'],
        ]);

        $user->roles()->attach(Rol::where('nombre', 'Administrador')->first());

        return $user; 

        
     }

      /**
     * Getting Instituciones from database
     * esta es la funcion que se cncenta con el register blade
     * 
     * 
     */

    public function showRegistrationForm()
    {
        $instituciones = DB::select('select id_institucion, nombre from Institucion');
        return view('auth.register')->with('instituciones', $instituciones);   
    }
}
