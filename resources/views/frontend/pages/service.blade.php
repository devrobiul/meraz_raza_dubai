@extends('frontend.layout.app')

@section('content')

    <!-- Page Title End -->
    <!-- Service Section Start -->
    <section class="pdt-120 pdb-120 py-120">
        <div class="section-content">
            <div class="container">
                 <div class="text-center py-5">
    <h2>My Services </h2>
 </div>
                <div class="row">
                    <div class="col-lg-12">
                        @foreach ($services as $service)
                            <div class="services_list_style3 wow fadeInUp" data-wow-delay="0.2s">
                                <div class="services_item">
                                    <div class="services_wrap">
                                        <div class="services_title_area">
                                            @php
                                                $meta = json_decode($service->meta, true);
                                            @endphp
                                            <div class="services_icon"
                                                style="display: inline-flex; align-items: center; justify-content: center; 
            width: 80px; height: 80px; border: 2px dashed #fff; border-radius: 50%;">
                                                <i class="{{ $meta['icon'] }} fs-1"></i>
                                            </div>

                                            <div class="services_content">
                                                <h4 class="services_title">{{ $service->title }}</h4>
                                                <p class="services_description">
                                                    {!! $meta['short_description'] !!}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="services_thumb">
                                            <img class="parallax-img" src="{{ asset($service->image) }}"
                                                alt="{{ $service->title }}" />
                                        </div>
                                        <a class="services_link" href="{{ route('single.post', ['type' => 'service', $service->slug]) }}"><i
                                                class="webexbase-icon-up-right-arrow-1"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
