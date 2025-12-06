  <div class="col-md-3">
      <label class="form-label">{{ ucfirst($post->type??$type) }} Category</label>
      <select name="attribute_id" class="form-select select2">
          <option value="">Select category</option>


@foreach ($categories as $category)
    <option value="{{ $category->id }}"
        {{ isset($post) && $post->attribute_id == $category->id ? 'selected' : '' }}>
        {{ $category->name }}
    </option>
@endforeach

          @error('attribute_id')
              <small class="text-danger">{{ $message }}</small>
          @enderror

      </select>
  </div>
