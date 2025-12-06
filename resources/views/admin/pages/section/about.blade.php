@extends('admin.layout.app')

@section('title')
    {{ ucfirst($type) }} Section
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow-sm">
            <div class="card-header bg-light d-flex align-items-center">
                <i class="cil-settings me-2"></i>
                <h5 class="card-title mb-0">{{ ucfirst($type) }} Section</h5>
            </div>

            <div class="card-body">
                <form action="{{ route('admin.setting.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    {{-- Slider Image --}}
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">
                            <i class="cil-image me-1"></i> About section photo
                        </label>
                        <div class="col-sm-4">
                            <input type="file" name="about_img" class="form-control preview-input" data-preview="#slider_image_preview">
                        </div>
                        <div class="col-sm-10 offset-sm-2 mt-2">
                            <img id="slider_image_preview" src="{{ asset(setting('about_img')) }}" 
                                 class="img-fluid rounded border" style="max-height: 100px;">
                        </div>
                    </div>

                    {{-- Description --}}
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">
                            <i class="cil-description me-1"></i>About description
                        </label>
                        <div class="col-sm-10">
                            <textarea name="about_description" id="about_description" class="form-control" rows="4" 
                                      placeholder="{{ ucfirst($type) }} Description">{{ old('about_description', setting('about_description')) }}</textarea>
                            @error('about_description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    {{-- Slider Image --}}
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">
                            <i class="cil-image me-1"></i> About section photo (home)
                        </label>
                        <div class="col-sm-4">
                            <input type="file" name="about_img_home" class="form-control preview-input" data-preview="#slider_image_preview">
                        </div>
                        <div class="col-sm-10 offset-sm-2 mt-2">
                            <img id="slider_image_preview" src="{{ asset(setting('about_img_home')) }}" 
                                 class="img-fluid rounded border" style="max-height: 100px;">
                        </div>
                    </div>

                    {{-- Description --}}
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">
                            <i class="cil-description me-1"></i>About description  (home)
                        </label>
                        <div class="col-sm-10">
                            <textarea name="about_description_home" id="about_description_home" class="form-control" rows="4" 
                                      placeholder="{{ ucfirst($type) }} Description">{{ old('about_description_home', setting('about_description_home')) }}</textarea>
                            @error('about_description_home')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="cil-save me-1"></i> Save Settings
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="{{ asset('admin/tinymce/tinymce.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.preview-input').on('change', function() {
            let preview = $(this).data('preview');
            let file = this.files[0];

            if (file) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    $(preview).attr('src', e.target.result);
                }
                reader.readAsDataURL(file);
            }
        });
    });

        $(document).ready(function() {
            tinymce.init({
                selector: 'textarea#about_description,#about_description_home',
                height: 400,
                width: '100%',
                plugins: [
                    'advlist', 'autolink', 'link', 'image', 'lists', 'charmap', 'preview', 'anchor',
                    'pagebreak',
                    'searchreplace', 'wordcount', 'visualblocks', 'code', 'fullscreen',
                    'insertdatetime', 'media',
                    'table', 'emoticons', 'template', 'codesample'
                ],
                toolbar: 'undo redo | styles | bold italic underline | alignleft aligncenter alignright alignjustify |' +
                    'bullist numlist outdent indent | link image | print preview media fullscreen | ' +
                    'forecolor backcolor emoticons',
                menu: {
                    favs: {
                        title: 'Menu',
                        items: 'code visualaid | searchreplace | emoticons'
                    }
                },
                menubar: 'favs file edit view insert format tools table',
                content_style: 'body{font-family:Helvetica,Arial,sans-serif; font-size:16px}'
            });
        });
    </script>
@endpush
