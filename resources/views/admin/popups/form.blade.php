<div class="mb-3">
    <label class="form-label">Title</label>

    <input type="text"
           name="title"
           class="form-control"
           value="{{ old('title', $popup->title ?? '') }}">
</div>

<div class="mb-3">
    <label class="form-label">Link</label>

    <input type="text"
           name="link"
           class="form-control"
           value="{{ old('link', $popup->link ?? '') }}">
</div>

<div class="mb-3">
    <label class="form-label">Image</label>

    <input type="file"
           name="image"
           class="form-control">

    @if(isset($popup) && $popup->image)
        <img src="{{ asset($popup->image) }}"
             width="150"
             class="mt-2">
    @endif
</div>

<div class="mb-3">
    <label class="form-label">Status</label>

    <select name="status"
            class="form-control">

        <option value="1"
            {{ old('status', $popup->status ?? 1) == 1 ? 'selected' : '' }}>
            Active
        </option>

        <option value="0"
            {{ old('status', $popup->status ?? 1) == 0 ? 'selected' : '' }}>
            Inactive
        </option>

    </select>
</div>

<button type="submit"
        class="btn btn-primary">

    Save Popup

</button>