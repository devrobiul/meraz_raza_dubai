@extends('admin.layout.app')

@section('title')
    {{ ucfirst($type) }} section
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header bg-light d-flex align-items-center">
                    <i class="cil-settings me-2"></i>
                    <h5 class="card-title mb-0">{{ ucfirst($type) }} section</h5>
                </div>

                <div class="card-body">

                    <form action="{{ route('admin.setting.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        {{-- Slider Title --}}
                        <div class="mb-3 row align-items-center">
                            <label class="col-sm-2 col-form-label">
                                <i class="cil-pencil me-1"></i> Welcome title
                            </label>
                            <div class="col-sm-10">
                                <input type="text" name="wc_title" value="{{ setting('wc_title') }}"
                                    class="form-control" placeholder="Enter Wc title">
                            </div>
                        </div>
                        <div class="mb-3 row align-items-center">
                            <label class="col-sm-2 col-form-label">
                                <i class="cil-pencil me-1"></i> Slider title
                            </label>
                            <div class="col-sm-10">
                                <input type="text" name="slider_title" value="{{ setting('slider_title') }}"
                                    class="form-control" placeholder="Enter Slider title">
                            </div>
                        </div>

                        {{-- Slider Subtitle --}}
                        <div class="mb-3 row align-items-center">
                            <label class="col-sm-2 col-form-label">
                                <i class="cil-pencil me-1"></i> Slider sub title
                            </label>
                            <div class="col-sm-10">
                                <textarea name="slider_subtitle" class="form-control" rows="2" placeholder="Slider sub title">{{ setting('slider_subtitle') }}</textarea>
                            </div>
                        </div>

                        {{-- Slider Image --}}
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">
                                <i class="cil-image me-1"></i> Slider image (840x794)
                            </label>

                            <div class="col-sm-4">
                                <input type="file" name="slider_image" class="form-control preview-input"
                                    data-preview="#slider_image_preview">
                            </div>

                            <div class="col-sm-10 offset-sm-2 mt-2">
                                <img id="slider_image_preview" src="{{ asset(setting('slider_image')) }}"
                                    class="img-fluid rounded border" style="max-height: 100px;">
                            </div>
                        </div>

                        {{-- Slider Blur Image --}}
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">
                                <i class="cil-fire me-1"></i> Slider blur image
                            </label>

                            <div class="col-sm-4">
                                <input type="file" name="slider_blur_img" class="form-control preview-input"
                                    data-preview="#slider_blur_preview">
                            </div>

                            <div class="col-sm-10 offset-sm-2 mt-2">
                                <img id="slider_blur_preview" src="{{ asset(setting('slider_blur_img')) }}"
                                    class="img-fluid rounded border" style="max-height: 100px;">
                            </div>
                        </div>
                        <div class="mb-3 row align-items-center">
                            <label class="col-sm-2 col-form-label">
                                <i class="cil-pencil me-1"></i> Slider youtube video (Popup)
                            </label>
                            <div class="col-sm-10">
                                <input type="text" name="slider_video" value="{{ setting('slider_video') }}"
                                    class="form-control" placeholder="Enter youtube video (Popup)">
                            </div>
                        </div>
                        <div class="mb-3 row align-items-center">
                            <label class="col-sm-2 col-form-label">
                                <i class="cil-pencil me-1"></i> CV file upload
                            </label>

                            <div class="col-sm-10">
                                <input type="file" name="cv_file" class="form-control">

                                @if (setting('cv_file'))
                                    <div class="mt-2">
                                        <iframe src="{{ asset(setting('cv_file')) }}"
                                            style="width:100%; height:500px; border:1px solid #ddd;"></iframe>
                                    </div>
                                @endif
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
    </script>
@endpush
