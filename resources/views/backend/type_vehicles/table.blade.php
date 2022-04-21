<div class="table-responsive">
    <table class="table" id="typeVehicles-table">
        <thead class="bg-dark text-center">
        <tr>
            <th>Tipo de vehículo</th>
            <th colspan="3">Acción</th>
        </tr>
        </thead>
        <tbody class="text-center">
        @foreach($typeVehicles as $typeVehicle)
            <tr>
                <td>{{ $typeVehicle->type_vehicle }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['admin.typeVehicles.destroy', $typeVehicle->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('admin.typeVehicles.show', [$typeVehicle->id]) }}"
                           class='btn btn-default btn-sm'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.typeVehicles.edit', [$typeVehicle->id]) }}"
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
