@extends('frontend.layout.app')
@section('content')
    <section class="home_banner_03 pdt-240 pdb-xl-120 pdb-md-0 bg-no-repeat bg-pos-tl overflow-hidden"
        data-background="{{ asset(setting('slider_blur_img')) }}">
        <div class="custom-md-container">
            <div class="banner-item">
                <div class="row justify-content-center justify-content-lg-start">
                    <div class="col-xl-6 col-lg-6">
                        <div class="h3-banner-subtitle wow fadeInRight">
                            <img src="{{ asset('frontend/images/objects/h3-banner-img1.png') }}" alt="" />
                            <span>{{ setting('wc_title') }}</span>
                        </div>
                        <div class="anim-heading animation-style1">
                            <h1 class="h3-banner-title anim-title">{{ setting('slider_title') }}</h1>
                        </div>
                        <div class="h3-banner-text wow fadeInLeft">
                            {{ setting('slider_subtitle') }}
                        </div>
                        <div class="wow fadeInRight buttons-wrapper text-center text-md-start">
                            <a class="btn btn-danger btn-md me-2 mb-2" href="{{ setting('youtube') }}" target="_blank">
                                <i class="fab fa-youtube me-1"></i> Youtube
                            </a>

                            <a class="btn btn-primary btn-md mb-2" href="{{ asset(setting('cv_file')) }}" download>
                                <i class="fas fa-file-alt me-1"></i> Download CV
                            </a>

                        </div>


                    </div>
                    <div class="col col-lg-6 col-md-8 pos-rel">
                        <img class="h3-banner-man wow fadeInUp" src="{{ asset(setting('slider_image')) }}" alt="" />

                        <div class="circle-text-box mouse-hover-parallax">
                            <a class="video-popup circle-text-link" href="https://www.youtube.com/watch?v=MEY3UKR4Uyo"
                                aria-label="Video Popup">

                                <div class="circle-text-inner-box">

                                    <!-- YouTube Play Icon -->
                                    <svg width="80" height="80" viewBox="0 0 68 48">
                                        <path
                                            d="M66.52 7.01a8.27 8.27 0 0 0-5.82-5.86C55.79 0 34 0 34 0S12.21 0 7.3 1.15a8.27 8.27 0 0 0-5.82 5.86A86.1 86.1 0 0 0 0 24a86.1 86.1 0 0 0 1.48 16.99 8.27 8.27 0 0 0 5.82 5.86C12.21 48 34 48 34 48s21.79 0 26.7-1.15a8.27 8.27 0 0 0 5.82-5.86A86.1 86.1 0 0 0 68 24a86.1 86.1 0 0 0-1.48-16.99z"
                                            fill="#FF0000" />
                                        <path d="M45 24 27 14v20l18-10z" fill="#fff" />
                                    </svg>

                                </div>

                            </a>
                        </div>
                    </div>


                </div>
            </div>
        </div>


    </section>
    <!-- Home Banner End -->
    <!-- About Us Section Start -->
    <section class="pdt-105 pdb-120">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-xl-10 col-xxl-6 wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <h2 class="big_title">About</h2>
                </div>
                <div class="col"></div>
            </div>
            <div class="row align-items-center justify-content-between">
                <div class="col-md-6 col-lg-4 col-xl-4 col-xxl-4 wow fadeInLeft" data-wow-delay="0ms"
                    data-wow-duration="1500ms">
                    <img class="mrb-30 border-radius-10px parallax-img"
                        src="{{ asset(setting('about_img_home')) }}" alt="" />
                   
                </div>
                <div class="col-md-6 col-lg-4 col-xl-4 col-xxl-4 text-center wow fadeInLeft" data-wow-delay="0ms"
                    data-wow-duration="1500ms">
                    <h2 class="h3_ab_vertical_text">Me</h2>
                    <div class="xotech_btn_block2 primary-color3 mouse-hover-parallax">
                        <div class="circle_btn_item">
                            <a href="{{ route('contact-me') }}" class="circle-btn-style2">Hire Me <i
                                    class="circle-btn-arrow webexbase-icon-black-arrow-1"></i> <br />For Freelance </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-4 col-xxl-4 text-center text-sm-end wow fadeInLeft"
                    data-wow-delay="0ms" data-wow-duration="1500ms">
                    {!! setting('about_description_home') !!}
                </div>
            </div>
        </div>
    </section>

    <section class="pdt-120 pdb-120">
        <div class="section-title mrb-55 mrb-lg-60 wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-12">
                        <div class="title-box">
                            <h5 class="sub-title">( OUR SERVICES )</h5>
                            <h2 class="title">Where Skill Meets Impact</h2>
                        </div>
                    </div>
                    <div class="col-6"></div>
                </div>
            </div>
        </div>
        <div class="section-content">
            <div class="container">
                <div class="row">
                                 @foreach ($services as $service)
                                        @php
                                                $meta = json_decode($service->meta, true);
                                            @endphp
                    <div class="col-lg-12">
                                  <div class="services_list_style2">
                    <div class="services_item portivio-hover-reveal-item2">
                      <div class="services_wrap">
                        <div class="services_title_area">
                        <div class="services_icon"
                                                style="display: inline-flex; align-items: center; justify-content: center; width: 80px; height: 80px; border: 2px dashed #fff; border-radius: 50%;">
                                                <i class="{{ $meta['icon'] }} fs-1"></i>
                                            </div>
                          <h2 class="services_title">
                           {{ $service->title }}
                          </h2>
                        </div>
                        <div class="services_content">
                          <p class="services_description"> {!! $meta['short_description'] !!}</p>
                         
                        </div>
                        <a class="services_link" href="{{ route('single.post',['type'=>'service',$service->slug]) }}"><i class="webexbase-icon-up-right-arrow-1"></i></a>
                      </div>
                      <div class="portivio-hover-reveal-bg" data-background="{{ asset($service->image) }}"></div>
                    </div>
                  </div>
                   
                     
                      


                    </div>
                          @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Service Section End -->
    <!-- Project Section Start -->
    <section class="pdb-120">
        <div class="section-title mrb-55 mrb-lg-60 wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-12 mrb-md-30">
                        <div class="title-box">
                            <h5 class="sub-title">( Latest PORTFOLIO )</h5>
                            <h2 class="title">My Successful Work</h2>
                        </div>
                    </div>
                    <div
                        class="col-xl-6 col-lg-6 col-md-12 d-flex justify-content-start justify-content-start justify-content-lg-end">
                        <div class="portivio-btn-block primary-color3">
                            <a class="portivio-btn portivio-btn-circle" href="{{route('portfolio')}}"><i
                                    class="webexbase-icon-up-right-arrow-1"></i></a>
                            <a class="portivio-btn portivio-btn-primary" href="{{route('portfolio')}}">ALL
                                PORTFOLIO</a>
                            <a class="portivio-btn portivio-btn-circle" href="{{route('portfolio')}}"><i
                                    class="webexbase-icon-up-right-arrow-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-content">
            <div class="container">
                <div class="project_01_carousel overflow-visible swiper">
                    <div class="swiper-wrapper">
                        @foreach ($portoflios as $port)
                            <div class="swiper-slide">
                                <div class="project_style3_item">
                                    <div class="project_thumb image-anime">
                                        <img class="img-full" src="{{ asset($port->image) }}"
                                            alt="{{ $port->title }}" />
                                    </div>
                                    <div class="project_content">
                                        <div class="project_title_area">
                                            <div class="project_category text-center">
                                                <ul>
                                                    <li><a href="#">{{ $port->category->name }}</a></li>
                                                </ul>
                                            </div>
                                            <h4 class="title">{{ $port->title }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
                <!-- Dots -->
                <div class="project_01_dots">
                    <div class="project_01_dot"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- Project Section End -->

    <!-- Testimonials Section Start -->
    <section class="pricing_01_pin_section pdt-120 pdb-120">
        <div class="section-content">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-8">
                        <div class="section-title">
                            <div class="title-box pinned_title_box">
                                <h5 class="sub-title">( TESTIMONIALS )</h5>
                                <h2 class="title">What Our Clients Say About Me</h2>
                                <div class="rating_image_01 mrt-30">
                                    <img src="{{ asset('frontend/images/testimonials/clutch.png') }}" alt="" />
                                    <img src="{{ asset('frontend/images/testimonials/google-review.png') }}"
                                        alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col"></div>
                    <div class="col-xl-6">
                        <div class="pin_style_01_cards">
                            @foreach ($reviews as $review)
                                    <div class="testimonial_03_item pinned_item mrb-30">
                                <div class="testimonial_content">
                                    <p class="comments">
                                        <span class="testimonial_quote webexbase-icon-group-88301"></span>{{$review->title }}
                                    </p>
                                </div>
                                @php
                                    $meta = json_decode($review->meta,true);
                                @endphp
                                <div class="testimonial_thumbnail">
                                    <img class="img-full" src="{{ asset($review->image??'admin/img/user.png') }}"
                                        alt="" />
                                    <div class="testimonial-bottom-part">
                                        <h4 class="testimonial-title">{{$meta['r_name']??'N/A'}}</h4>
                                        <span class="testimonial-subtitle">{{$meta['r_deg']??'N/A'}}</span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        
                         
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonials Section End -->


    <!-- News Section Start -->
    <section class="pdt-105 pdb-90">
        <div class="section-title mrb-55 mrb-lg-60 wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-12 mrb-md-30">
                        <div class="title-box">
                            <h5 class="sub-title">( My Articles )</h5>
                            <h2 class="title">Our Recent Blog & Articles</h2>
                        </div>
                    </div>
                    <div
                        class="col-xl-6 col-lg-6 col-md-12 d-flex justify-content-start justify-content-start justify-content-lg-end">
                        <div class="portivio-btn-block primary-color3">
                            <a class="portivio-btn portivio-btn-circle" href="{{ route('blog') }}"><i
                                    class="webexbase-icon-up-right-arrow-1"></i></a>
                            <a class="portivio-btn portivio-btn-primary" href="{{ route('blog') }}">ALL BLOGS</a>
                            <a class="portivio-btn portivio-btn-circle" href="{{ route('blog') }}"><i
                                    class="webexbase-icon-up-right-arrow-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-content">
            <div class="container">
                <div class="row">
                    @foreach ($articles as $post)
                        <div class="col-md-6 col-lg-6 col-xl-4">
                            <div class="news_wrapper_style1 wx_hover_item mrb-30">
                                <div class="news-thumb tp--hover-img" data-displacement="" data-intensity="0.2"
                                    data-speedin="1" data-speedout="1">
                                    <a href="{{ route('single.post', ['type' => 'article', $post->slug]) }}"><img
                                            src="{{ asset($post->image) }}" class="img-full"
                                            alt="{{ $post->title }}" /></a>
                                </div>
                                <div class="news-description">
                                    <ul class="news-top-meta">
                                        <li class="post-cat">
                                            <span>{{ $post->category->name ?? 'N/A' }}</span>
                                        </li>
                                        <li class="post-date">
                                            <span class="entry-date">
                                                <a href="#"> {{ $post->created_at->format('F d, Y') }} </a>
                                            </span>
                                        </li>
                                    </ul>
                                    <h4 class="the-title">
                                        <a
                                            href="{{ route('single.post', ['type' => 'article', $post->slug]) }}">{{ $post->title }}</a>
                                    </h4>
                                    <div class="news_button">
                                        <a href="{{ route('single.post', ['type' => 'article', $post->slug]) }}"
                                            class="btn_link">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
@endsection
