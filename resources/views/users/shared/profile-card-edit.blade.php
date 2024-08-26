<section>
    <header class="d-flex align-items-center justify-content-between">
        <div>
            <h2 class="tw-text-lg tw-font-medium">
                Profile Infomations
            </h2>

            <p class="tw-mt-1 tw-text-sm ">
                Update your account's profile information and email address.
            </p>
        </div>
        <div>
            @auth()
                @if (Auth::id() === $user->id)
                    <a href="{{ route('profile', $user->id) }}">
                        <i class="fa-solid fa-ban"></i>
                        Cancel
                    </a>
                @endif
            @endauth
        </div>
    </header>

    <form enctype="multipart/form-data" method="POST" action="{{ route('users.update', $user->id) }}">
        @csrf
        @method('put')
    
        <div class="d-flex align-items-center mt-4">
            <img style="width:150px" class="me-3 avatar-sm rounded-circle"
                src="{{ $user->getImageURL()}}" alt="Avatar"
            >
        </div>
        <div class="row mt-4">
            <div class="col">
                <label for="name">Name</label>
                <input name="name" value="{{ old('name', $user->name) }}" type="text" class="form-control">
                @error('name')
                    <span class="text-danger fs-6">{{ $message }}</span>
                @enderror
            </div>
            <div class="col">
                <label for="username">Username</label>
                <input name="username" value="{{ old('username', $user->username) }}" type="text" class="form-control">
                @error('username')
                    <span class="text-danger fs-6">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="row mt-4">
            <div class="col">
                <label for="email">Email</label>
                <input name="email" value="{{ old('email', $user->email) }}" type="email" class="form-control">
                @error('email')
                    <span class="text-danger fs-6">{{ $message }}</span>
                @enderror
            </div>
            <div class="col">
                <label for="image">Profile Picture</label>
                <input name="image" class="form-control" type="file">
                @error('image')
                    <span class="text-danger fs-6">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="mt-4">
            <label for="bio">Bio :</label>
            <div class="mb-3">
                <textarea name="bio" class="form-control" id="bio" rows="3">{{ old('bio', $user->bio) }}</textarea>
                @error('bio')
                    <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                @enderror
            </div>
            <livewire:preferred-sport-edit :user="$user" />
        </div>
        <button class="btn btn-dark btn-sm" type="submit">
            Save
        </button>
    </form>
</section>


