<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Usuario</title>
</head>

<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Buscar Usuarios</h2>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('usuario.search') }}" method="GET">
                        <div class="form-group">
                            <label for="search">Buscar:</label>
                            <input type="text" class="form-control" name="search" id="search">
                        </div>
                        <button type="submit" class="btn btn-primary">Buscar</button>
                    </form>
                </div>
            </div>
            <hr>

            <div class="row">
                <div class="col-md-12">
                    <h4>Resultados:</h4>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Correo Electrónico</th>
                            <th>Teléfono</th>
                            <th>Dirección</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($usuarios as $usuario)
                            <tr>
                                <td>{{ $usuario->nombre }}</td>
                                <td>{{ $usuario->correoElectronico }}</td>
                                <td>{{ $usuario->telefono }}</td>
                                <td>{{ $usuario->direccion }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $usuarios->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
