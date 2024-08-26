@props(['active'])

@php
$classes = ($active ?? false)
            ? 'tw-block tw-w-full tw-ps-3 tw-pe-4 tw-py-2 tw-border-l-4 tw-border-indigo-400 dark:tw-border-indigo-600 tw-text-start tw-text-base tw-font-medium tw-text-indigo-700 dark:tw-text-indigo-300 tw-bg-indigo-50 dark:tw-bg-indigo-900/50 focus:outline-none focus:tw-text-indigo-800 dark:focus:tw-text-indigo-200 focus:tw-bg-indigo-100 dark:focus:tw-bg-indigo-900 focus:tw-border-indigo-700 dark:focus:tw-border-indigo-300 transition tw-duration-150 tw-ease-in-out'
            : 'tw-block tw-w-full tw-ps-3 tw-pe-4 tw-py-2 tw-border-l-4 tw-border-transparent tw-text-start tw-text-base tw-font-medium tw-text-gray-600 dark:tw-text-gray-400 hover:tw-text-gray-800 dark:hover:tw-text-gray-200 hover:tw-bg-gray-50 dark:hover:tw-bg-gray-700 hover:tw-border-gray-300 dark:hover:tw-border-gray-600 focus:outline-none focus:tw-text-gray-800 dark:focus:tw-text-gray-200 focus:tw-bg-gray-50 dark:focus:tw-bg-gray-700 focus:tw-border-gray-300 dark:focus:tw-border-gray-600 transition tw-duration-150 tw-ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
