
            @php
            if($post){

                $meta = json_decode($post->meta,true);
            
            }
    @endphp
<div class="col-md-3">
    <label class="form-label">Reviw name</label>
    <input type="text" name="r_name" class="form-control" placeholder="Review name" value="{{ old('r_name',$meta['r_name']??'') }}" required>
    @error('r_name')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="col-md-3">
    <label class="form-label">Reviw designation</label>
    <input type="text" name="r_deg" class="form-control" placeholder="Review designation" value="{{ old('r_deg',$meta['r_deg']??'') }}" required>
    @error('r_deg')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
