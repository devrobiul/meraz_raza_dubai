

@php
    if($post){
        $meta = json_decode($post->meta,true);
    }
@endphp
<div class="col-md-3">
    <label class="form-label">Award Organization</label>
    <input type="text" name="award_org" class="form-control" placeholder="Award Organization" value="{{ old('award_org',$meta['award_org']??'') }}">
    @error('award_org')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="col-md-3">
    <label class="form-label">Award Year</label>
    <input type="text" name="award_year" class="form-control" placeholder="Award Year" value="{{ old('award_year',$meta['award_year']??'') }}">
    @error('r_year')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

