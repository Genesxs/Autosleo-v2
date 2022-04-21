<div class="table-responsive">
    <table class="table" id="employees-table">
        <thead class="bg-dark text-center">
        <tr>
            <th>Nombre completo</th>
        <th>Cargo</th>
        {{-- <th>Url Photo</th> --}}
            <th colspan="3">Acción</th>
        </tr>
        </thead>
        <tbody class="text-center">
        @foreach($employees as $employee)
            <tr>
                <td>{{ $employee->full_name }}</td>
            <td>{{ $employee->position }}</td>
            {{-- <td>{{ $employee->url_photo }}</td> --}}
                <td width="120">
                    {!! Form::open(['route' => ['admin.employees.destroy', $employee->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('admin.employees.show', [$employee->id]) }}"
                           class='btn btn-default btn-sm'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.employees.edit', [$employee->id]) }}"
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
