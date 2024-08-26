@extends('layout.guest')

@section('title', 'Verify Email')

@section('content')
    <div class="tw-mb-4 tw-text-sm tw-text-gray-600 dark:tw-text-gray-400">
        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="tw-mb-4 tw-font-medium tw-text-sm tw-text-green-600 dark:tw-text-green-400">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <div class="tw-mt-4 tw-flex tw-items-center tw-justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('Resend Verification Email') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="tw-underline tw-text-sm tw-text-gray-600 dark:tw-text-gray-400 hover:tw-text-gray-900 dark:hover:tw-text-gray-100 tw-rounded-md focus:tw-outline-none focus:tw-ring-2 focus:tw-ring-offset-2 focus:tw-ring-indigo-500 dark:focus:tw-ring-offset-gray-800">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
@endsection
