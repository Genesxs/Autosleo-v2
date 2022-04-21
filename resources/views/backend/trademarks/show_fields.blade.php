<!-- Trademark Field -->
<div class="col-sm-12">
    {!! Form::label('trademark', 'Marca:') !!}
    <p>{{ $trademark->trademark }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $trademark->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $trademark->updated_at }}</p>
</div>

