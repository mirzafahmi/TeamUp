@props(['provider', 'text' => null, 'classes' => ''])

@php
    $providerColors = [
        'google' => 'tw-bg-white hover:tw-bg-gray-100 text-blue-500 tw-border tw-border-black',
        'github' => 'tw-bg-gray-800 hover:tw-bg-gray-900 tw-text-white',
        // Add more providers as needed
    ];

    $defaultClasses = $providerColors[$provider] ?? 'tw-bg-blue-500 hover:tw-bg-blue-600';
    $buttonText = $text ?? 'Continue with ' . ucfirst($provider);
@endphp

<a href="{{ url('login/' . $provider) }}"
   class="tw-flex tw-items-center tw-justify-center tw-p-2 tw-font-semibold tw-rounded tw-no-underline {{ $defaultClasses }} {{ $classes }}">
    <!-- Example SVG icons for Google and GitHub -->
    @if($provider === 'google')
    <svg class="tw-w-6 tw-h-6 tw-mr-2" aria-hidden="true" viewBox="-3 0 262 262">
        <path d="M255.878 133.451c0-10.734-.871-18.567-2.756-26.69H130.55v48.448h71.947c-1.45 12.04-9.283 30.172-26.69 42.356l-.244 1.622 38.755 30.023 2.685.268c24.659-22.774 38.875-56.282 38.875-96.027" fill="#4285F4"/>
        <path d="M130.55 261.1c35.248 0 64.839-11.605 86.453-31.622l-41.196-31.913c-11.024 7.688-25.82 13.055-45.257 13.055-34.523 0-63.824-22.773-74.269-54.25l-1.531.13-40.298 31.187-.527 1.465C35.393 231.798 79.49 261.1 130.55 261.1" fill="#34A853"/>
        <path d="M56.281 156.37c-2.756-8.123-4.351-16.827-4.351-25.82 0-8.994 1.595-17.697 4.206-25.82l-.073-1.73L15.26 71.312l-1.335.635C5.077 89.644 0 109.517 0 130.55s5.077 40.905 13.925 58.602l42.356-32.782" fill="#FBBC05"/>
        <path d="M130.55 50.479c24.514 0 41.05 10.589 50.479 19.438l36.844-35.974C195.245 12.91 165.798 0 130.55 0 79.49 0 35.393 29.301 13.925 71.947l42.211 32.783c10.59-31.477 39.891-54.251 74.414-54.251" fill="#EB4335"/>
    </svg>

    @elseif($provider === 'github')
        <svg class="tw-w-6 tw-h-6 tw-mr-2" aria-hidden="true" fill="currentColor" viewBox="0 0 24 24">
            <!-- GitHub SVG Path -->
            <path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.11.82-.258.82-.577v-2.17c-3.338.726-4.033-1.61-4.033-1.61-.546-1.387-1.333-1.756-1.333-1.756-1.09-.746.083-.73.083-.73 1.205.084 1.837 1.236 1.837 1.236 1.07 1.834 2.807 1.304 3.492.997.108-.775.418-1.305.76-1.605-2.665-.305-5.467-1.334-5.467-5.93 0-1.31.47-2.38 1.235-3.22-.125-.303-.535-1.524.115-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.4 3-.405 1.02.005 2.04.138 3 .405 2.29-1.552 3.3-1.23 3.3-1.23.65 1.653.24 2.874.12 3.176.765.84 1.235 1.91 1.235 3.22 0 4.61-2.805 5.62-5.475 5.92.43.372.81 1.102.81 2.22v3.293c0 .323.21.693.825.577 4.765-1.587 8.195-6.084 8.195-11.385 0-6.627-5.373-12-12-12z"/>
        </svg>
    @endif
    {{ $buttonText }}
</a>