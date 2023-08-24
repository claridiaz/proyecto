<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
          crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
            crossorigin="anonymous"></script>
    <title>@yield('titulo')</title>

    <style>
        nav{

        }
    </style>

</head>
<body>



<nav class="navbar bg-body-tertiary">
    <div class="container-fluid">

            <ul class="nav justify-content-end">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('libros.index')}}"><strong>LIBRO</strong>
                        <img src="https://edea.juntadeandalucia.es/bancorecursos/file/7993ef33-d0ed-469d-8c0e-116906c512c0/2/LEN_2PRI_REA_09_V02.zip/BIBLIOTECA_libro_abriendose.gif"  width="100" height="80">
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('prestamos.index')}}"><strong>PRESTAMO</strong>
                        <img src="https://www.canalgif.net/Gifs-animados/Profesiones/Bibliotecarios/Imagen-animada-Bibliotecaria-10.gif"  width="100" height="80">
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('usuarios.index')}}"><strong>USUARIO</strong>
                        <img src="https://media4.giphy.com/media/kcZlnhiaB1p76tKS6S/giphy.gif"  width="100" height="80">
                    </a>
                </li>
            </ul>
        </div>
</nav>


<div class="container">
    @yield('contenido')
</div>

</body>
</html>


