@extends('admin.layout.app')
@section('title')
    Information Settings
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h5 class="card-title mb-0">Website Information Settings</h5>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('admin.setting.store') }}">
                        @csrf
                        <div class="row g-3">


                            <div class="col-md-3">
                                <label class="form-label">
                                    <i class="fas fa-map-marker-alt text-danger"></i> Address
                                </label>
                                <input type="text" class="form-control" name="address" placeholder="Enter Address"
                                    value="{{ setting('address') }}">
                            </div>

                            <div class="col-md-3">
                                <label class="form-label">
                                    <i class="fas fa-phone-alt text-success"></i> Mobile Number
                                </label>
                                <input type="text" class="form-control" name="phone" placeholder="Mobile Number"
                                    value="{{ setting('phone') }}">
                            </div>

                            <div class="col-md-3">
                                <label class="form-label">
                                    <i class="fab fa-whatsapp text-success"></i> Whatsapp Number
                                </label>
                                <input type="text" class="form-control" name="wp_number" placeholder="Whatsapp Number"
                                    value="{{ setting('wp_number') }}">
                            </div>


                            <div class="col-md-3">
                                <label class="form-label"><i class="fab fa-facebook text-primary"></i> Facebook</label>
                                <input type="url" class="form-control" name="facebook" placeholder="Facebook URL"
                                    value="{{ setting('facebook') }}">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label"><i class="fab fa-instagram text-danger"></i> Instagram</label>
                                <input type="text" class="form-control" name="instagram" placeholder="Instagram URL"
                                    value="{{ setting('instagram') }}">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label"><i class="fab fa-youtube text-danger"></i> Youtube</label>
                                <input type="text" class="form-control" name="youtube" placeholder="Youtube URL"
                                    value="{{ setting('youtube') }}">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label"><i class="fab fa-linkedin text-info"></i> Linkedin</label>
                                <input type="text" class="form-control" name="linkedin" placeholder="Linkedin URL"
                                    value="{{ setting('linkedin') }}">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label"><i class="fab fa-tiktok text-dark"></i> Tiktok</label>
                                <input type="text" class="form-control" name="tiktok" placeholder="Tiktok URL"
                                    value="{{ setting('tiktok') }}">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label"><i class="fab fa-whatsapp text-success"></i> Whatsapp</label>
                                <input type="text" class="form-control" name="whatsapp" placeholder="Whatsapp URL"
                                    value="{{ setting('whatsapp') }}">
                            </div>
                            <!-- Missing Social Inputs Added -->
                            <div class="col-md-3">
                                <label class="form-label"><i class="fab fa-behance text-primary"></i> Behance</label>
                                <input type="text" class="form-control" name="behance" placeholder="Behance URL"
                                    value="{{ setting('behance') }}">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label"><i class="fab fa-twitter text-info"></i> Twitter</label>
                                <input type="text" class="form-control" name="twitter" placeholder="Twitter URL"
                                    value="{{ setting('twitter') }}">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label"><i class="fas fa-envelope text-secondary"></i> Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Email"
                                    value="{{ setting('email') }}">
                            </div>




                            <div class="col-md-12">
                                <label class="form-label">Google Map Embed</label>
                                <textarea class="form-control" name="google_map" rows="3" placeholder="Google Map Embed Code">{{ setting('google_map') }}</textarea>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label">Footer Summary</label>
                                <textarea class="form-control" name="footer_summary" rows="2" placeholder="Footer Summary">{{ setting('footer_summary') }}</textarea>
                            </div>
                        </div>

                        <div class="mt-4 text-end">
                            <button type="submit" class="btn btn-primary btn-sm">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
