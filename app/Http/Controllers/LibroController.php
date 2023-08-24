<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Models\Prestamo;
use Illuminate\Http\Request;


class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $libros = Libro::paginate(10);
        return view('Libros.index')->with('libros', $libros);

    }

    public function buscar(Request $request)
    {
        $libros = Libro::where('titulo', 'like', '%'.$request->titulo.'%')->paginate(10);
        return view('Libros.index', compact('libros'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Libros.crearLibro');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validados = $request->validate(
            [
                'titulo'=>'required|regex:/[A-Z][a-z]+/i',
                'autor'=>'required|regex:/[A-Z][a-z]+/i',
                'editorial'=>'required|regex:/[A-Z][a-z]+/i',
                'anio_publicacion'=>'required|numeric',
                'cantidad_disponible'=>'required|numeric',
            ]
        );

        $libro = new Libro();
        $libro->titulo = $request->input('titulo');
        $libro->autor = $request->input('autor');
        $libro->editorial = $request->input('editorial');
        $libro->anio_publicacion = $request->input('anio_publicacion');
        $libro->cantidad_disponible = $request->input('cantidad_disponible');

        if($libro->save()){
            $mensaje = "El libro se agrego exitosamente";
        }else {
            $mensaje = "No se pudo agregar el libro. Intente nuevamente mas tarde";
        }

        return redirect()->route('libros.index')->with('mensaje', $mensaje);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $libro = Libro::findOrFail($id);
        return view('Libros.mostrarLibro')
            ->with('libro', $libro);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $libro = Libro::findOrFail($id);
        return view('Libros.editarLibro')->with('libro', $libro);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $libro = Libro::findOrfail($id);

        $validados = $request->validate(
            [
                'titulo'=>'required|regex:/[A-Z][a-z]+/i',
                'autor'=>'required|regex:/[A-Z][a-z]+/i',
                'editorial'=>'required|regex:/[A-Z][a-z]+/i',
                'anio_publicacion'=>'required|numeric',
                'cantidad_disponible'=>'required|numeric',
            ]
        );

        $libro->titulo = $request->input('titulo');
        $libro->autor = $request->input('autor');
        $libro->editorial = $request->input('editorial');
        $libro->anio_publicacion = $request->input('anio_publicacion');
        $libro->cantidad_disponible = $request->input('cantidad_disponible');

        if($libro->save()){
            $mensaje = " El libro se edito exitosamente";
        }else {
            $mensaje = "No se pudo editar el libro. Intente nuevamente mas tarde";
        }
        return redirect()->route('libros.index')->with('mensaje', $mensaje);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $borrados = Libro::destroy($id);

        if ($borrados > 0){
            $mensaje = "Libro eliminado exitosamente";
        }else {
            $mensaje = "No se puede eliminar el libro";
        }

        return redirect()->route('libros.index')->with('mensaje', $mensaje);
    }


}
