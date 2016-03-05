<table
    class="file-menu-wrapper"
>
    <tr>
        <td>
            {!! Form::open([
                'url' => '/file/'.$file->id,
                'class' => 'form-horizontal',
                'method' => 'delete',
                'style' => 'display: inline-block;'
            ]) !!}
                <a
                    href="javascript:"
                    title="Delete" 
                    class="delete"
                >
                    <i class="fa fa-close"></i>
                </a>
            {!! Form::close() !!}
        </td>
        @if($file->id !== $file->folder->user->profile_picture_id)
            <td>
                <a 
                    href="{{ url("/".
                        ($file->shared?'unshare':'share')
                        .'/'.$file->id 
                    ) }}" 
                    class="share"
                >
                    <i class="fa fa-{{ 
                        $file->shared?'ban':'share'
                    }}"></i>
                </a>
            </td>
        @endif
        <td>
            <a
                href="{{ url('/rename/file/'.$file->id) }}"
                title="Rename"
                class="rename"
            >
                <i class="fa fa-edit"></i>
            </a>
        </td>
    </tr>
</table>

