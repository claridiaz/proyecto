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
                    <a href="{{route('prestamos.crear')}}" class="btn btn-sm btn-success" >Agregar Prestamo</a>
                </div>
            </div>
        </div>
    </div>

    <form action="{{ route('prestamos.buscar') }}" method="GET">
        <div class="input-group">
            <input type="text" name="busqueda" class="form-control" placeholder="Buscar">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">Buscar
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
    </form>

    <table class="table table-bordered">
        <thead class="thead-dark">
        <tr>
            <th>Id</th>
            <th>Libro</th>
            <th>Usuario</th>
            <th>Fecha Solicitud</th>
            <th>Fecha Prestamo</th>
            <th>Fecha Devolucion</th>
            <th>Ver</th>
            <th>Editar</th>
            <th>Eliminar</th>

        </tr>
        </thead>
        <tbody>
        @forelse($prestamos as $prestamo)
            <tr>
                <th>{{ $prestamo->id}}</th>
                <td>{{ $prestamo->libro->titulo}}</td>
                <td>{{ $prestamo->usuario->nombre}}</td>
                <td>{{ $prestamo->fecha_solicitud }}</td>
                <td>{{ $prestamo->fecha_prestamo }}</td>
                <td>{{ $prestamo->fecha_devolucion }}</td>
                <td><a class="btn btn-info" href="{{route('prestamos.show', ['id'=>$prestamo->id])}}">Ver</a></td>
                <td><a href="{{ route('prestamos.editar', [$prestamo->id])}}" class="btn btn-warning">Editar</a></td>
                <td>
                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal-{{$prestamo->id}}">
                        Eliminar
                    </button>

                    <form method="post" action="{{route('prestamos.borrar', [$prestamo->id])}}">
                        @csrf
                        @method('delete')
                        <div class="modal fade" id="modal-{{$prestamo->id}}" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Eliminar prestamo</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body">
                                        <p>¿Quieres eliminar el prestamo {{ $prestamo->id}} ? </p>
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
            <tr><td colspan="3">No se encontraron resultados</td></tr>
        @endforelse
        </tbody>
    </table>
    {{ $prestamos->links()}}
@endsection

