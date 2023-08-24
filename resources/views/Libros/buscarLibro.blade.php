@extends('Layouts.madre')

@section('titulo', 'Libros')

@section('contenido')

    <div class="container">
    <h1>Resultados de la búsqueda</h1>
    @if ($libros->isEmpty())
        <p>No se encontraron resultados</p>
    @else
        <ul>
            @foreach ($libros as $libro)
                <li>{{$libro->titulo}}</li>
            @endforeach
        </ul>
    @endif
</div>
@endsection
