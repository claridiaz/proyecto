<?php

namespace App\Http\Controllers;

use App\Models\Prestamo;
use Illuminate\Http\Request;
use App\Models\Libro;
use App\Models\Usuario;

class PrestamoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prestamos = Prestamo::paginate(10);
        return view('Prestamos.index')
            ->with('prestamos', $prestamos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $libros = Libro::all();
        $usuarios = Usuario::all();
        return view('Prestamos.crearPrestamo', compact('libros', 'usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $prestamo = new Prestamo;

        $validatedData = $request->validate([
            'fecha_solicitud' => 'required',
            'fecha_prestamo' => 'required',
            'fecha_devolucion' => 'required',
        ]);

        $prestamo->fecha_solicitud = $request->input('fecha_solicitud');
        $prestamo->fecha_prestamo = $request->input('fecha_prestamo');
        $prestamo->fecha_devolucion = $request->input('fecha_devolucion');
        $prestamo->libro_id = $request->input('libro_id');
        $prestamo->usuario_id = $request->input('usuario_id');

        if ($prestamo->save()) {
            $mensaje = " El prestamo se agrego exitosamente";
        } else {
            $mensaje = "No se pudo agregar el prestamo. Intente nuevamente mas tarde";
        }

        return redirect()->route('prestamos.index')->with('mensaje', $mensaje);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $prestamo = Prestamo::findOrFail($id);
        return view('Prestamos.mostrarPrestamo')->with('prestamo', $prestamo);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $libros = Libro::all();
        $usuarios = Usuario::all();
        $prestamo = Prestamo::findOrFail($id);
        return view('Prestamos.editarPrestamo', compact('libros', 'usuarios'))->with('prestamo', $prestamo);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $prestamo = Prestamo::findOrfail($id);

        $validatedData = $request->validate([
            'fecha_solicitud' => 'required',
            'fecha_prestamo' => 'required',
            'fecha_devolucion' => 'required',
            'libro_id' => 'required|numeric|min:1|max:100',
            'usuario_id' => 'required|numeric|min:1|max:100',
        ]);

        $prestamo->fecha_solicitud = $request->input('fecha_solicitud');
        $prestamo->fecha_prestamo = $request->input('fecha_prestamo');
        $prestamo->fecha_devolucion = $request->input('fecha_devolucion');
        $prestamo->libro_id = $request->input('libro_id');
        $prestamo->usuario_id = $request->input('usuario_id');

        if ($prestamo->save()) {
            $mensaje = " El prestamo se edito exitosamente";
        } else {
            $mensaje = "No se pudo editar el prestamo. Intente nuevamente mas tarde";
        }

        return redirect()->route('prestamos.index')->with('mensaje', $mensaje);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $borrados = Prestamo::destroy($id);

        if ($borrados > 0) {
            $mensaje = "Prestamo eliminado exitosamente";
        } else {
            $mensaje = "No se puede eliminar el prestamo";
        }

        return redirect()->route('prestamos.index')->with('mensaje', $mensaje);
    }

    public function buscar(Request $request)
    {
        $prestamos = Prestamo::where('id', 'LIKE', '%'.$request->id. '%')->paginate(1);
        return view('Prestamos.index', compact('prestamos'));
    }

}
