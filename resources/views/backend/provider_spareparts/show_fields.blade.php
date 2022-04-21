<!-- Provider Id Field -->
<div class="col-sm-12">
    {!! Form::label('provider_id', 'Proveedor:') !!}
    <p>{{ $providerSparepart->provider->name }}</p>
</div>

<!-- Spare Part Id Field -->
<div class="col-sm-12">
    {!! Form::label('spare_part_id', 'Respuesto o insumo:') !!}
    <p>{{ $providerSparepart->sparePart->name }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $providerSparepart->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $providerSparepart->updated_at }}</p>
</div>

