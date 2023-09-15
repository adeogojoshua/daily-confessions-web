@if (Session::has('message'))
    @php $type = Session::get('alert-type', 'info'); @endphp

    <div class="alert alert-{{ $type }} mb-3" role="alert">
        {{ Session::get('message') }}
    </div>
@endif

@if (count($errors) > 0)
    <div class="alert alert-danger mb-3">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
