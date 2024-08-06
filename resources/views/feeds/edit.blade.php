@extends('layout.dashboard')

@section('middle-content')
    @auth()
        <h1 class="mb-4"> Editing your TeamUp feed ?</h1>
        <div class="row">
            <form action="{{ route('feeds.update', $feed->id) }}" method="post" class="d-grid">
                @csrf
                @method('put')
                <div class="mb-3">
                    <textarea name="content" class="form-control" id="content" rows="3">{{ $feed->content }}</textarea>
                    @error('content')
                        <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                    @enderror
                </div>
                @livewire('sport-details', [
                    'feed' => $feed,
                    'editing' => $editing
                ])
                <button type="submit" class="btn btn-dark btn-block">Edit Feed</button>
            </form>
        </div>
    @endauth
@endsection
