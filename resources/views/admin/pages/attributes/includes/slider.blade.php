<div class="col-md-12">
    <div class="form-group">
        <label for="file-upload-name">
                <label class="form-label">{{ ucfirst($type) }} photo</label>
            <input type="file" name="image" class="form-control" id="file-upload-name">
        </label>
    </div>
    <img src="{{ asset($attribute->image ?? null) }}" width="200px" alt="">
</div>
