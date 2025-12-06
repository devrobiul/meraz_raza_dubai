       <div class="col-md-12">
            @php
            if($post){

                $meta = json_decode($post->meta,true);
            }
;    @endphp
           <label class="form-label">Service short description</label>
           <textarea name="short_description" id="short_description" class="form-control" rows="2"
               placeholder=" Service short description ">{{ old('short_description',$meta['short_description']??'') }}</textarea>
           @error('short_description')
               <small class="text-danger">{{ $message }}</small>
           @enderror
       </div>
