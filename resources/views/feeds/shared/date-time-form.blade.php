<div class="form-floating mt-2">
    <input class="form-control" type="datetime-local" name="event_date" id="datetime"
        value="{{ isset($editing) && $editing ? \Carbon\Carbon::parse($feed->event_date)->format('Y-m-d\TH:i') : '' }}">
    <label for="datetime">Event Date & Time</label>
</div>