@extends('layout.guest')

@section('title', 'Login')

@section('content')

<x-auth-session-status class="tw-mb-4" :status="session('status')" />

<form method="POST" action="{{ route('login') }}">
    @csrf

    <!-- Email Address -->
    <div>
        <x-input-label for="email" :value="__('Email')" />
        <x-text-input id="email" class="tw-block tw-mt-1 tw-w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
        <x-input-error :messages="$errors->get('email')" class="tw-mt-2" />
    </div>

    <!-- Password -->
    <div class="tw-mt-4">
        <x-input-label for="password" :value="__('Password')" />
        <x-text-input id="password" class="tw-block tw-mt-1 tw-w-full"
                    type="password"
                    name="password"
                    required autocomplete="current-password" />
        <x-input-error :messages="$errors->get('password')" class="tw-mt-2" />
    </div>

    <!-- Remember Me -->
    <div class="tw-block tw-mt-4">
        <label for="remember_me" class="tw-inline-flex tw-items-center">
            <input id="remember_me" type="checkbox" class="tw-rounded tw-border-gray-300 dark:tw-border-gray-700 tw-text-indigo-600 tw-shadow-sm focus:tw-ring-indigo-500 dark:focus:tw-ring-indigo-600 dark:focus:tw-ring-offset-gray-800" name="remember">
            <span class="tw-ms-2 tw-text-sm tw-text-gray-600 dark:tw-text-gray-400">{{ __('Remember me') }}</span>
        </label>
    </div>

    <div class="tw-flex tw-items-center tw-justify-end tw-mt-4">
        @if (Route::has('password.request'))
            <a class="tw-underline tw-text-sm tw-text-gray-600 dark:tw-text-gray-400 hover:tw-text-gray-900 dark:hover:tw-text-gray-900 tw-rounded-md focus:tw-outline-none focus:tw-ring-2 focus:tw-ring-offset-2 focus:tw-ring-indigo-500 dark:focus:tw-ring-offset-gray-800 tw-me-2" href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
            </a>
        @endif

        <x-primary-button class="tw-ms-3">
            {{ __('Log in') }}
        </x-primary-button>
    </div>
</form>

@endsection