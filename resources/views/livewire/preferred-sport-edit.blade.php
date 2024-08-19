<div class="col mt-4">
    <h5 class="fs-5"> Preferred Sports: </h5>
    <div class="form-floating mb-2">
        <select id="sportSelect" wire:model.live="sportId" name="sport_id" class="form-select" aria-label="Floating label select example">
            <option value="">Select Sports</option>
            @foreach ($availableSports as $sport)
                <option value="{{ $sport->id }}">{{ $sport->name }}</option>
            @endforeach
        </select>
        <label for="sportSelect">Sports List</label>
    </div>
    <p class="fs-6 fw-light">
        @foreach ($preferredSports as $preferredSport)
            <div class="position-relative d-inline-block">
                <img 
                    style="width:50px; height: 50px;" 
                    class="me-2 avatar-sm rounded-circle" 
                    src="{{ $preferredSport->getImageURL() }}"
                    alt="{{ $preferredSport->name }}"
                >
                <button type="button" class="btn btn-danger position-absolute top-0 end-0"
                    wire:click="deletePreferredSport('{{ $preferredSport->id }}')"
                    style="--bs-btn-padding-y: .001rem; --bs-btn-padding-x: .25rem; --bs-btn-font-size: .1rem;"
                >
                    X
                </button>
            </div>    
        @endforeach
    </p>
</div>
