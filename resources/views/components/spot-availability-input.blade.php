@props([
    'id',
    'name',
    'value' => null,
])

<div class="form-floating mt-2">
    <input 
        type="number" 
        name="{{ $name }}" 
        class="form-control @error(str_replace('[]', '', $name)) is-invalid @enderror" 
        id="{{ $id }}" 
        placeholder="Enter a number" 
        aria-label="Number input"
        value="{{ old($name, $value) }}"
    >
    <label for="{{ $id }}">Spot Availability</label>
    @error(str_replace('[]', '', $name))
        <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
    @enderror
</div>
