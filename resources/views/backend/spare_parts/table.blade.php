<div class="table-responsive">
    <table class="table" id="spareParts-table">
        <thead class="bg-dark text-center">
        <tr>
            <th>Nombre</th>
        <th>Descripción</th>
        <th>Valor unitario</th>
        {{-- <th>Imagen</th> --}}
        <th>Cantidad</th>
        <th>Tipo</th>
            <th colspan="3">Acción</th>
        </tr>
        </thead>
        <tbody class="text-center">
        @foreach($spareParts as $sparePart)
            <tr>
                <td>{{ $sparePart->name }}</td>
            <td>{{ $sparePart->description }}</td>
            <td>{{ $sparePart->unit_value }}</td>
            {{-- <td>{{ $sparePart->image }}</td> --}}
            <td>{{ $sparePart->quantity }}</td>
            <td>{{ $sparePart->typeSparePart->name }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['admin.spareParts.destroy', $sparePart->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('admin.spareParts.show', [$sparePart->id]) }}"
                           class='btn btn-default btn-sm'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.spareParts.edit', [$sparePart->id]) }}"
                           class='btn btn-default btn-sm'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'onclick' => "return confirm('¿Estas seguro?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
