@extends('frontend.layout.app')

@push('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />
@endpush

@section('content')
    <section id="portfolio" class="bx-portfolio-section bx-section portfolio py-120">

        <div class="container">
            <div class="text-center py-5">
                <h2>My Portfolio's</h2>
            </div>
            <div class="portfolio-tabs">
                <ul>
                    <li class="filter mixitup-control-active" data-filter="all">All</li>
                    @foreach ($categories as $category)
                        <li class="filter" data-filter=".category_{{ $category->id }}">
                            {{ $category->name }}
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="portfolio-content-items">
                <div class="row" id="portfolio-mix">
                    @foreach ($categories as $category)
                        @foreach ($category->portfolioPosts as $post)
                            <div class="col-lg-4 col-md-6 mix category_{{ $category->id }}">
                                <div class="hovereffect">
                                    <a data-fancybox="gallery" href="{{ asset($post->image) }}">
                                        <img src="{{ asset($post->image) }}" alt="{{ $post->title }}">
                                    </a>
                                    <div class="overlay">
                                        <a href="#" class="title-link">{{ $post->title }}</a>
                                        @php
                                            $meta = json_decode($post->meta, true); 
                                        @endphp

                                        @if (isset($meta['link']) && $meta['link'])
                                            <a href="{{ $meta['link'] }}" target="_blank" class="btn text-light btn-sm mb-2" style="background: #ff5e00">Visit links</a>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        @endforeach
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
