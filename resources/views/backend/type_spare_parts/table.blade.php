<div class="table-responsive">
    <table class="table" id="typeSpareParts-table">
        <thead>
        <tr>
            <th>Name</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($typeSpareParts as $typeSparePart)
            <tr>
                <td>{{ $typeSparePart->name }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['admin.typeSpareParts.destroy', $typeSparePart->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('admin.typeSpareParts.show', [$typeSparePart->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.typeSpareParts.edit', [$typeSparePart->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
