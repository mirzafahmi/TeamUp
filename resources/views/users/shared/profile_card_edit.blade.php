<div class="card">
    <div class="px-3 pt-4 pb-2">
        <form enctype="multipart/form-data" method="POST" action="{{ route('users.update', $user->id) }}">
            @csrf
            @method('put')
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <img style="width:150px" class="me-3 avatar-sm rounded-circle"
                        src="{{ $user->getImageURL()}}" alt="Avatar">
                    <div>
                        <label for="">Name</label>
                        <input name="name" value="{{ old('name', $user->name) }}" type="text" class="form-control">
                        @error('name')
                            <span class="text-danger fs-6">{{ $message }}</span>
                        @enderror
                    </div>
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
            </div>
            <div class="mt-4">
                <label for="">
                    Profile Picture
                </label>
                <input name="image" class="form-control" type="file">

                @error('image')
                    <span class="text-danger fs-6">{{ $message }}</span>
                @enderror
            </div>
            <div class="px-2 mt-4">
                <h5 class="fs-5"> Bio : </h5>
                <div class="mb-3">
                    <textarea name="bio" class="form-control" id="bio" rows="3">{{ old('bio', $user->bio) }}</textarea>

                    @error('bio')
                        <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                    @enderror
                </div>
                <livewire:preferred-sport-edit :user="$user" />
                <button class="btn btn-dark btn-sm mb-3" type="submit">
                    Save
                </button>
            </div>
        </form>
    </div>
</div>