<div class="table-responsive">
    <table class="table" id="services-table">
        <thead class="text-center bg-dark">
        <tr>
            <th>Descripción</th>
        <th>Valor</th>
        <th>Tipo de servicio</th>
            <th colspan="3">Acción</th>
        </tr>
        </thead>
        <tbody class="text-center">
        @foreach($services as $service)
            <tr>
                <td>{{ $service->description }}</td>
            <td>{{ $service->value }}</td>
            <td>{{ $service->typeService->name }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['admin.services.destroy', $service->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('admin.services.show', [$service->id]) }}"
                           class='btn btn-default btn-sm'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.services.edit', [$service->id]) }}"
                           class='btn btn-succes btn-sm'>
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
