<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

@yield('titulo')
    <!-- Custom fonts for this template-->
    <!-- Bootstrap core CSS -->
  <link href="/css/vistas/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="/css/vistas/css/simple-sidebar.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('css')

</head>

<body>

    <div class="d-flex" id="wrapper">
  
      <!-- Sidebar -->
      <div class="bg-dark border-right" id="sidebar-wrapper">
        <div class="sidebar-heading text-light">Menu </div>
        <div class="list-group list-group-flush">
          <a href="{{route('usuario.inicio')}}" class="list-group-item list-group-item-action bg-dark text-light">inicio</a>
          <a href="{{route('usuario.inicio.carrito')}}" class="list-group-item list-group-item-action bg-dark text-light">Mi carrito</a>
          <a href="{{route('usuario.inicio.pedidos')}}" class="list-group-item list-group-item-action bg-dark text-light">Mis pedidos</a>
        </div>
      </div>
      <!-- /#sidebar-wrapper -->
  
      <!-- Page Content -->
      <div id="page-content-wrapper">
  
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
          <button class="btn btn-primary" id="menu-toggle">Menu</button>
  
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
  
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
              <li class="nav-item active">
                <a class="nav-link" href="#"> {{session('usuario')->nombre}}<span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Opciones
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Perfil</a>
                  <a class="dropdown-item" href="{{route('cerrar.sesion')}}">Cerrar Sesion</a>
                </div>
              </li>
            </ul>
          </div>
        </nav>
        @yield('titulo-pagina')

        @yield('contenido')
      </div>
      <!-- /#page-content-wrapper -->
  
    </div>
    <!-- /#wrapper -->
  
    <!-- Bootstrap core JavaScript -->
    <script src="/css/vistas/vendor/jquery/jquery.min.js"></script>
    <script src="/css/vistas/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  
    <!-- Menu Toggle Script -->
    <script>
      $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
      });
    </script>
  
  </body>
</html>