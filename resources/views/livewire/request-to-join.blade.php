<div>
    <div class="p-2">
        <input type="checkbox" wire:model.live="showRoleDropdown" name="request_to_join" {{ $showRoleDropdown ? 'checked' : '' }}>
        <label class="fs-6 text-muted">Request to join</label>
    </div>
    
    @if($showRoleDropdown)
        <x-dropdown-select
            id="roleSelect"
            model="selectedRole"
            name="play_role_id"
            placeholder="Select Role"
            :options="$roles"
            label="Roles List"
            :oldValue="$selectedRole"
            :editing="$editing"
        />
    @endif
</div>
