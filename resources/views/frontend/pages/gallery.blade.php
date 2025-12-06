@extends('frontend.layout.app')

@push('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />
<style>
    .hovereffect {
    overflow: hidden;
}

.play-icon i {
    opacity: 0.8;
}

.video-thumb img {
    height: 100%;
    width: 100%;
    object-fit: cover; /* Fill the container without distortion */
}

/* Play icon for videos */
.play-icon i {
    opacity: 0.8;
    transition: transform 0.3s ease;
}

.play-icon:hover i {
    transform: scale(1.2);
}

/* Photo title overlay */
.photo-title {
    font-size: 14px;
    background: rgba(0, 0, 0, 0.6);
}

</style>
@endpush

@section('content')
<section id="portfolio" class="bx-portfolio-section bx-section portfolio py-120">
    <div class="container">
        <div class="text-center py-5">
            <h2>Photo | Video</h2>
        </div>

        <div class="portfolio-tabs">
            <ul>
                <li class="filter mixitup-control-active" data-filter="all">All</li>
                <li class="filter" data-filter=".photo">Photo Gallery</li>
                <li class="filter" data-filter=".video">Video Gallery</li>
            </ul>
        </div>

        <div class="portfolio-content-items">
            <div class="row" id="portfolio-mix">
@foreach ($galleries as $gallery)
    <div class="col-lg-4 col-md-6 mix {{ $gallery->type }}">
        <div class="hovereffect position-relative">

            @if($gallery->type == 'photo' && $gallery->photo)
                <a data-fancybox="gallery" href="{{ asset($gallery->photo) }}" class="position-relative d-block">
                    <img src="{{ asset($gallery->photo) }}" alt="{{ $gallery->title }}" class="img-fluid">
                    <!-- Title overlay -->
                    <span class="photo-title position-absolute bottom-0 start-0 w-100 text-center bg-dark text-white py-1">
                        {{ $gallery->title }}
                    </span>
                </a>
            @elseif($gallery->type == 'video' && $gallery->video)
                @php
                    preg_match("/(?:youtube\.com\/watch\?v=|youtu\.be\/)([^\&\?\/]+)/", $gallery->video, $matches);
                    $youtube_id = $matches[1] ?? null;
                @endphp
                @if($youtube_id)
                    <a data-fancybox="gallery" data-type="iframe" href="https://www.youtube.com/embed/{{ $youtube_id }}" class="position-relative d-block">
                        <img src="https://img.youtube.com/vi/{{ $youtube_id }}/hqdefault.jpg" alt="{{ $gallery->title }}" class="img-fluid">
                        <!-- Centered Play Icon -->
                        <span class="play-icon position-absolute top-50 start-50 translate-middle">
                            <i class="fas fa-play-circle" style="font-size:50px; color:white;"></i>
                        </span>
                    </a>
                @endif
            @endif

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
            animation: { duration: 300 }
        });
    }

    Fancybox.bind("[data-fancybox='gallery']", {
        Toolbar: false,
        closeButton: "top",
    });
});
</script>
@endpush
