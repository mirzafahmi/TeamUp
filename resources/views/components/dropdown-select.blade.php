@props([
    'id', 
    'model' => null,
    'modelLive' => null,
    'name', 
    'placeholder', 
    'options', 
    'label', 
    'oldValue' => null, 
    'editing' => false,
])

<div class="form-floating mt-2">
    <select 
        id="{{ $id }}" 
        @if($modelLive) 
            wire:model.live="{{ $modelLive }}" 
        @elseif($model) 
            wire:model="{{ $model }}" 
        @endif
        name="{{ $name }}" 
        class="form-select @error($name) is-invalid @enderror" 
        aria-label="Floating label select example"
    >
        <option value="">{{ $placeholder }}</option>
        @foreach ($options as $option)
            <option value="{{ $option->id }}" 
                {{ (old($name, $oldValue) == $option->id) ? 'selected' : '' }}
            >
                {{ $option->name }}
            </option>
        @endforeach
    </select>
    <label for="{{ $id }}">{{ $label }}</label>
    @error(str_replace('[]', '', $name))
        <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
    @enderror
</div>
