<div class="mb-2">
    <div class="form-floating mb-2">
        <select id="sportSelect" wire:model.live="sportId" name="sport_id" class="form-select" aria-label="Floating label select example">
            <option value="">Select Sports</option>
            @foreach ($this->sports as $sport)
                <option value="{{ $sport->id }}">{{ $sport->name }}</option>
            @endforeach
        </select>
        <label for="sportSelect">Sports List</label>
    </div>
    <div class="form-floating mb-2">
        <select id="levelSelect" wire:model="levelId" name="play_level_id" class="form-select" aria-label="Floating label select example">
            <option value="">Select Levels</option>
            @foreach ($this->levels as $level)
                <option value="{{ $level->id }}">{{ $level->name }}</option>
            @endforeach
        </select>
        <label for="levelSelect">Levels List</label>
    </div>
    <div class="form-floating mb-2">
        <select id="modeSelect" wire:model="modeId" name="play_mode_id" class="form-select" aria-label="Floating label select example">
            <option value="">Select Modes</option>
            @foreach ($this->modes as $mode)
                <option value="{{ $mode->id }}">{{ $mode->name }}</option>
            @endforeach
        </select>
        <label for="modeSelect">Modes List</label>
    </div>
    <div class="form-floating mb-2">
        <select id="roleSelect" wire:model="roleId" name="play_role_id" class="form-select" aria-label="Floating label select example">
            <option value="">Select Roles</option>
            @foreach ($this->roles as $role)
                <option value="{{ $role->id }}">{{ $role->name }}</option>
            @endforeach
        </select>
        <label for="roleSelect">Roles List</label>
    </div>
</div>
