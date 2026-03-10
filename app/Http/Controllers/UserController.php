<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\ProductsController;
use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (session('user') != null) {
            return back();
        } else {
            return view('account.login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => ['required', 'string', 'min:4', 'max:20'],
            'apellidos' => ['required', 'string', 'min:4', 'max:50'],
            'mail' => ['required', 'string', 'min:6', 'max:50', 'unique:user,mail'],
            'pass' => ['required', 'string', 'min:6', 'max:50']
        ]);
        try {
            $data = $request->all();
            $data['pass'] = Hash::make($request->pass); //Hash a la contraseña antes de crearlo
            User::create($data);
        } catch (\Exception $ex) {
            return back();
        }
        $nuevoUser =  User::where('mail', '=', $data['mail'])->first();

        $request->session()->put('user', $data['nombre']);
        $request->session()->put('id', $nuevoUser->id);

        $indexP = new ProductsController();
        return $indexP->productosIndex(); //Mostrar index si sale correcto el registro
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = session('id');
        $usuario = User::where('id', '=', $id)->first(); //Buscar por id de usuario pasada
        return view('account.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'nombre' => ['required', 'string', 'min:3', 'max:50'],
            'apellidos' => ['required', 'string', 'min:3', 'max:90'],
            'mail' => ['required', 'string', 'min:3', 'max:120', 'unique:user,mail']
        ]);

        try {
            User::where('id', $user->id)
                ->update(
                    [
                        'nombre' => $request->input('nombre'),
                        'apellidos' => $request->input('apellidos'),
                        'mail' => $request->input('mail')
                    ]
                );
            $request->session()->put('user', $request->nombre);
        } catch (\Exception $ex) {
            return back();
        }
        $index = new ProductsController();
        return $index->productosindex();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    //Comprobar users en login
    public function comprobar(Request $request)
    {
        $user = User::where('mail', '=', $request->mailLogin)->first();
        if ($user != null && Hash::check($request->passLogin, $user->pass)) { //Si es correcto muestra Inicio
            $nombre = User::where('mail', '=', $request->mailLogin)->first(); //Buscar el nombre de la cuenta que ha iniciado sesion para poder mostrar el nombre en el NAV
            $id = User::where('mail', '=', $request->mailLogin)->first(); //Id del user

            //Guardar variables de sesion
            $request->session()->put('user', $nombre->nombre);
            $request->session()->put('tipoUsuario', $id->tipoUsuario);
            $request->session()->put('id', $id->id);


            $productos = new ProductsController();
            return $productos->productosIndex();
        } else { //Si es incorrecto redirigi a login de nuevo
            return back();
        }
    }
    //Cerrar Sesion
    public function logout(Request $request)
    {
        $request->session()->flush();

        $productos = new ProductsController();
        return $productos->productosIndex();
    }
}
