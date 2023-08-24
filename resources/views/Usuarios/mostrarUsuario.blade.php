@extends('Layouts.madre')

@section('titulo', 'Usuarios')

@section('contenido')
    <br>
    <h1>Detalle del usuario {{$usuario->nombre}}
        <a class="btn btn-warning" href="{{route('usuarios.editar', ['id'=>$usuario->id])}}">Editar</a>
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
            <th scope="row">Nombre</th>
            <td>{{$usuario->nombre}}</td>
        </tr>
        <tr>
            <th scope="row">Correo</th>
            <td>{{$usuario->correo_electronico}}</td>
        </tr>

        <tr>
            <th scope="row">Telefono</th>
            <td>{{$usuario->telefono}}</td>
        </tr>
        <tr>
            <th scope="row">Direccion</th>
            <td>{{$usuario->direccion}}</td>
        </tr>
        </tbody>
    </table>

    <a class="btn btn-primary" href="{{route('prestamos.index')}}">Regresar</a>
@endsection


