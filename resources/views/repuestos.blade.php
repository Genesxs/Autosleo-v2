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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
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


        <div class="container-fluid p-5 mt-5">
            <h5 class="text-center fw-bold fs-2">Repu<strong class="text-danger">estos</strong></h5>
            <div class="row">
                <?php $cnt = 1; ?>
                @foreach ($spareParts as $sparePart)
                    <div class="col-4">
                        <div class="card mt-3 mb-3 bg-dark text-white">
                            <img src="{{ asset($sparePart->image) }}"
                                class="card-img-top img-fluid rounded mx-auto d-block m-3" style="width: 17rem;">
                            <div class="card-body text-center">
                                <p class="card-title fw-bold fs-4">{{ $sparePart->name }}</p>
                                <p class="card-text">
                                    <button type="button" id="{{ $cnt }}" class="btn btn-light"
                                        data-toggle="modal" onclick="showSparepart({{ $sparePart->id }})"> ver más
                                    </button>
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php $cnt++; ?>
                @endforeach
                <div class="card-footer clearfix">
                    <div class="float-right">
                        @include('adminlte-templates::common.paginate', ['records' => $spareParts])
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="sparePartModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">

                <div class="modal-content p-4">
                    <div class="modal-header">
                        <img id="image" src="" class="card-img-top img-fluid rounded mx-auto d-block m-3"
                            style="width: 17rem;">
                    </div>
                    <h5 id="name" class="modal-title mt-3 text-center fw-bold fs-4" id="exampleModalLabel"></h5>
                    <div class="modal-body">
                        <p id="description" class="text-center"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>


        <footer class="">
            @include('layouts.footer.footer')
        </footer>



        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
                integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
                integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
        </script>


        {{-- The following JS is for get specify provider --}}
        <script src="{{ asset('js/sparePart.js') }}"></script>
    </body>

    </html>
