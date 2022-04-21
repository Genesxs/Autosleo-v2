<x-app-layout>

    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-6 col-md-6 col-sm-12 mt-3">
                <div class="card bg-muted">
                    <div class="row">
                        <div class="col-md-12 ">
                            <div class="card-body">
                                <h5 class="card-title fs-2 fw-bold text-center">CONTÁCTENOS</h5>
                                @csrf
                                @foreach ($usuarios as $usuario)
                                    <div class="">
                                        <label for="nombres" class="fw-bold">Nombres: </label>
                                        <p>{{ $usuario->nombres }} {{ $usuario->apellidos }}</p>
                                        <label for="email" class="fw-bold">Correo:</label>
                                        <p>{{ $usuario->email }}</p>
                                    </div>
                                @endforeach
    
    
                                @if (session()->has('message'))
                                    <div class="mt-3 alert alert-success">
                                        {{ session()->get('message') }}
                                    </div>
                                @endif
    
    
                                {!! Form::open(['route' => ['contactenos.store'], 'method' => 'post']) !!}
    
    
                                <label for="email" class="fw-bold">Email: </label><br>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                {!! Form::text('email', null, ['class' => 'form-control mb-4', 'placeholder' => 'Escribe tu email']) !!}
    
    
                                <label for="asunto" class="fw-bold">Asunto: </label><br>
                                @error('asunto')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                {!! Form::text('asunto', null, ['class' => 'form-control mb-4', 'placeholder' => 'Escribe tu asunto']) !!}
    
    
                                <label for="comentario" class="fw-bold">Comentario: </label><br>
                                @error('comentario')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                {!! Form::textarea('comentario', null, ['class' => 'form-control', 'placeholder' => 'Escribe tu comentario']) !!}
    
    
    
                                {!! Form::submit('Enviar', ['class' => 'btn btn-dark btn-lg text-white mt-2']) !!}
    
    
                                {!! Form::close() !!}
    
    
    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-md-6 col-sm-12 mt-3">
                <div class="card">
                    <iframe class="img-fluid"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3967.2829146415634!2d-75.34036868553423!3d6.092539995588237!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e46a2768024dcc1%3A0xa3105d9101edefe2!2sAUTOSLEO!5e0!3m2!1ses!2sco!4v1621638339805!5m2!1ses!2sco"
                        width="100%" height="368" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
                        tabindex="0"></iframe>
                    <div class="card-body">
                        <ul class="list-group list-group-flush ">
                            <li class="list-group-item">Correo <i class="far fa-envelope"></i>
                                <p class="m-0">autosleo.car@autosleosas.com</p>
                            </li>
                            <li class="list-group-item">Teléfonos <i class="fas fa-phone-square-alt"></i>
                                <p class="m-0">+57 3192283582<br> +57 60454333399<br> +57 3122548016 <br> +57 3206151732</p>
                            </li>
                            <li class="list-group-item">Dirección <i class="fas fa-street-view"></i>
                                <p class="m-0">Calle 43 #31-02 semisótano el Carmen de Viboral, Rionegro,
                                    Antioquia</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
            
    </div>
    

    <footer class="">
        @include('layouts.footer.footer')
    </footer>

</x-app-layout>
