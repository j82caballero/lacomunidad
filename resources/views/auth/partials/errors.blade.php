@if (count($errors) > 0)
    <div class="alert alert-danger">
        ¡¡ Woopss!! Ha habido un problema:<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif