<div class="table-responsive">
    <table class="table" id="providerSpareparts-table">
        <thead  class="text-center bg-dark">
        <tr>
            <th>Proveedor</th>
        <th>Repuesto o insumo</th>
            <th colspan="3">Acción</th>
        </tr>
        </thead>
        <tbody class="text-center">
        @foreach($providerSpareparts as $providerSparepart)
            <tr>
                <td>{{ $providerSparepart->provider->name }}</td>
            <td>{{ $providerSparepart->sparePart->name }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['admin.providerSpareparts.destroy', $providerSparepart->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('admin.providerSpareparts.show', [$providerSparepart->id]) }}"
                           class='btn btn-default btn-sm'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.providerSpareparts.edit', [$providerSparepart->id]) }}"
                           class='btn btn-default btn-sm'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
