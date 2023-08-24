@extends('Layouts.madre')

@section('contenido')
    <fieldset>
        <h1 class="align-text-center" class="legend">Editar Usuario</h1>

        <form method="post" action="{{route('usuarios.update', [$usuario->id])}}" class="needs-validation">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control
            @error('nombre')
               is-invalid
            @enderror
            "id="nombre" name="nombre" placeholder="nombre" value = "{{old('nombre') ?? $usuario->nombre}}">

                @error('nombre')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="correo_electronico" class="form-label">Correo</label>
                <input type="email" class="form-control
            @error('correo_electronico')
               is-invalid
            @enderror
            "id="correo_electronico" name="correo_electronico" placeholder="Correo" value = "{{old('correo_electronico')  ?? $usuario->correo_electronico}}">
                @error('correo_electronico')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="telefono" class="form-label">Telefono</label>
                <input type="text" class="form-control
            @error('telefono')
               is-invalid
            @enderror
            "id="telefono" name="telefono" placeholder="Telefono" value = "{{old('telefono') ?? $usuario->telefono}}">
                @error('telefono')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="direccion" class="form-label">Direccion</label>
                <input type="text" class="form-control
            @error('direccion')
               is-invalid
            @enderror
            "id="direccion" name="direccion" placeholder="Direccion" value = "{{old('direccion') ?? $usuario->direccion}}">
                @error('direccion')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <input type="submit" value="Guardar" class="btn btn-primary">
                <a href="{{route('usuarios.index')}}" class="btn btn-sm btn-success">Regresar</a>
            </div>
        </form>
    </fieldset>
@endsection

