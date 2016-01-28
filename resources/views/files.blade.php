@extends('layouts.base.files')


@section('_content')

    @parent

    @if(count($folder->folders) or count($folder->files))
        <div class="table-responsive">
            <table class="table table-hover table-stripped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if($folder->parent_id)
                        <tr>
                            <td 
                                colspan="3"
                                onclick="window.location = '/files/{{ $folder->parent_id }}'" 
                                style="cursor: pointer;" 
                            >
                                ..
                            </td>
                        </tr>
                    @endif
                    @foreach($folder->folders as $_folder)
                        <tr
                            onclick="window.location = '/files/{{ $_folder->id }}'"
                            style="cursor: pointer;"
                        >
                            <td>
                                <i class="fa fa-folder"></i>
                                {{ $_folder->name }}
                            </td>
                            <td>Folder</td>
                            <td>
                                @include('partials.list_files_menu_folder')
                            </td>
                        </tr>
                    @endforeach
                    @foreach($folder->files as $file)
                        <tr
                            onclick="window.location = '/file/view/{{ $file->id }}'"
                            style="cursor: pointer;"
                        >
                            <td>
                                <i class="fa fa-{{ fileIcon($file) }}"></i>
                                {{ $file->name }}
                            </td>
                            <td>{{ $file->fullType }}</td>
                            <td>
                                @include('partials.list_files_menu_file')
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <h1 class="text-center">
            This folder is Empty
        </h1>
        <div class="text-center">

            @if($folder->parent_id)
            
                <a 
                    href="/files/{{ $folder->parent_id }}" 
                    class="btn btn-default visible-xs-block"
                >
                    <i class="fa fa-sign-out"></i>
                    ..
                </a>

            @endif

            <a
                class="btn btn-primary visible-xs-block"
                href="/files/folder/new/{{ $folder->id }}" 
            >
                <i class="fa fa-folder"></i>
                Create New Folder
            </a>
            <a
                href="/files/upload/{{ $folder->id }}"
                class="btn btn-info visible-xs-block"
            >
                <i class="fa fa-upload"></i>
                Upload File
            </a>
        </div>
    @endif
    
@endsection


@section('scripts')

    @parent

    <script>
        $(".delete").click(function(e){
            e.stopPropagation();
            var confirmed = confirm("Are you sure?");
            if(confirmed){
                $(this)[0].parentNode.submit();
            }
            return confirmed;
        });
        $(".share").click(function(e){
            e.stopPropagation();
            return confirm("Share file?");
        });
        $(".rename").click(function(e){
            e.stopPropagation();
            return true;
        });
    </script>

@endsection
