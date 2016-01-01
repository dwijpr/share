<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Value</th>
                <th>Label</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; ?>
            @foreach ($user->numbers as $number)
                <tr>
                    <td><?= $i ?></td>
                    <td>{{ $number->value }}</td>
                    <td>{{ $number->label }}</td>
                    <td>
                        <a 
                            href="/profile/number/{{ $number->id }}" 
                            class="btn btn-info"
                            data-simple-update="{{ json_encode($number) }}"
                        >
                            <i class="fa fa-edit"></i>
                        </a>
                        {!! Form::open([
                            'url' => 'profile/number/'.$number->id,
                            'class' => 'form-horizontal',
                            'method' => 'delete',
                            'style' => 'display: inline-block;'
                        ]) !!}
                            <button 
                                class="btn btn-danger"
                                onclick="return confirm('are you sure?')"
                            >
                                <i class="fa fa-close"></i>
                            </button>
                        {!! Form::close() !!}
                    </td>
                </tr>
                <?php $i+=1; ?>
            @endforeach
        </tbody>
    </table>
</div>
