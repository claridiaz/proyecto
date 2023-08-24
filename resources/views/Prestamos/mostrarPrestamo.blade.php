@extends('Layouts.madre')

@section('titulo', 'Libro')

@section('contenido')
    <br>

    <h1>Detalle del prestamo del libro {{$prestamo->libro->titulo}}
        <a class="btn btn-warning" href="{{route('prestamos.editar', ['id'=>$prestamo->id])}}">Editar</a>
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
            <th scope="row">Libro</th>
            <td>{{$prestamo->libro->titulo}}</td>
        </tr>

        <tr>
            <th scope="row">Usuario</th>
            <td>{{$prestamo->usuario->nombre}}</td>
        </tr>
        <tr>
            <th scope="row">Fecha Solicitud</th>
            <td>{{$prestamo->fecha_solicitud}}</td>
        </tr>

        <tr>
            <th scope="row">Fecha Prestamo</th>
            <td>{{$prestamo->fecha_prestamo}}</td>
        </tr>

        <tr>
            <th scope="row">Fecha Devolucion</th>
            <td>{{ $prestamo->fecha_devolucion}}</td>
        </tr>
        </tbody>
    </table>

    <a class="btn btn-primary" href="{{route('prestamos.index')}}">Regresar</a>
@endsection

