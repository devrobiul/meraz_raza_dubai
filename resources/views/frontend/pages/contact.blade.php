@extends('frontend.layout.app')

@section('content')
    <section class="contact-section bg-no-repeat bg-cover pdt-110 pdb-110 py-120"
        data-background="" data-overlay-dakr="9">
        <div class="container">
            <div class="text-center py-5">
                <h2>Contact Me</h2>
            </div>
            <div class="row mrb-80">
                <div class="col-xl-12">
                    <div class="row">
                        <div class="col-lg-6 col-xl-4">
                            <div class="contact_info_02 d-flex mrb-30">
                                <div class="contact-icon">
                                    <i class="webexbase-icon-pin-1"></i>
                                </div>
                                <div class="contact-details mrl-30">
                                    <h5 class="icon-box-title mrb-10">UAE Address</h5>
                                    <p class="mrb-0">{{ setting('address') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-4">
                            <div class="contact_info_02 d-flex mrb-30">
                                <div class="contact-icon">
                                    <i class="webexbase-icon-145-envelope"></i>
                                </div>
                                <div class="contact-details mrl-30">
                                    <h5 class="icon-box-title mrb-10">Email Us</h5>
                                    <p class="mrb-0">{{ setting('email') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-4">
                            <div class="contact_info_02 d-flex mrb-30">
                                <div class="contact-icon">
                                    <i class="webexbase-icon-call"></i>
                                </div>
                                <div class="contact-details mrl-30">
                                    <h5 class="icon-box-title mrb-10">Phone Number</h5>
                                    <p class="mrb-0">{{ setting('phone') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-5">
                    <div class="title-box anim-heading animation-style1">
                        <h5 class="sub-title">( Get In Touch )</h5>
                        <h2 class=" mrb-30 anim-title">Have Any Questions?</h2>
                    </div>
                    <ul class="social-list list-lg list-primary-color mrb-lg-60 clearfix">
                        <li>
                            <a href="{{ setting('youtube') }}" target="_blank">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </li>
                        <li>
                            <a href="{{ setting('facebook') }}" target="_blank">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                        <li>
                            <a href="{{ setting('behance') }}" target="_blank">
                                <i class="fab fa-behance"></i>
                            </a>
                        </li>

                        <li>
                            <a href="{{ setting('instagram') }}" target="_blank">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </li>
                        <li>
                            <a href="{{ setting('twitter') }}" target="_blank">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a href="mailto:{{ setting('email') }}">
                                <i class="fas fa-envelope"></i>
                            </a>
                        </li>
                    </ul>

                </div>
                <div class="col-xl-7">
                    <div class="contact-form">
                        <form method="post" action="{{ route('contact.store') }}" class="formSubmit">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group mrb-25">
                                        <input type="text" name="name" placeholder="Name" class="form-control error-valid" />
                                        <small class="text-danger error-message" id="error-name"></small>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mrb-25">
                                        <input type="text" name="phone" placeholder="Phone" class="form-control error-valid" />
                                        <small class="text-danger error-message" id="error-phone"></small>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mrb-25">
                                        <input type="subject" name="subject" placeholder="Subject" class="form-control error-valid" />
                                        <small class="text-danger error-message" id="error-subject"></small>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mrb-25">
                                        <input type="email" name="email" placeholder="Email" class="form-control error-valid" />
                                        <small class="text-danger error-message" id="error-email"></small>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group mrb-25">
                                        <textarea rows="4" name="message" placeholder="Messages" class="form-control error-valid"></textarea>
                                        <small class="text-danger error-message" id="error-message"></small>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <button type="submit" name="submit" class="cs-btn-one btn-circle mrb-lg-60"
                                            value="Send">Submit Now</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->
    <!-- Google Map Section Start -->
    <section class="google-map-section">
        <!-- Google Map Start -->
        <div class="mapouter fixed-height">
            <div class="gmap_canvas">
                <iframe id="gmap_canvas" src="{{ setting('google_map') }}"></iframe>
                <a href="https://www.whatismyip-address.com/"></a>
            </div>
        </div>
        <!-- Google Map End -->
    </section>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $(".formSubmit").on("submit", function(e) {
                e.preventDefault();
                let formData = new FormData(this);
                $("#loadingPopup").show();
                $(".error-message").text("");
                $(".error-valid").removeClass("is-invalid");
                $.ajax({
                    url: $(this).attr("action"),
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        $("#loadingPopup").hide();
                        if (data.success) {
                            window.location.href = data.route;
                        } else {
                            alert("Something went wrong. Try again!");
                        }
                    },
                    error: function(data) {
                        $("#loadingPopup").hide();
                        let errors = data.responseJSON?.errors || {};
                        $.each(errors, function(field, msg) {
                            $(`#error-${field}`).text(msg[0]);
                            $(`[name='${field}']`).addClass("is-invalid");
                        });
                    },
                });
            });
        });
    </script>
@endpush
