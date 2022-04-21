<div class="table-responsive">
    <table class="table" id="discounts-table">
        <thead class="bg-dark text-center">
        <tr>
            <th>Porcentaje</th>
        <th>Fecha inicio</th>
        <th>Fecha final</th>
        <th>Repuesto o insumo</th>
            <th colspan="3">Acción</th>
        </tr>
        </thead>
        <tbody class="text-center">
        @foreach($discounts as $discount)
            <tr>
                <td>{{ $discount->porcent }}</td>
            <td>{{ $discount->start_date }}</td>
            <td>{{ $discount->end_date }}</td>
            <td>{{ $discount->sparePart->name }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['admin.discounts.destroy', $discount->id], 'method' => 'delete']) !!}
                    <div class='btn-group d-flex justify-content-center'>
                        <a href="{{ route('admin.discounts.show', [$discount->id]) }}"
                           class='btn btn-default btn-sm'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.discounts.edit', [$discount->id]) }}"
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
