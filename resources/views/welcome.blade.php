<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>AutosLeo</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="{{ asset('/img/icon.png') }}">
    <link rel="shortcut icon" sizes="270x270" href="{{ asset('/img/icon.png') }}">
    <script src="https://kit.fontawesome.com/5dbe98442b.js" crossorigin="anonymous"></script>

    <style>
        body {
            font-family: 'Nunito';
            background: #f7fafc;
        }

    </style>
</head>

<body>
    <div class="container-fluid fixed-top p-4 bg-white">
        <div class="col-12 ">
            <div class="d-flex justify-content-between">
                <div>
                    <img src="{{ asset('/img/logo-color.png') }}" class="img-fluid" width="450px" height="100px">
                </div>
                <div class="d-flex align-items-center ms-4">

                    <a href="{{ route('quienesSomos') }}"
                        class="ms-4 fw-bold text-dark text-decoration-none fs-5 ">¿Quiénes somos?</a>

                    <a href="{{ route('repuestos') }}"
                        class="ms-4 fw-bold text-dark text-decoration-none fs-5">Repuestos</a>
                    
                    <a href="{{ route('servicios') }}" class="ms-4 fw-bold text-dark text-decoration-none fs-5">Nuestros servicios</a>

                    <a href="{{ route('proveedores') }}"
                        class="ms-4 fw-bold text-dark text-decoration-none fs-5 me-4">Proveedores</a>

                    {{-- <a href="{{ route('contactenos.index') }}"
                        class="ms-4 fw-bold text-dark text-decoration-none fs-5 me-4">Contactenos</a> --}}

                    @if (Route::has('login'))
                        @auth
                            @can('admin.home')
                                <a href="{{ route('admin.home') }}"
                                    class="fw-bold text-dark text-decoration-none fs-5">Dashboard</a>
                                @else
                                <a href="{{ url('dashboard') }}"
                                    class="fw-bold text-dark text-decoration-none fs-5">Dashboard</a>
                            @endcan
                        @else
                            <a href="{{ route('login') }}" class="fw-bold text-dark text-decoration-none fs-5">Iniciar
                                sesión</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="ms-4 fw-bold text-dark text-decoration-none fs-5">Registrar</a>
                            @endif
                        @endif
                </div>
                    @endif
            </div>
        </div>
    </div>

    
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 ">
                <div class="">
                    <img src="{{ asset('/img/portada.jpg') }}" class="img-fluid w-100">
                </div>
            </div>
            <div class="col-12 text-center mt-3">
                <div class="embed-responsive embed-responsive-21by9">
                    <iframe class="embed-responsive-item" width="80%" height="450px" src="https://www.youtube.com/embed/MZvEmr6G_us"></iframe>
                </div>
            </div>
        </div>

    </div>

        



        <footer class="">
            @include('layouts.footer.footer')
        </footer>

    </body>

    </html>
