@auth()
    <h1 class="mb-4"> Team Up ?</h1>
    <div class="row">
        <form action="{{ route('feeds.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <textarea name="content" class="form-control" id="content" rows="3"></textarea>
                @error('content')
                    <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                @enderror
            </div>
            @livewire('game-mode-role')
            @include('feeds.shared.date-time-form')
            <div class="form-floating mb-3">
                <input type="number" name="spot_availability" class="form-control" id="spotAvailability" placeholder="Enter a number" aria-label="Number input">
                <label for="spotAvailability">Spot Availablity</label>
                @error('spot_availability')
                    <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-dark"> Share </button>
        </form>
    </div>
@endauth