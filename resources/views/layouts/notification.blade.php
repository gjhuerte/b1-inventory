@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@elseif(session()->has('success'))
    <div class="alert alert-success">
        <strong>Operation Success!</strong> {{ session('success') }}
    </div>
@endif
