<div class="card overflow-hidden mt-3">
    <div class="card-body pt-3">
        <h3>Top Sports</h3>
        <hr>
        <div id="sportsList" class="mt-3">
            @foreach ($sports as $index => $sport)
                @livewire('sport-card', [
                        'sport' => $sport, 
                        'index' => $index, 
                        'totalCount' => count($sports)
                    ], 
                    key($sport->id))
            @endforeach
        </div>
    </div>
</div>