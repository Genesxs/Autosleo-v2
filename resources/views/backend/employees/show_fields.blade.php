<!-- Full Name Field -->
<div class="col-sm-12">
    {!! Form::label('full_name', 'Nombre completo:') !!}
    <p>{{ $employee->full_name }}</p>
</div>

<!-- Position Field -->
<div class="col-sm-12">
    {!! Form::label('position', 'Cargo:') !!}
    <p>{{ $employee->position }}</p>
</div>

<!-- Url Photo Field -->
<div class="col-sm-12">
    {!! Form::label('url_photo', 'Foto:') !!}
				<img id="imgAvatar" class="d-flex align-self-start rounded mr-2" src="{{ asset( $employee->url_photo) }}" alt="" height="200">
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $employee->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $employee->updated_at }}</p>
</div>

