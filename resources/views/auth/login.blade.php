@extends('layout.guest')

@section('title', 'Login')

@section('content')

<x-auth-session-status class="tw-mb-4" :status="session('status')" />

<div class="tw-text-center tw-mb-4">
    <h1 class="tw-text-2xl tw-font-semibold tw-text-gray-800">Welcome Back!</h1>
    <div class="tw-flex tw-items-center tw-my-4">
        <div class="tw-flex-grow tw-border-t tw-border-gray-300"></div>
        <span class="tw-px-4 tw-text-gray-500">Log-in</span>
        <div class="tw-flex-grow tw-border-t tw-border-gray-300"></div>
    </div>
</div>
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

    <div class="tw-mt-4 tw-flex tw-flex-col tw-items-center tw-justify-center">
        <x-primary-button class="tw-ms-3">
            {{ __('Log in') }}
        </x-primary-button>

        @if (Route::has('password.request'))
            <a class="tw-underline tw-text-sm tw-text-gray-600 dark:tw-text-gray-400 hover:tw-text-gray-900 dark:hover:tw-text-gray-900 tw-rounded-md focus:tw-outline-none focus:tw-ring-2 focus:tw-ring-offset-2 focus:tw-ring-indigo-500 dark:focus:tw-ring-offset-gray-800 tw-me-2 tw-mt-2" href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
            </a>
        @endif
    </div>

    <div class="tw-flex tw-items-center tw-my-4">
        <div class="tw-flex-grow tw-border-t tw-border-gray-300"></div>
        <span class="tw-px-4 tw-text-gray-500">or</span>
        <div class="tw-flex-grow tw-border-t tw-border-gray-300"></div>
    </div>

    <div>
        <x-provider-button provider="google" text="Continue with Google" classes="tw-mb-4" />
        <x-provider-button provider="github" text="Continue with GitHub" classes="tw-mb-4" />
    </div>

    <div class="tw-flex tw-items-center tw-justify-center">
        <span>
            New to TeamUp ?
        </span>
        <a 
            class="tw-ms-2 tw-underline tw-text-sm tw-text-gray-600 dark:tw-text-gray-400 hover:tw-text-gray-900 dark:hover:tw-text-gray-900 tw-rounded-md focus:tw-outline-none focus:tw-ring-2 focus:tw-ring-offset-2 focus:tw-ring-indigo-500 dark:focus:tw-ring-offset-gray-800 tw-me-2" 
            href="{{ route('register') }}"
        >
            Sign-up
        </a>
    </div>
</form>

@endsection