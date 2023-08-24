@extends('Layouts.madre')

@section('titulo', 'Libros')

@section('contenido')

    <div class="container">
        <h1>Resultados de la búsqueda</h1>
        @if ($prestamos->isEmpty())
            <p>No se encontraron resultados</p>
        @else
            <ul>
                @foreach ($prestamos as $prestamo)
                    <li>{{$prestamo->id}}</li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
