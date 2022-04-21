<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Nombre:') !!}
    <p>{{ $provider->name }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', 'Descripción:') !!}
    <p>{{ $provider->description }}</p>
</div>

<!-- Cellphone Field -->
<div class="col-sm-12">
    {!! Form::label('cellphone', 'Celular:') !!}
    <p>{{ $provider->cellphone }}</p>
</div>

<!-- Email Field -->
<div class="col-sm-12">
    {!! Form::label('email', 'Correo:') !!}
    <p>{{ $provider->email }}</p>
</div>

<!-- Logo Field -->
<div class="col-sm-12">
    {!! Form::label('logo', 'Logo:') !!} 
    @if($provider->logo != null)
				<img id="imgAvatar" class="d-flex align-self-start rounded mr-2" src="{{ asset( $provider->logo) }}" alt="{{$provider->name}}" height="200" >
            @else
                <p>{{$provider->name}}</p>
            @endif
</div>

<!-- Page Field -->
<div class="col-sm-12">
    {!! Form::label('page', 'Url página:') !!}
    <p>{{ $provider->page }}</p>
</div>

<!-- Address Field -->
<div class="col-sm-12">
    {!! Form::label('address', 'Dirección:') !!}
    <p>{{ $provider->address }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $provider->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $provider->updated_at }}</p>
</div>

