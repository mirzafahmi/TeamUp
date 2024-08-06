@props([
    'id',
    'name',
    'value' => null,
])

<div class="form-floating mt-2">
    <input 
        type="number" 
        name="{{ $name}}" 
        class="form-control" 
        id="spotAvailability_{{ $id }}" 
        placeholder="Enter a number" 
        aria-label="Number input"
        value="{{ $value }}"
    >
    <label for="{{ $id }}">Spot Availability</label>
    @error('{{ $id }}')
        <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
    @enderror
</div>
