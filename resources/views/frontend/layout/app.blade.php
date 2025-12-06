<!DOCTYPE html>
<html lang="en">

<head>
    {!! setting('gtm_head_code') !!}
    {!! SEO::generate() !!}
{!! JsonLd::generate() !!}
{!! setting('google_verify_meta') !!}
    @include('frontend.includes.header-scripts')

</head>

<body class="layout-dark-mood">
    {!! setting('gtm_body_code') !!}
    @include('frontend.includes.menu')

    <div id="smooth-wrapper">
        <div id="smooth-content">

            @yield('content')

            @include('frontend.includes.footer')

        </div>
    </div>



        <div id="loadingPopup"
        style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); z-index: 9999; text-align: center;">
        <div style="position: relative; top: 50%; transform: translateY(-50%);">
            <div class="spinner-border text-light" role="status"></div>
            <p class="text-light mt-2">Loading....</p>
        </div>
    </div>

    <div class="w-app">
        <a href="https://wa.me/{{ setting('whatsapp') }}" target="_blank">
     
            <img src="{{ asset('frontend/uploads/whatsapp.png') }}" alt="{{ setting('app_name') }}">
        </a>
    </div>
    @include('frontend.includes.footer-scripts')
</body>

</html>
