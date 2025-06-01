@props(['messages'])

@if ($messages)
    <div {{ $attributes->merge(['class' => 'mt-2 p-3 border-l-4 border-orange-600 bg-white shadow-md rounded-md']) }}>
        <ul class="list-none p-0 m-0 text-sm text-gray-800 space-y-1">
            @foreach ((array) $messages as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>
    </div>
@endif
