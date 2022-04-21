<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', 'Descripción:') !!}
    <p>{{ $service->description }}</p>
</div>

<!-- Value Field -->
<div class="col-sm-12">
    {!! Form::label('value', 'Valor:') !!}
    <p>{{ $service->value }}</p>
</div>

<!-- Type Service Id Field -->
<div class="col-sm-12">
    {!! Form::label('type_service_id', 'Tipo Servicio:') !!}
    <p>{{ $service->typeService->name }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $service->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $service->updated_at }}</p>
</div>

