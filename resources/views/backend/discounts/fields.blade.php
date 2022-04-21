<!-- Porcent Field -->
<div class="form-group col-sm-6">
    {!! Form::label('porcent', 'Porcentaje:') !!}
    {!! Form::number('porcent', null, ['class' => 'form-control']) !!}
</div>

<!-- Start Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('start_date', 'Fecha inicial:') !!}
    {!! Form::text('start_date', null, ['class' => 'form-control','id'=>'start_date']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#start_date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- End Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('end_date', 'Fecha final:') !!}
    {!! Form::text('end_date', null, ['class' => 'form-control','id'=>'end_date']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#end_date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Spare Part Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('spare_part_id', 'Repuesto o Insumo:') !!}
    {!! Form::select('spare_part_id', $sparePart, null, ['class' => 'form-control custom-select']) !!}
</div>
