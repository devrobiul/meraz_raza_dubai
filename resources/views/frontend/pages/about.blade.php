@extends('frontend.layout.app')
@push('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />
@endpush
@section('content')

         <section class="pdt-120 pb-5">
          <div class="container">
                       <div class="text-center py-5">
                    <h2> About Me</h2>
                </div>
            <div class="row align-items-center">
         
              <div class="col-md-6">
                <img src="{{ asset(setting('about_img')) }}" alt="{{ setting('app_name') }}">
              </div>
              <div class="col-md-6">
           {!! setting('about_description') !!}
              </div>
            </div>
          </div>
        </section>

<section class="py-5">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8" data-aos="fade-up" data-aos-duration="1000">
                <h2 class="section-title pb-0 mb-1">Education</h2>
                <p class="section-subtitle">My academic journey and learning milestones</p>
            </div>
        </div>
        <div class="row mt-5">
            @forelse($educations as $education)
                <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                    <div class="edu-card p-4 shadow-sm rounded">
                        <h3>{{ $education->title }}</h3>
                        <span class="text-muted">{{ $education->org }}, {{ $education->session }}</span>
                        @if($education->department || $education->gpa)
                            <p class="">
                                @if($education->department)
                                    Department: {{ $education->department }}<br>
                                @endif
                                @if($education->gpa)
                                    GPA: {{ $education->gpa }}
                                @endif
                            </p>
                        @endif
                    </div>
                </div>
            @empty
                <p class="text-center">No education records found.</p>
            @endforelse
        </div>
    </div>
</section>

    <section id="portfolio" class="bx-portfolio-section bx-section portfolio">

        <div class="container">
                 <div class="col-md-12 col-lg-10 col-xl-6  text-center m-auto mb-5">
                        <div class="title-box-center">
                            <h6>( OUR ACHIVMENT )</h6>
                            <h2 class="title">Our Achievement & Awards</h2>
                        </div>
                    </div>
    
            <div class="portfolio-content-items">
                <div class="row" id="portfolio-mix">
                       @foreach ($awards as $award)
                       @php
                           $meta = json_decode($award->meta ,true);
                       @endphp
                           <div class="col-lg-4 col-md-6 mix">
                                <div class="hovereffect">
                                    <a data-fancybox="gallery" href="{{ asset($award->image) }}">
                                        <img src="{{ asset($award->image) }}" alt="{{$award->title}}">
                                    </a>
                                    <div class="overlay">
                                        <a href="#" class="title-link">{{$award->title}}<br> 
                                        <span>{{ $meta['award_org'] }} ({{ $meta['award_year'] ??''}})</span>
                                        </a>
                            
                                    </div>
                                </div>
                            </div>
                       @endforeach
                            
                    
                 
                </div>
            </div>
        </div>
    </section>
@endsection
@push('js')
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/mixitup/dist/mixitup.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var containerEl = document.querySelector('#portfolio-mix');
            if (containerEl) {
                mixitup(containerEl, {
                    selectors: {
                        target: '.mix'
                    },
                    animation: {
                        duration: 300
                    }
                });
            }

            Fancybox.bind("[data-fancybox='gallery']", {
                Toolbar: false,
                closeButton: "top",
            });
        });
    </script>
@endpush