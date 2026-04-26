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
        'nombre' => [
            'required',
            'string',
            'min:4',
            'max:20',
            'regex:/^[A-Za-zÁÉÍÓÚáéíóúñÑ\s]+$/'
        ],
        'apellidos' => [
            'required',
            'string',
            'min:4',
            'max:50',
            'regex:/^[A-Za-zÁÉÍÓÚáéíóúñÑ\s]+$/'
        ],
        'mail' => [
            'required',
            'email',
            'max:50',
            'unique:users,mail'
        ],
        'pass' => [
            'required',
            'string',
            'min:6',
            'max:50',
            'confirmed'
        ]
    ], [
        'nombre.regex' => 'El nombre solo puede tener letras',
        'apellidos.regex' => 'Los apellidos solo pueden tener letras',
        'mail.email' => 'Email no válido',
        'mail.unique' => 'Este email ya existe',
        'pass.confirmed' => 'Las contraseñas no coinciden'
    ]);

    try {
        $data = $request->all();
        $data['pass'] = Hash::make($request->pass);

        User::create($data);

    } catch (\Exception $ex) {
        return back()->withErrors(['general' => 'Error al registrar'])->withInput();
    }

    $nuevoUser = User::where('mail', $data['mail'])->first();

    $request->session()->put('user', $data['nombre']);
    $request->session()->put('id', $nuevoUser->id);

    $indexP = new ProductsController();
    return $indexP->productosIndex();
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
        'nombre' => [
            'required',
            'string',
            'min:3',
            'max:50',
            'regex:/^[A-Za-zÁÉÍÓÚáéíóúñÑ\s]+$/'
        ],
        'apellidos' => [
            'required',
            'string',
            'min:3',
            'max:90',
            'regex:/^[A-Za-zÁÉÍÓÚáéíóúñÑ\s]+$/'
        ],
        'mail' => [
            'required',
            'email',
            'max:120',
            'unique:users,mail,' . $user->id
        ]
    ]);

    try {
        User::where('id', $user->id)->update([
            'nombre' => trim($request->nombre),
            'apellidos' => trim($request->apellidos),
            'mail' => $request->mail
        ]);

        $request->session()->put('user', $request->nombre);

    } catch (\Exception $ex) {
        return back()->withErrors(['general' => 'Error al actualizar'])->withInput();
    }

    $index = new ProductsController();
    return $index->productosIndex();
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
    $request->validate([
        'mailLogin' => 'required|email',
        'passLogin' => 'required'
    ], [
        'mailLogin.required' => 'El email es obligatorio',
        'mailLogin.email' => 'Formato de email incorrecto',
        'passLogin.required' => 'La contraseña es obligatoria'
    ]);

    $user = User::where('mail', $request->mailLogin)->first();

    if ($user && Hash::check($request->passLogin, $user->pass)) {

        $request->session()->put('user', $user->nombre);
        $request->session()->put('tipoUsuario', $user->tipoUsuario);
        $request->session()->put('id', $user->id);

        $productos = new ProductsController();
        return $productos->productosIndex();

    } else {
        return back()
            ->withErrors(['login' => 'Credenciales incorrectas'])
            ->withInput();
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
