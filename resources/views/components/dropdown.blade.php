@props(['align' => 'right', 'width' => '48', 'contentClasses' => 'py-1 bg-white dark:bg-gray-700'])

@php
$alignmentClasses = match ($align) {
    'left' => 'ltr:tw-origin-top-left rtl:tw-origin-top-right tw-start-0',
    'top' => 'tw-origin-top',
    default => 'ltr:tw-origin-top-right rtl:tw-origin-top-left tw-end-0',
};

$width = match ($width) {
    '48' => 'tw-w-48',
    default => $width,
};
@endphp

<div class="tw-relative" x-data="{ open: false }" @click.outside="open = false" @close.stop="open = false">
    <div @click="open = ! open">
        {{ $trigger }}
    </div>

    <div x-show="open"
            x-transition:enter="tw-transition tw-ease-out tw-duration-200"
            x-transition:enter-start="tw-opacity-0 tw-scale-95"
            x-transition:enter-end="tw-opacity-100 tw-scale-100"
            x-transition:leave="tw-transition tw-ease-in tw-duration-75"
            x-transition:leave-start="tw-opacity-100 tw-scale-100"
            x-transition:leave-end="tw-opacity-0 tw-scale-95"
            class="tw-absolute tw-z-50 tw-mt-2 {{ $width }} tw-rounded-md tw-shadow-lg {{ $alignmentClasses }}"
            style="display: none;"
            @click="open = false">
        <div class="tw-rounded-md tw-ring-1 tw-ring-black tw-ring-opacity-5 {{ $contentClasses }}">
            {{ $content }}
        </div>
    </div>
</div>
