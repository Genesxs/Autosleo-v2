<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Nombre:') !!}
    <p>{{ $sparePart->name }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', 'Descripción:') !!}
    <p>{{ $sparePart->description }}</p>
</div>

<!-- Unit Value Field -->
<div class="col-sm-12">
    {!! Form::label('unit_value', 'Valor unitario:') !!}
    <p>{{ $sparePart->unit_value }}</p>
</div>

<!-- Image Field -->
<div class="col-sm-12">
    {!! Form::label('image', 'Imagen:') !!}
    @if($sparePart->image != null)
				<img id="imgAvatar" class="d-flex align-self-start rounded mr-2" src="{{ asset( $sparePart->image) }}" alt="{{$sparePart->name}}" height="200">
            @else
                <p>{{$sparePart->name}}</p>
            @endif
</div>

<!-- Quantity Field -->
<div class="col-sm-12">
    {!! Form::label('quantity', 'Cantidad:') !!}
    <p>{{ $sparePart->quantity }}</p>
</div>

<!-- Spare Part Type Field -->
<div class="col-sm-12">
    {!! Form::label('type_spare_part_id', 'Tipo:') !!}
    <p>{{ $sparePart->typeSparePart->name }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $sparePart->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $sparePart->updated_at }}</p>
</div>

