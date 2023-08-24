
@extends('Layouts.madre')

@section('contenido')
    <h1 class="align-text-center">Editar Prestamo</h1>

    <form method="post" action="{{route('prestamos.update', [$prestamo->id])}}" class="needs-validation">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="fecha_solicitud">Fecha de Solicitud</label>
            <input type="date" class="form-control
            @error('fecha_solicitud')
            is-invalid
            @enderror
            "id="fecha_solicitud" name="fecha_solicitud" value="{{old('fecha_solicitud') ?? $prestamo->fecha_solicitud}}">
            @error('fecha_solicitud')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="fecha_prestamo">Fecha de Préstamo</label>
            <input type="date" class="form-control
            @error('fecha_prestamo')
            is-invalid
            @enderror
            "id="fecha_prestamo" name="fecha_prestamo" value="{{old('fecha_prestamo') ?? $prestamo->fecha_prestamo}}">
            @error('fecha_prestamo')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="fecha_devolucion">Fecha de Devolución</label>
            <input type="date" class="form-control
            @error('fecha_devolucion')
            is-invalid
            @enderror
            "id="fecha_devolucion" name="fecha_devolucion" value="{{old('fecha_devolucion') ?? $prestamo->fecha_devolucion}}" >
            @error('fecha_devolucion')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="libro_id">Libro</label>
            <select class="form-control" id="libro_id" name="libro_id" >
                @foreach ($libros as $libro)
                    <option value="{{ $libro->id }}" {{ $libro->id == $prestamo->libro_id ? 'selected' : '' }}>{{ $libro->titulo }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="usuario_id">Usuario</label>
            <select class="form-control" id="usuario_id" name="usuario_id" required>
                @foreach ($usuarios as $usuario)
                    <option value="{{ $usuario->id }}" {{ $usuario->id == $prestamo->usuario_id ? 'selected' : '' }}>{{ $usuario->nombre }}</option>
                @endforeach
            </select>
        </div>

        <br>
        <div>
        <button type="submit" class="btn btn-primary">Editar</button>
        <a href="{{route('prestamos.index')}}" class="btn btn-sm btn-success">Regresar</a>
        </div>
    </form>
@endsection
