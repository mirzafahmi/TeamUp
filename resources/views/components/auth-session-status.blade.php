@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'tw-font-medium tw-text-sm tw-text-green-600 dark:tw-text-green-400']) }}>
        {{ $status }}
    </div>
@endif
