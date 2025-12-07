@extends('frontend.layout.app')

@section('content')
<style>
    body {
        background: black;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: 'Segoe UI', sans-serif;
    }

    .error-wrapper {
        text-align: center;
        padding: 80px 20px;
        background: #000000;
        border-radius: 16px;
        box-shadow: 0 20px 40px rgba(0,0,0,0.2);
        max-width: 700px;
        width: 100%;
    }

    .error-icon {
        font-size: 100px;
        color: #fc8b3f;
        margin-bottom: 20px;
    }

    .error-title {
        font-size: 80px;
        font-weight: 800;
        color: #fc8b3f;
    }

    .error-subtitle {
        font-size: 28px;
        font-weight: 600;
        color: #ffffff;
        margin-top: 10px;
    }

    .error-text {
        max-width: 600px;
        margin: 15px auto;
        color: #ffffff;
        font-size: 16px;
    }

    .btn-solid {
        background: #fc8b3f;
        color: white;
        padding: 12px 28px;
        text-decoration: none;
        border-radius: 8px;
        margin-top: 25px;
        display: inline-block;
        transition: all 0.3s ease;
    }

    .btn-solid:hover {
        background: #fc8b3f;
        color: white;
        transform: translateY(-3px);
        box-shadow: 0 8px 15px rgba(0,0,0,0.2);
    }

    @media (max-width: 576px) {
        .error-icon { font-size: 60px; }
        .error-title { font-size: 50px; }
        .error-subtitle { font-size: 22px; }
    }
</style>

<section class="section-b-space py-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-8 d-flex justify-content-center">
                <div class="error-wrapper">
                    {{-- Icon --}}
                    <i class="ri-lock-line error-icon"></i>

                    {{-- Error Code --}}
                    <h1 class="error-title">403</h1>

                    {{-- Error Subtitle --}}
                    <h2 class="error-subtitle">Forbidden</h2>

                    {{-- Description --}}
                    <p class="error-text">
                        You don’t have permission to access this page.
                        Please contact the administrator if you think this is an error.
                    </p>

                    {{-- Button --}}
                    <a href="{{ url('/') }}" class="btn-solid">Go To Homepage</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
