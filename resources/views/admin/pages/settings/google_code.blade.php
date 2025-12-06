@extends('admin.layout.app')
@section('title')
Google Tracking & Verification Codes
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow-sm">
            <div class="card-header">
                <h5 class="card-title mb-0">Google Tracking & Verification Codes</h5>
            </div>
            <div class="card-body mt-3">
                <form action="{{ route('admin.setting.store') }}" method="post">
                    @csrf

                    <div class="row g-4">

                        <!-- Google Tag Manager Head -->
                        <div class="col-md-6">
                            <label for="gtm_head_code" class="form-label">GTM Head Code</label>
                            <textarea class="form-control bg-light border-secondary" name="gtm_head_code" id="gtm_head_code" rows="6"
                                      placeholder="Paste Google Tag Manager Head Code here">{{ setting('gtm_head_code') }}</textarea>
                            <small class="text-muted">Insert this inside the <code>&lt;head&gt;</code> tag.</small>
                        </div>

                        <!-- Google Tag Manager Body -->
                        <div class="col-md-6">
                            <label for="gtm_body_code" class="form-label">GTM Body Code</label>
                            <textarea class="form-control bg-light border-secondary" name="gtm_body_code" id="gtm_body_code" rows="6"
                                      placeholder="Paste Google Tag Manager Body Code here">{{ setting('gtm_body_code') }}</textarea>
                            <small class="text-muted">Place immediately after the <code>&lt;body&gt;</code> tag.</small>
                        </div>

             

                        <!-- Google Verification -->
                        <div class="col-md-6">
                            <label for="google_verify_meta" class="form-label">Google Site Verification</label>
                            <input type="text" class="form-control" name="google_verify_meta" id="google_verify_meta"
                                   value="{{ setting('google_verify_meta') }}" placeholder="Google site verification content">
                            <small class="text-muted">Content value of <code>&lt;meta name="google-site-verification" content="..."&gt;</code></small>
                        </div>

                 

                     

                    </div>

                    <div class="text-end mt-4">
                        <button type="submit" class="btn btn-primary">
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>

</script>
@endpush
