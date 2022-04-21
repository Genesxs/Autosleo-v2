<div class="table-responsive">
    <table class="table" id="trademarks-table">
        <thead class="text-center bg-dark">
        <tr>
            <th>Marca</th>
            <th colspan="3">Acción</th>
        </tr>
        </thead>
        <tbody class="text-center">
        @foreach($trademarks as $trademark)
            <tr>
                <td>{{ $trademark->trademark }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['admin.trademarks.destroy', $trademark->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('admin.trademarks.show', [$trademark->id]) }}"
                           class='btn btn-default btn-sm'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.trademarks.edit', [$trademark->id]) }}"
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
