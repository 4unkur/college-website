@if (count($errors) > 0)
    <div class="box-body">
        <div class="callout callout-danger">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    </div>
@endif