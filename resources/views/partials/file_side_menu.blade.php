<ul class="nav nav-sidebar">
    <li>
        <a href="{{ url('/files/'.$file->folder->id) }}">
            Up
        </a>
    </li>
    <li>
        <a href="{{ url('/download/'.$file->id) }}">
            Download
        </a>
    </li>
    @can('all', $file)
        @if($file->id !== $file->folder->user->profile_picture_id)
            <li>
                <a 
                    href="{{ url("/"
                        .($file->shared?'unshare':'share')
                        .'/'.$file->id 
                    ) }}" 
                >
                    {{ $file->shared?'Unshare':'Share' }}
                </a>
            </li>
            @if($file->type === 'image')
                <li>
                    <a href="{{ url('/change_profile_picture/'.$file->id) }}">
                        Set as Profile Picture
                    </a>
                </li>
            @endif
        @endif
    @endcan
</ul>
