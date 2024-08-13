<div class="mb-2">
    <x-dropdown-select
        id="sportSelect"
        modelLive="sportId"
        name="sport_id"
        placeholder="Select Sports"
        :options="$sports"
        label="Sports List"
        oldValue="old('sport_id', $sportId)"
        :editing="$editing"
    />

    <x-dropdown-select
        id="levelSelect"
        model="levelId"
        name="play_level_id"
        placeholder="Select Levels"
        :options="$levels"
        label="Levels List"
        :oldValue="old('play_level_id', $levelId)"
        :editing="$editing"
    />

    <x-dropdown-select
        id="modeSelect"
        model="modeId"
        name="play_mode_id"
        placeholder="Select Modes"
        :options="$modes"
        label="Modes List"
        :oldValue="old('play_mode_id', $modeId)"
        :editing="$editing"
    />

    @foreach($roleSets as $index => $set)
        <div class="d-flex justify-content-between">
            <div class="flex-grow-1 me-1">
                <x-dropdown-select
                    id="roleSelect{{ $index }}"
                    model="roleSets.{{ $index }}.role"
                    name="play_role_id[]"
                    placeholder="Select Roles"
                    :options="$roles"
                    label="Roles List"
                    :editing="$editing"
                    oldValue="{{ old('play_role_id.'.$index, $set['role']) }}"
                />
            </div>
            <div class="flex-grow-1 ms-1">
                <x-spot-availability-input
                    id="spotAvailability{{ $index }}"
                    model="roleSets.{{ $index }}.spot"
                    name="spot_availability[]"
                    value="{{ old('spot_availability.'.$index, $set['spot']) }}"
                />
            </div>
        </div>
    @endforeach
    
    <a href="#" wire:click.prevent="addRoleSet" class="p-2 fs-6 text-muted">
        Add More Roles
    </a>

    <div class="d-flex justify-content-between flex-column flex-sm-row">
        <div class="flex-grow-1 mb-2 mb-sm-0 me-sm-1">  
            <x-dropdown-select
                id="eventLocationSelect"
                model="locationId"
                name="event_location_id"
                placeholder="Select Event Location"
                :options="$locations"
                label="Event Location List"
                :oldValue="old('event_location_id', $locationId)"
                :editing="$editing"
            />
        </div>
        <div class="flex-grow-1 ms-1">
            @include('feeds.shared.date-time-form')
        </div>
    </div>
</div>
