@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>
        <div class="text-danger fw-bold">
            {{ __('Whoops! Something went wrong.') }}
        </div>

        <ul class="mt-3 text-danger fw-bold">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
