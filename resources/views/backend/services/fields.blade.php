<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', 'Descripción:') !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Value Field -->
<div class="form-group col-sm-6">
    {!! Form::label('value', 'Valor:') !!}
    {!! Form::number('value', null, ['class' => 'form-control']) !!}
</div>

<!-- Type Service Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type_service_id', 'Tipo de servicio:') !!}
    {!! Form::select('type_service_id', $typeService, null, ['class' => 'form-control custom-select']) !!}
</div>
