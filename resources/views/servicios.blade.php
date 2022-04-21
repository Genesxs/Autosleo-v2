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
                    <a href="{{ url('/') }}" class="fw-bold text-dark text-decoration-none fs-5 ">Inicio</a>

                    <a href="{{ route('quienesSomos') }}"
                        class="ms-4 fw-bold text-dark text-decoration-none fs-5">¿Quiénes somos?</a>

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
            <div class="row p-5 mt-5"></div>
        </div>


        <!---Sección quienes somos-->

        <div class="container-fluid mt-5">
            
            <!--Sección empleados-->
            <div class="container-fluid">
                <div class="row mt-3">
                    <p class="fw-bold fs-2 text-center">Servi<strong class="text-danger">cios</strong></p>
                    @foreach ($services as $service)
                        <div class="col-4 mb-3">
                            <div class="card mt-3 bg-dark text-white">
                                <img src=""
                                    class="card-img-top img-fluid rounded mx-auto d-block m-2" style="width: 17rem;">
                                <div class="card-body text-center">
                                    <p class="card-title fw-bold fs-4">{{ $service->description }}</p>
                                    <p class="card-text">Precio: {{ $service->value }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="card-footer clearfix">
                        <div class="float-right">
                            @include('adminlte-templates::common.paginate', ['records' => $services])
                        </div>
                    </div>
                </div>
            </div>
        </div>


            <footer>
                @include('layouts.footer.footer')
            </footer>

    </body>

    </html>
