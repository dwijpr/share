<table
    class="file-menu-wrapper"
>
    <tr>
        <td>
            {!! Form::open([
                'url' => '/files/folder/delete/'.$_folder->id,
                'class' => 'form-horizontal',
                'method' => 'delete',
                'style' => 'display: inline-block;'
            ]) !!}
                <a
                    href="javascript:"
                    class="delete"
                    title="Delete" 
                >
                    <i class="fa fa-close"></i>
                </a>
            {!! Form::close() !!}
        </td>
        <td>
            <a
                href="{{ url('/rename/folder/'.$_folder->id) }}"
                title="Rename"
                class="rename"
            >
                <i class="fa fa-edit"></i>
            </a>
        </td>
    </tr>
</table>
