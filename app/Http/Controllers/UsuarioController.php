<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = Usuario::paginate(10);
        return view('Usuarios.index')
            ->with('usuarios', $usuarios);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Usuarios.crearUsuario');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nombre' => 'required|regex:/[A-Z][a-z]+/i',
            'correo_electronico' => 'required|email|unique:usuarios',
            'telefono' => 'required|unique:usuarios',
            'direccion' => 'required',
        ]);

        $usuario = new Usuario();
        $usuario->nombre = $request->nombre;
        $usuario->correo_electronico = $request->correo_electronico;
        $usuario->telefono = $request->telefono;
        $usuario->direccion = $request->direccion;

        if($usuario->save()){
            $mensaje = " El usuario se creo exitosamente";
        }else {
            $mensaje = "No se pudo crear el usuario. Intente nuevamente mas tarde";
        }

        return redirect()->route('usuarios.index')->with('mensaje', $mensaje);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('Usuarios.mostrarUsuario')
            ->with('usuario', $usuario);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('Usuarios.editarUsuario')->with('usuario', $usuario);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $usuario = Usuario::findOrFail($id);

        $validate = $request->validate([
            'nombre' => 'required|regex:/[A-Z][a-z]+/i',
            'correo_electronico' => ['required', 'email', Rule::unique('usuarios')->ignore($usuario->id) ],
            'telefono' => ['required', Rule::unique('usuarios')->ignore( $usuario->id)],
            'direccion' => 'required',
        ]);

        $usuario->nombre = $request->nombre;
        $usuario->correo_electronico = $request->correo_electronico;
        $usuario->telefono = $request->telefono;
        $usuario->direccion = $request->direccion;

        if($usuario->save()){
            $mensaje = " El usuario se edito exitosamente";
        }else {
            $mensaje = "No se pudo editar el usuario. Intente nuevamente mas tarde";
        }

        return redirect()->route('usuarios.index')->with('mensaje', $mensaje);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $borrados = Usuario::destroy($id);

        if ($borrados > 0){
            $mensaje = "Usuario eliminado exitosamente";
        }else {
            $mensaje = "No se puede eliminar el usuario";
        }

        return redirect()->route('usuarios.index')->with('mensaje', $mensaje);
    }

    public function buscar(Request $request)
    {
        $busqueda = $request->input('busqueda');
        $usuarios = Usuario::where('nombre', 'LIKE', '%' . $busqueda . '%')
            ->orWhere('correo_electronico', 'LIKE', '%' . $busqueda . '%')
            ->orWhere('telefono', 'LIKE', '%' . $busqueda . '%')
            ->orWhere('direccion', 'LIKE', '%' . $busqueda . '%')
            ->paginate(10);
        $usuarios->appends(['busqueda' => $busqueda]);
        return view('usuarios.index', compact('usuarios'));
    }
}
