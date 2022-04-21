<div class="table-responsive">
    <table class="table" id="providers-table">
        <thead class="bg-dark text-center">
        <tr>
            <th>Nombre</th>
        <th>Descripción</th>
        <th>Celular</th>
        <th>Correo</th>
        {{-- <th>Logo</th>
        <th>Page</th>
        <th>Address</th> --}}
            <th colspan="3">Acción</th>
        </tr>
        </thead>
        <tbody class="text-center">
        @foreach($providers as $provider)
            <tr>
                <td>{{ $provider->name }}</td>
            <td>{{ $provider->description }}</td>
            <td>{{ $provider->cellphone }}</td>
            <td>{{ $provider->email }}</td>
            {{-- <td>{{ $provider->logo }}</td>
            <td>{{ $provider->page }}</td>
            <td>{{ $provider->address }}</td> --}}
                <td width="120">
                    {!! Form::open(['route' => ['admin.providers.destroy', $provider->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('admin.providers.show', [$provider->id]) }}"
                           class='btn btn-default btn-sm'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.providers.edit', [$provider->id]) }}"
                           class='btn btn-default btn-sm'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'onclick' => "return confirm('¿Estás seguro?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
