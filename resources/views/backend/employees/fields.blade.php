<!-- Full Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('full_name', 'Nombre completo:') !!}
    {!! Form::text('full_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Position Field -->
<div class="form-group col-sm-6">
    {!! Form::label('position', 'Cargo:') !!}
    {!! Form::text('position', null, ['class' => 'form-control']) !!}
</div>

<!-- Url Photo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('url_photo', 'Foto:') !!}
    <div class="input-group">
        <div class="custom-file">
            {!! Form::file('url_photo', ['class' => 'custom-file-input']) !!}
            {!! Form::label('url_photo', 'Choose file', ['class' => 'custom-file-label']) !!}
        </div>
    </div>
</div>
<div class="clearfix"></div>
