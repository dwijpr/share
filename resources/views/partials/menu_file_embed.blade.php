<div class="table-responsive">
    <table
        class="file-menu-wrapper block-center"
    >
        <tr>
            <td>
                <a href="/files/{{ $file->folder->id }}">
                    <i class="fa fa-sign-out"></i>
                    <span class="hidden-sm hidden-xs">Up</span>
                </a>
            </td>
            <td>
                <a href="/download/{{ $file->id }}">
                    <i class="fa fa-download"></i>
                    <span class="hidden-sm hidden-xs">Download</span>
                </a>
            </td>
            @if($file->id !== $file->folder->user->profile_picture_id)
                <td>
                    <a 
                        href="/{{ 
                            ($file->shared?'unshare':'share')
                            .'/'.$file->id 
                        }}" 
                    >
                        <i class="fa fa-{{ 
                            $file->shared?'ban':'share'
                        }}"></i>
                        <span class="hidden-sm hidden-xs">
                            {{ $file->shared?'Unshare':'Share' }}
                        </span>
                    </a>
                </td>
                @if($file->type === 'image')
                    <td>
                        <a 
                            href="/change_profile_picture/{{ $file->id }}"
                        >
                            <i class="fa fa-picture-o"></i>
                            <span class="hidden-sm hidden-xs">
                                Set as Profile Picture
                            </span>
                        </a>
                    </td>
                @endif
            @endif
        </tr>
    </table>
</div>
