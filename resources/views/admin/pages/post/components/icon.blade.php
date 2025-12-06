<div class="col-md-3">
    <label class="form-label">Service Icon</label>
            @php
            if($post){

                $meta = json_decode($post->meta,true);
            }
;    @endphp
    <input type="text" name="icon" class="form-control" placeholder="Font awesome icon class" value="{{ old('icon',$meta['icon']??'') }}" >
    @error('icon')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
