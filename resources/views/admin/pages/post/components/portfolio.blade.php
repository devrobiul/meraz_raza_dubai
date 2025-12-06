<div class="col-md-3">
    <label class="form-label">{{ ucfirst($post->type??$type) }} link</label>
    <input type="text" name="link" class="form-control" placeholder="{{ ucfirst($post->type??$type) }} link" value="{{ old('link') }}">
    @error('link')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
