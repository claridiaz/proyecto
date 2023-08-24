@extends('Layouts.madre')

@section('titulo', 'Libro')

@section('contenido')
    <br>

    <h1>Detalle del libro {{$libro->titulo}}
        <a class="btn btn-warning" href="{{route('libros.editar', ['id'=>$libro->id])}}">Editar</a>
    </h1>

    <br>

    <table class="table table-bordered">
        <thead class="thead-light">
        <tr>
            <th scope="col">Campo</th>
            <th scope="col">Valor</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">Titulo</th>
            <td>{{ $libro->titulo}}</td>
        </tr>

        <tr>
            <th scope="row">Autor</th>
            <td>{{ $libro->autor}}</td>
        </tr>
        <tr>
            <th scope="row">Editorial</th>
            <td>{{$libro->editorial}}</td>
        </tr>

        <tr>
            <th scope="row">Año de Publicacion</th>
            <td>{{$libro->anio_publicacion}}</td>
        </tr>

        <tr>
            <th scope="row">Cantidad Disponible</th>
            <td>{{ $libro->cantidad_disponible}}</td>
        </tr>

        </tbody>
    </table>

    <a class="btn btn-primary" href="{{route('libros.index')}}">Regresar</a>
@endsection

