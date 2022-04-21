<!-- Provider Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('provider_id', 'Proveedor:') !!}
    {!! Form::select('provider_id', $providers, null, ['class' => 'form-control']) !!}
</div>

<!-- Spare Part Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('spare_part_id', 'Repuesto o insumo:') !!}
    {!! Form::select('spare_part_id', $spareParts, null, ['class' => 'form-control']) !!}
</div>
