@if (session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> {{ session()->get('message') }} .

    </div>
    {{ session()->forget('message') }}
@elseif(session()->has('error'))
    <div class="alert alert-danger alert-dismissible"
        style="background-color: #f8d7da; border-color:#f5c6cb; color:#721c24; margin-bottom: 0px;">
        <strong>Error!</strong> {{ session()->get('error') }} .


    </div>
@endif

@if ($errors->any())
    <ul>
        <div class="alert alert-danger alert-dismissible"
            style="background-color: #f8d7da; border-color:#f5c6cb; color:#721c24; margin-bottom: 0px;">

            @foreach ($errors->all() as $error)
                <li style="list-style: none;">{{ $error }}</li>
            @endforeach

        </div>
    </ul>
@endif
