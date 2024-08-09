<div class="form-floating mt-2">
    <input 
        class="form-control @error('event_date') is-invalid @enderror" 
        type="datetime-local" 
        name="event_date" 
        id="datetime"
        value="{{ old('event_date', isset($editing) && $editing ? \Carbon\Carbon::parse($feed->event_date)->format('Y-m-d\TH:i') : '') }}">
    <label for="datetime">Event Date & Time</label>
    @error('event_date')
        <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
    @enderror
</div>