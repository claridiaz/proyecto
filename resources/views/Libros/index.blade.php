@extends('Layouts.madre')

@section('titulo', 'Libros')

@section('contenido')
    @if(session('mensaje'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Atencion: </strong>{{session('mensaje')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow mb-4" >
        <div class="card-header border-0">
            <div class="row align-items-right">
                <div class="col text-right">
                    <a href="{{route('libros.crear')}}" class="btn btn-sm btn-success" >Agregar Libro</a>
                </div>
            </div>
        </div>
    </div>

    <form method="GET" action="{{ route('libros.buscar')}}">
        <div class="input-group mb-3">
            <input type="text" name="titulo" class="form-control" placeholder="Buscar">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">Buscar</button>
            </div>
        </div>
    </form>

    <table class="table table-bordered" >
        <thead class="thead-dark">
        <tr>
            <th>Id</th>
            <th>Titulo</th>
            <th>Autor</th>
            <th>Editorial</th>
            <th>Año Publicacion</th>
            <th>Cantidad Disponible</th>
            <th>Cantidad de Prestamos</th>
            <th>Ver</th>
            <th>Editar</th>
            <th>Eliminar</th>

        </tr>
        </thead>
        <tbody>
        @forelse($libros as $libro)
            <tr>
                <th> {{$libro->id}}</th>
                <td>{{ $libro->titulo}}</td>
                <td>{{ $libro->autor}}</td>
                <td>{{ $libro->editorial}}</td>
                <td>{{ $libro->anio_publicacion}}</td>
                <td>{{ $libro->cantidad_disponible}}</td>
                <td>{{ $libro->prestamos->count()}}</td>
                <td><a class="btn btn-info" href="{{route('libros.show', ['id'=>$libro->id])}}">Ver</a></td>
                <td><a href="{{ route('libros.editar', [$libro->id])}}" class="btn btn-warning">Editar</a></td>
                <td>
                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal-{{$libro->id}}">
                        Eliminar
                    </button>

                    <form method="post" action="{{route('libros.borrar', [$libro->id])}}">
                        @csrf
                        @method('delete')
                        <div class="modal fade" id="modal-{{$libro->id}}" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Eliminar libro</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body">
                                        <p>¿Quieres eliminar el libro {{ $libro->titulo}} ? </p>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >No</button>
                                        <input class="btn btn-danger" type="submit" value="Eliminar" >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="3">No se encontraron libros</td></tr>
        @endforelse
        </tbody>
    </table>
    {{ $libros->links()}}
@endsection
