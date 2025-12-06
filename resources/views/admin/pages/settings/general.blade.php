@extends('admin.layout.app')

@section('title')
Site Settings
@endsection

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card shadow-sm">
            <div class="card-header bg-light d-flex align-items-center">
                <i class="ri-settings-3-line me-2"></i>
                <h5 class="card-title mb-0">Site Settings</h5>
            </div>

            <div class="card-body">

                <form action="{{ route('admin.setting.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    {{-- App Name --}}
                    <div class="mb-3 row align-items-center">
                        <label class="col-sm-2 col-form-label">
                            <i class="ri-pencil-line me-1"></i> App Name
                        </label>
                        <div class="col-sm-10">
                            <input type="text" name="app_name" value="{{ setting('app_name') }}" 
                                   class="form-control" placeholder="Enter app name">
                        </div>
                    </div>

                    {{-- Primary Logo --}}
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">
                            <i class="ri-image-line me-1"></i> Primary Logo
                        </label>

                        <div class="col-sm-4">
                            <input type="file" name="primary_logo"
                                   class="form-control preview-input"
                                   data-preview="#primary_logo_preview">
                        </div>

                        <div class="col-sm-3">
                            <input type="text" name="primary_logo_width" placeholder="Width px" class="form-control form-control-sm">
                        </div>

                        <div class="col-sm-3">
                            <input type="text" name="primary_logo_height" placeholder="Height px" class="form-control form-control-sm">
                        </div>

                        <div class="col-sm-10 offset-sm-2 mt-2">
                            <img id="primary_logo_preview"
                                 src="{{ asset(setting('primary_logo')) }}"
                                 class="img-fluid rounded border"
                                 style="max-height: 100px;">
                        </div>
                    </div>

                    {{-- Secondary Logo --}}
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">
                            <i class="ri-image-2-line me-1"></i> Secondary Logo
                        </label>

                        <div class="col-sm-4">
                            <input type="file" name="secondary_logo"
                                   class="form-control preview-input"
                                   data-preview="#secondary_logo_preview">
                        </div>

                        <div class="col-sm-3">
                            <input type="text" name="secondary_logo_width" placeholder="Width px" class="form-control form-control-sm">
                        </div>

                        <div class="col-sm-3">
                            <input type="text" name="secondary_logo_height" placeholder="Height px" class="form-control form-control-sm">
                        </div>

                        <div class="col-sm-10 offset-sm-2 mt-2">
                            <img id="secondary_logo_preview"
                                 src="{{ asset(setting('secondary_logo')) }}"
                                 class="img-fluid rounded border"
                                 style="max-height: 100px;">
                        </div>
                    </div>

                    {{-- Favicon --}}
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">
                            <i class="ri-fire-line me-1"></i> Favicon
                        </label>

                        <div class="col-sm-4">
                            <input type="file" name="favicon"
                                   class="form-control preview-input"
                                   data-preview="#favicon_preview">
                        </div>

                        <div class="col-sm-10 offset-sm-2 mt-2">
                            <img id="favicon_preview"
                                 src="{{ asset(setting('favicon')) }}"
                                 class="img-fluid rounded border"
                                 style="max-height: 100px;">
                        </div>
                    </div>

       

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="ri-save-3-line me-1"></i> Save Settings
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
$(document).ready(function(){
    $('.preview-input').on('change', function(){
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
