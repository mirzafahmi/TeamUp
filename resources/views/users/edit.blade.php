@extends('layout.base')

@section('content')

@if (session('is_mobile'))
    @include('users.shared.profile-card-edit-mobile')
@else
    <div class="tw-py-12">
        <div class="tw-max-w-7xl tw-mx-auto sm:tw-px-6 lg:tw-px-8 tw-space-y-6">
            <div class="tw-p-4 sm:tw-p-8 tw-shadow sm:tw-rounded-lg card">
                @include('users.shared.profile-card-edit')
            </div>

            <div class="tw-p-4 sm:tw-p-8 tw-shadow sm:tw-rounded-lg card">
                @include('users.partials.update-password-form')
            </div>

            <div class="tw-p-4 sm:tw-p-8 tw-shadow sm:tw-rounded-lg card">
                @include('users.partials.delete-user-form')
            </div>
        </div>
    </div>
@endif

@endsection