<div class="table-responsive">
    <table class="table" id="typeServices-table">
        <thead class="bg-dark text-center">
        <tr>
            <th>Nombre</th>
            <th colspan="3">Acción</th>
        </tr>
        </thead>
        <tbody class="text-center">
        @foreach($typeServices as $typeService)
            <tr>
                <td>{{ $typeService->name }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['admin.typeServices.destroy', $typeService->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('admin.typeServices.show', [$typeService->id]) }}"
                           class='btn btn-default btn-sm'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.typeServices.edit', [$typeService->id]) }}"
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
