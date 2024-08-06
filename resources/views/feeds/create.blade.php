@auth()
    <h1 class="mb-4"> Team Up ?</h1>
    <div class="row">
        <form action="{{ route('feeds.store') }}" method="post" class="d-grid">
            @csrf
            <div class="mb-3">
                <textarea name="content" class="form-control" id="content" rows="3"></textarea>
                @error('content')
                    <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                @enderror
            </div>
            @livewire('sport-details')
            <button type="submit" class="btn btn-dark btn-block mt-2">Create Feed</button>
        </form>
    </div>
@endauth