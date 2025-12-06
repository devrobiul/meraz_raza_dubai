<div class="col-sm-12 mb-3">
    <label class="form-label">Parent Make</label>
    <select class="form-control form-control-sm select2" name="parent_id" data-placeholder="Select" required>
        <option value="" class="form-select">Select Parent Category</option>
        @foreach (App\Models\Attribute::where('type', 'make')->get() as $maker)
            @if (!isset($attribute) || $attribute->id !== $maker->id)
                <option value="{{ $maker->id }}" @if (isset($attribute) && $attribute->parent_id == $maker->id) selected @endif>
                    {{ $maker->name }}
                </option>
            @endif
        @endforeach
    </select>
</div>
