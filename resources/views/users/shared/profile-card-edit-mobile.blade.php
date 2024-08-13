<div class="card">
    <div class="px-3 pt-4 pb-2">
        <form enctype="multipart/form-data" method="POST" action="{{ route('users.update', $user->id) }}">
            @csrf
            @method('put')
            <div class="d-flex align-items-center justify-content-between mb-3 position-relative">
                <div class="d-flex align-items-center">
                    <img style="width:120px" class="me-3 avatar-sm rounded-circle"
                        src="{{ $user->getImageURL()}}" alt="Avatar">
                </div>
                <div class="position-absolute top-0 end-0">
                    @auth()
                        @if (Auth::id() === $user->id)
                            <a href="{{ route('profile', $user->id) }}" class="btn btn-sm btn-light border-1 border-dark">
                                <i class="fa-solid fa-ban"></i>
                            </a>
                        @endif
                    @endauth
                </div>
            </div>
            <div>
                <label for="name">Name</label>
                <input name="name" value="{{ old('name', $user->name) }}" type="text" class="form-control">
                @error('name')
                    <span class="text-danger fs-6">{{ $message }}</span>
                @enderror
            </div>
            <div class="mt-4">
                <label for="image">
                    Profile Picture
                </label>
                <input name="image" class="form-control" type="file">
                @error('image')
                    <span class="text-danger fs-6">{{ $message }}</span>
                @enderror
            </div>
            <div class="mt-4">
                <h5 class="fs-5"> Bio : </h5>
                <div class="mb-3">
                    <textarea name="bio" class="form-control" id="bio" rows="5">{{ old('bio', $user->bio) }}</textarea>
                    @error('bio')
                        <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                    @enderror
                </div>
                <livewire:preferred-sport-edit :user="$user" />
            </div>
            <button class="btn btn-dark btn-sm mb-3" type="submit">
                Save
            </button>
        </form>
    </div>
</div>