@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>

        @foreach ($errors->all() as $error)
            <div class="alert alert-danger p-1" role="alert">
                {{ $error }}
            </div>
        @endforeach

    </div>
@endif
