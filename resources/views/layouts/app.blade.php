<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Socis CasaRosa</title>
    <link rel="icon" type="image/png" href="{{ asset('img/logoCasaRosa.png') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* Estilos adicionales */
        body {
            padding-top: 56px;
        }
        .navbar {
            background-color: #007bff !important;
        }
        .navbar-brand {
            color: #ffffff !important;
            font-weight: bold;
        }
        .navbar-nav .nav-link {
            color: #ffffff !important;
            transition: color 0.3s ease;
        }
        .card-header {
            background-color: #343a40;
            color: #ffffff;
            font-weight: bold;
        }
        .btn {
            font-weight: bold;
            transition: opacity 0.3s ease;
        }
        .table th,
        .table td {
            vertical-align: middle;
        }
        .table-responsive {
            overflow-x: auto;
        }

        /* Estilos para los botones */
        .btn:hover {
            opacity: 0.8;
        }

        /* Estilos para el botón de imprimir */
        .print-button {
            background-color: transparent;
            border: none;
            color: #ffffff;
            padding: 0;
            cursor: pointer;
            transition: color 0.3s ease, opacity 0.3s ease;
        }

        .print-button img {
            width: 20px;
            height: 20px;
            vertical-align: middle;
            margin-right: 5px;
        }

        .print-button:hover {
            color: #cccccc;
        }

        /* Estilos para el hover de los enlaces en la barra de navegación */
        .navbar-nav .nav-link:hover {
            color: #cccccc !important;
        }

        /* Estilos para el hover de los botones de interacción del menú */
        .interaction-button:hover {
            opacity: 0.8;
        }

        /* Estilos para indicar la selección de un enlace en la barra de navegación */
        .navbar-nav .nav-item.active .nav-link {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('socis.index') }}">
                <img src="{{ asset('img/logoCasaRosa.png') }}" alt="Logo" style="width: 40px; height: auto;">
                CasaRosa
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item {{ Request::is('socis') ? 'active' : '' }}">
                        <a class="nav-link interaction-button" href="{{ route('socis.index') }}">Socis CasaRosa</a>
                    </li>
                    <li class="nav-item {{ Request::is('socis/create') ? 'active' : '' }}">
                        <a class="nav-link interaction-button" href="{{ route('socis.create') }}">Afegir Soci</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <button class="print-button" onclick="printTable()">
                            <img src="{{ asset('img/impresoraIcon.png') }}" alt="Imprimir"> Imprimir
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        @yield('content')
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    @yield('scripts')
</body>
</html>
