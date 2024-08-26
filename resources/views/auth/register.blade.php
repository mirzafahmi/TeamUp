@extends('layout.guest')

@section('title', 'Register')

@section('content')
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="tw-block tw-mt-1 tw-w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="tw-mt-2" />
        </div>

        <!-- username -->
        <div class="tw-mt-4">
            <x-input-label for="username" :value="__('Username')" />
            <x-text-input id="username" class="tw-block tw-mt-1 tw-w-full" type="text" name="username" :value="old('username')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('username')" class="tw-mt-2" />
        </div>

        <!-- Email Address -->
        <div class="tw-mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="tw-block tw-mt-1 tw-w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="tw-mt-2" />
        </div>

        <!-- Password -->
        <div class="tw-mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="tw-block tw-mt-1 tw-w-full"
                          type="password"
                          name="password"
                          required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="tw-mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="tw-mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="tw-block tw-mt-1 tw-w-full"
                          type="password"
                          name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="tw-mt-2" />
        </div>

        <div class="tw-flex tw-items-center tw-justify-end tw-mt-4">
            <a class="tw-underline tw-text-sm tw-text-gray-600 dark:tw-text-gray-400 hover:tw-text-gray-900 dark:hover:tw-text-gray-900 tw-rounded-md focus:tw-outline-none focus:tw-ring-2 focus:tw-ring-offset-2 focus:tw-ring-indigo-500 dark:focus:tw-ring-offset-gray-800 tw-me-2" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="tw-ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
@endsection
