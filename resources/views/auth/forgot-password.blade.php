@extends('layout.guest')

@section('title', 'Forgot-password')

@section('content')

<div class="tw-mb-4 tw-text-sm tw-text-gray-600 dark:tw-text-gray-400">
    {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
</div>

<!-- Session Status -->
<x-auth-session-status class="tw-mb-4" :status="session('status')" />

<form method="POST" action="{{ route('password.email') }}">
    @csrf

    <!-- Email Address -->
    <div>
        <x-input-label for="email" :value="__('Email')" />
        <x-text-input id="email" class="tw-block tw-mt-1 tw-w-full" type="email" name="email" :value="old('email')" required autofocus />
        <x-input-error :messages="$errors->get('email')" class="tw-mt-2" />
    </div>

    <div class="tw-flex tw-items-center tw-justify-end tw-mt-4">
        <a href="{{route('login')}}" class="tw-me-3">
            <x-secondary-button>
                {{'Cancel'}}
            </x-secondary-button>
        </a>
        <x-primary-button>
            {{ __('Email Password Reset Link') }}
        </x-primary-button>
    </div>
</form>

@endsection
