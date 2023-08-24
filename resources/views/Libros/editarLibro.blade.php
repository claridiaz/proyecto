@extends('Layouts.madre')

@section('contenido')

    <h1>Editar Libro</h1>

    <form method="post" action="{{route('libros.update', [$libro->id])}}" class="needs-validation">
        @method('PUT')
        @csrf

        <div class="mb-3">
            <label for="titulo" class="form-label">Titulo</label>
            <input type="text" class="form-control
            @error('titulo')
               is-invalid
            @enderror
            "id="titulo" name="titulo" placeholder="titulo" value = "{{old('titulo') ?? $libro->titulo}}">

            @error('titulo')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="autor" class="form-label">Autor</label>
            <input type="text" class="form-control
            @error('autor')
               is-invalid
            @enderror

            "id="autor" name="autor" placeholder="Autor" value = "{{old('autor') ?? $libro->autor}}">
            @error('autor')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="editorial" class="form-label">Editorial</label>
            <input type="text" class="form-control
            @error('editorial')
               is-invalid
            @enderror

            "id="editorial" name="editorial" placeholder="Editorial" value = "{{old('editorial') ?? $libro->editorial}}">
            @error('editorial')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


        <div class="mb-3">
            <label for="anio_publicacion" class="form-label">Año de publicacion</label>
            <input type="number" class="form-control
            @error('anio_publicacion')
               is-invalid
            @enderror

            "id="anio_publicacion" name="anio_publicacion" placeholder="Año de publicacion" value = "{{old('anio_publicacion') ?? $libro->anio_publicacion}}">
            @error('anio_publicacion')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="cantidad_disponible" class="form-label"> Cantidad Disponible</label>
            <input type="number" class="form-control
            @error('cantidad_disponible')
               is-invalid
            @enderror

            "id="cantidad_disponible" name="cantidad_disponible" placeholder="Cantidad Disponible" value = "{{old('cantidad_disponible') ?? $libro->cantidad_disponible}}">
            @error('cantidad_disponible')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <input type="submit" value="Editar" class="btn btn-primary">
            <a href="{{route('libros.index')}}" class="btn btn-sm btn-success">Regresar</a>
        </div>

    </form>
@endsection

