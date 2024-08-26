<section>
    <header>
        <h2 class="tw-text-lg tw-font-medium tw-text-gray-900 dark:tw-text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="tw-mt-1 tw-text-sm tw-text-gray-600 dark:tw-text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="tw-mt-6 tw-space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="tw-mt-1 tw-block tw-w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="tw-mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="tw-mt-1 tw-block tw-w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="tw-mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="tw-text-sm tw-mt-2 tw-text-gray-800 dark:tw-text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="tw-underline tw-text-sm tw-text-gray-600 dark:tw-text-gray-400 hover:tw-text-gray-900 dark:hover:tw-text-gray-100 tw-rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="tw-mt-2 tw-font-medium tw-text-sm tw-text-green-600 dark:tw-text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="tw-flex tw-items-center tw-gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="tw-text-sm tw-text-gray-600 dark:tw-text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
