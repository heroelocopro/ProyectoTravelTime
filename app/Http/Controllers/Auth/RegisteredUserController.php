<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\roles;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Dotenv\Validator as DotenvValidator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Validation\Validator as ValidationValidator;
use Illuminate\Http\Client\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Illuminate\Validation\Rules;
use PHPUnit\Util\Xml\Validator as XmlValidator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => 'el campo :attribute  es obligatorio.',
            'unique' => 'el campo :attribute ya esta en uso',
            'confirmed' => 'la contraseña no es identica',
            'email' => 'el email no es correcto o el tipo es invalido',
            'string' => 'Deben ser caracteres tipo texto',
            'min' => 'Deben ser minimo :min caracteres en el campo :attribute',
            'max' => 'Deben ser maximo :max caracteres en el campo :attribute',
        ];
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            
        ];
        $validator = Validator::make( $request->all(),$rules,$messages );

if ( $validator->fails() ) 
{

    Alert::error('Error',$validator->errors()->first());
    return back();
}
          


        
        $peticion = "SELECT id FROM `roles` where nombre = 'usuario'";
        $resultado =  DB::select($peticion);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'rol' => $resultado[0]->id,
        ]);
        
        event(new Registered($user));

        Auth::login($user);
        Alert::toast('Usuario Registrado','success');
        return redirect()->route('home');
    }
}
