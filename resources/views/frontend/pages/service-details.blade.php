@extends('frontend.layout.app')
@push('css')
    <style>
        .bg-da{
            background: #e26e00 !important;
        }
    </style>
@endpush
@section('content')
    <div class="blog-single-news  py-120">
        <div class="container">
            <div class="text-center d-block d-xl-none my-4 ">
                @foreach ($services as $service)
                    <a style="font-size: 15px" href="{{ route('single.post', ['type' => 'service', $service->slug]) }}"
                        class="mx-1 d-inline-block border p-2 rounded-3 fw-normal h6 text-light text-center 
                        {{ $service->slug === $post->slug ? 'bg-da' : '' }}">
                        {{ $service->title }}
                    </a>
                @endforeach
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-5 sidebar-right sidebar">
                    <div class="service-nav-menu mrb-30">
                        <div class="service-link-list">
                            <ul>
                                @foreach ($services as $service)
                                    <li class="{{ $service->slug === $post->slug ? 'active' : '' }}">
                                        <a href="{{ route('single.post', ['type' => 'service', $service->slug]) }}"><i
                                                class="base-icon-right-arrow"></i>{{ $service->title }}</a>
                                    </li>
                                @endforeach


                            </ul>
                        </div>
                    </div>
                    <div class="sidebar-widget-need-help">
                        <div class="need-help-icon">
                            <span class="webexflaticon webexbase-icon-phone-call"></span>
                        </div>
                        <h4 class="need-help-title">
                            Get Easy Interior Solution <br />
                            From Us
                        </h4>
                        <div class="need-help-contact">
                            <p class="mrb-5">Please Contact With Us</p>
                            <a href="tel:{{ setting('phone') }}">{{ setting('phone') }}</a>
                        </div>
                    </div>
               
                </div>
                <div class="col-xl-8 col-lg-7">
                    <div class="service-detail-text">
                        <div class="blog-standared-img slider-blog mrb-40">
                            <img class="img-full" src="{{ asset($post->image) }}" alt=" {{ $post->title }}" />
                        </div>
                        <h3 class="mrb-15">Service Details</h3>
                        <p class="mrb-40">
                            {!! $post->description !!}
                        </p>

                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection

