@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'tw-text-sm tw-text-red-600 dark:tw-text-red-400 tw-space-y-1']) }}>
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif
