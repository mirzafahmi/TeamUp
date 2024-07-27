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
            @include('feed.shared.date-time-form')
            <button type="submit" class="btn btn-dark"> Share </button>
        </form>
    </div>
    @livewire('test-component')
@endauth
@guest()
    <h4> TBC </h4>
@endguest