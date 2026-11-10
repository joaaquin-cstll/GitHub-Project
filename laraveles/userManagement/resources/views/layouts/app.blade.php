<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Dwes.HopTo.Org</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('assets/style/style.css') }}">
    </head>
    <body>
        <header class="site-header fixed-top">
            <nav class="navbar navbar-expand-lg container">
                <a class="navbar-brand fw-bold" href="#">Dwes.HopTo.org</a>
                <button class="navbar-toggler border-0" type="button"
                        data-bs-toggle="collapse" data-bs-target="#mainNav"
                        aria-controls="mainNav" aria-expanded="false" aria-label="Menú">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="mainNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="#">Inicio</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Porfolio</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Acerca de</a></li>
                    </ul>
                </div>
            </nav>
        </header>
        <main class="container py-5">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    @section('content')
                    <h1 class="mb-4">Bienvenido</h1>
                    <p class="lead">
                        Esta es una página básica con Bootstrap cargado solo por CDN.
                        El header es sticky y el footer queda siempre al fondo.
                    </p>
                    <div class="alert alert-info" role="alert">
                        Alert.
                    </div>
                    @show
                </div>
            </div>
        </main>
        <footer class="bg-dark text-white py-4 mt-auto">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p class="mb-0">&copy; 2026 Dwes.HopTo.Org. Todos los derechos reservados.</p>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <a href="#" class="text-white me-3">Política de privacidad</a>
                        <a href="#" class="text-white">Términos</a>
                    </div>
                </div>
            </div>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>