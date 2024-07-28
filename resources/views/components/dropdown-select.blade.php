@props([
    'id', 
    'model', 
    'name', 
    'placeholder', 
    'options', 
    'label', 
    'oldValue' => null, 
    'editing' => false,
])

<div class="form-floating mb-2">
    <select 
        id="{{ $id }}" 
        wire:model.live="{{ $model }}" 
        name="{{ $name }}" 
        class="form-select" 
        aria-label="Floating label select example"
    >
        <option value="">{{ $placeholder }}</option>
        @foreach ($options as $option)
            <option value="{{ $option->id }}" {{ $editing && $oldValue == $option->id ? 'selected' : '' }}>
                {{ $option->name }}
            </option>
        @endforeach
    </select>
    <label for="{{ $id }}">{{ $label }}</label>
</div>
