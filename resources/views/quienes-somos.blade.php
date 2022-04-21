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
            <div class="row">
                <div class="col-4"></div>
                <div class="col-4 d-flex justify-content-center">
                    <div class="card">
                        <img src="{{ asset('/img/nosotros/nosotros.jpg') }}" style="width: 30rem;"
                            class="card-img-top img-fluid rounded mx-auto d-block">
                        <div class="card-body">
                            <p class="card-title fw-bold fs-3 text-center">¿Quiénes somos?</p>
                            <p class="card-text text-justify"><strong class="text-decoration-underline">AUTOS<strong
                                        class="text-danger">LEO</strong></strong> ofrece servicios de mantenimiento
                                preventivo y correctivo de
                                vehículos, basado en la objetividad y profesionalismo de sus empleados y de la tecnología
                                utilizada, primando la ética, honestidad y responsabilidad del trabajo realizado, buscando
                                la satisfacción de nuestros clientes proveedores y el crecimiento de nuestra organización
                                como una gran fuente de ingreso de su propietario, a través de un mejoramiento continuo de
                                sus procesos.</p>
                        </div>
                    </div>
                </div>
                <div class="col-4"></div>
                <div class="col-6">
                    <div class="card mt-3">
                        <img src="{{ asset('/img/nosotros/mision.jpg') }}"
                            class="card-img-top img-fluid rounded mx-auto d-block m-2" style="width: 18rem;">
                        <div class="card-body">
                            <p class="card-title fw-bold fs-3 text-center">Misión</p>
                            <p class="card-text">Es misión de la empresa prestar un servicio óptimo y oportuno que les
                                garantice a nuestros clientes el mejor desempeño de sus automotores, contando con personal
                                capacitado y competente para brindar una atención personalizada ante cualquier eventualidad.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card mt-3">
                        <img src="{{ asset('/img/nosotros/vision.jpg') }}"
                            class="card-img-top img-fluid rounded mx-auto d-block m-2" style="width: 17rem;">
                        <div class="card-body ">
                            <p class="card-title fw-bold fs-3 text-center">Visión</p>
                            <p class="card-text">Consolidarnos como una de las empresas líderes en el mercado prestando
                                los servicios en mantenimientos preventivos y correctivos en la línea automotriz. Estamos
                                enfocados al crecimiento diario, por eso somos una empresa de proyección, capaz de redefinir
                                el concepto de calidad y garantía que se ofrece en la actualidad. Crecer a la par de los
                                avances tecnológicos, para un continuo mejoramiento y cubrimiento a nivel de servicio,
                                enmarcara que la infraestructura interna sea modificada, que el personal se capacite
                                constantemente y cubra la demanda personalizada del servicio.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!--Sección empleados-->

            <div class="container-fluid">
                <div class="row mt-3">
                    <p class="fw-bold fs-2 text-center">Colabo<strong class="text-danger">radores</strong></p>
                    @foreach ($employees as $employee)
                        <div class="col-4 mb-3">
                            <div class="card mt-3 bg-dark text-white">
                                <img src="{{ asset($employee->url_photo) }}"
                                    class="card-img-top img-fluid rounded mx-auto d-block m-2" style="width: 17rem;">
                                <div class="card-body text-center">
                                    <p class="card-title fw-bold fs-4">{{ $employee->full_name }}</p>
                                    <p class="card-text">{{ $employee->position }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>


            <footer>
                @include('layouts.footer.footer')
            </footer>

    </body>

    </html>
