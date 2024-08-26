<section class="tw-space-y-6">
    <header>
        <h2 class="tw-text-lg tw-font-medium ">
            {{ __('Delete Account') }}
        </h2>

        <p class="tw-mt-1 tw-text-sm ">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >{{ __('Delete Account') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('users.destroy', $user->id) }}" class="tw-p-6">
            @csrf
            @method('delete')

            <h2 class="tw-text-lg tw-font-medium">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="tw-mt-1 tw-text-sm">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div class="tw-mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="tw-mt-1 tw-block tw-w-3/4"
                    placeholder="{{ __('Password') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="tw-mt-2" />
            </div>

            <div class="tw-mt-6 tw-flex tw-justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="tw-ms-3">
                    {{ __('Delete Account') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
