<!-- Porcent Field -->
<div class="col-sm-12">
    {!! Form::label('porcent', 'Porcentaje:') !!}
    <p>{{ $discount->porcent }}</p>
</div>

<!-- Start Date Field -->
<div class="col-sm-12">
    {!! Form::label('start_date', 'Fecha inicio:') !!}
    <p>{{ $discount->start_date }}</p>
</div>

<!-- End Date Field -->
<div class="col-sm-12">
    {!! Form::label('end_date', 'Fecha final:') !!}
    <p>{{ $discount->end_date }}</p>
</div>

<!-- Spare Part Id Field -->
<div class="col-sm-12">
    {!! Form::label('spare_part_id', 'Repuesto o insumo:') !!}
    <p>{{ $discount->sparePart->name}}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $discount->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $discount->updated_at }}</p>
</div>

