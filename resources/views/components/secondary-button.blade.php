<button {{ $attributes->merge(['type' => 'button', 'class' => 'tw-inline-flex tw-items-center tw-px-4 tw-py-2 tw-bg-white dark:tw-bg-gray-800 tw-border tw-border-gray-300 dark:tw-border-gray-500 tw-rounded-md tw-font-semibold tw-text-xs tw-text-gray-700 dark:tw-text-gray-300 tw-uppercase tw-tracking-widest tw-shadow-sm hover:tw-bg-gray-50 dark:hover:tw-bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
