<div class="mb-2">
    <x-dropdown-select
        id="sportSelect"
        model="sportId"
        name="sport_id"
        placeholder="Select Sports"
        :options="$sports"
        label="Sports List"
        :oldValue="$sportId"
        :editing="$editing"
    />

    <x-dropdown-select
        id="levelSelect"
        model="levelId"
        name="play_level_id"
        placeholder="Select Levels"
        :options="$levels"
        label="Levels List"
        :oldValue="$levelId"
        :editing="$editing"
    />

    <x-dropdown-select
        id="modeSelect"
        model="modeId"
        name="play_mode_id"
        placeholder="Select Modes"
        :options="$modes"
        label="Modes List"
        :oldValue="$modeId"
        :editing="$editing"
    />

    <x-dropdown-select
        id="roleSelect"
        model="roleId"
        name="play_role_id"
        placeholder="Select Roles"
        :options="$roles"
        label="Roles List"
        :oldValue="$roleId"
        :editing="$editing"
    />

    <x-dropdown-select
        id="eventLocationSelect"
        model="locationId"
        name="event_location_id"
        placeholder="Select Event Location"
        :options="$locations"
        label="Event Location List"
        :oldValue="$locationId"
        :editing="$editing"
    />
</div>
