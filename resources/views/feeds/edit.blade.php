@extends('layout.dashboard')

@section('middle-content')
    @auth()
        <h1 class="mb-4"> Editing your TeamUp feed ?</h1>
        <div class="row">
            <form action="{{ route('feeds.update', $feed->id) }}" method="post">
                @csrf
                @method('put')
                <div class="mb-3">
                    <textarea name="content" class="form-control" id="content" rows="3">{{ $feed->content }}</textarea>
                    @error('content')
                        <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                    @enderror
                </div>
                @livewire('game-mode-role', [
                    'feed' => $feed,
                    'editing' => $editing
                ])
                @include('feeds.shared.date-time-form')
                <div class="form-floating mb-3">
                    <input value="{{ $feed->spot_availability }}" type="number" name="spot_availability" class="form-control" id="spotAvailability" placeholder="Enter a number" aria-label="Number input">
                    <label for="spotAvailability">Spot Availablity</label>
                    @error('spot_availability')
                        <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-dark"> Share </button>
            </form>
        </div>
    @endauth
@endsection
