<div class="mb-3">
    <div class="form-floating">
        <select wire:model.live="sportId" class="form-select" aria-label="Floating label select example">
            <option value="">Select Sports</option>
            @foreach ($this->sports as $sport)
                <option value="{{ $sport->id }}">{{ $sport->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-floating">
        <select wire:model="modeId" class="form-select" aria-label="Floating label select example">
            <option value="">Select Modes</option>
            @foreach ($this->modes as $mode)
                <option value="{{ $mode->id }}">{{ $mode->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-floating">
        <select wire:model="roleId" class="form-select" aria-label="Floating label select example">
            <option value="">Select Roles</option>
            @foreach ($this->roles as $role)
                <option value="{{ $role->id }}">{{ $role->name }}</option>
            @endforeach
        </select>
    </div>
</div>
