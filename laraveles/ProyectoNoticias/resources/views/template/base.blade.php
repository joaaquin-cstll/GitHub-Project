<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>@yield('titulo', 'Proyecto Noticias')</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{ asset('plantilla/assets/favicon.ico') }}" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('plantilla/css/styles.css') }}" rel="stylesheet" />
        @stack('styles')
    </head>
    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="{{ route('noticias.index') }}">ProyectoNoticias</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="{{ route('noticias.index') }}">Inicio</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('noticias.create') }}">Crear Noticia</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        
        <!-- Page content-->
        <div class="container mt-5">
            <!-- Mensajes Flash de sesión (Éxito / Error) -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="row">
                <!-- Main Content Column -->
                <div class="col-lg-8">
                    @yield('contenido')
                </div>

                <!-- Side widgets-->
                <div class="col-lg-4">
                    <!-- Search widget-->
                    <div class="card mb-4">
                        <div class="card-header">Buscar</div>
                        <div class="card-body">
                            <div class="input-group">
                                <input class="form-control" type="text" placeholder="Buscar noticia..." aria-label="Buscar noticia..." aria-describedby="button-search" />
                                <button class="btn btn-primary" id="button-search" type="button">Ir</button>
                            </div>
                        </div>
                    </div>
                    <!-- Categories widget-->
                    <div class="card mb-4">
                        <div class="card-header">Categorías</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <li><a href="#!">General</a></li>
                                        <li><a href="#!">Actualidad</a></li>
                                    </ul>
                                </div>
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <li><a href="#!">Deportes</a></li>
                                        <li><a href="#!">Tecnología</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Side widget-->
                    <div class="card mb-4">
                        <div class="card-header">ProyectoNoticias</div>
                        <div class="card-body">Portal de gestión de noticias y comentarios con límites de tiempo para edición y borrado.</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; ProyectoNoticias {{ date('Y') }}</p></div>
        </footer>

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('plantilla/js/scripts.js') }}"></script>
        @stack('scripts')
    </body>
</html>