@extends('frontend.layout.app')
@section('content')
    <div class="blog-single-news bg-silver pdt-110 pdb-70 py-120">
        <div class="container">
                       <div class="text-center pt-5 pb-3">
                <h2>{{ $post->title }}</h2>
            </div>
            <div class="row">
                <div class="col-xl-8 col-lg-8 m-auto">
                    <div class="single-news-details news-wrapper mrb-20">
                        <div class="single-news-content">
                            <div class="news-thumb">
                                <img src="{{ asset($post->image) }}" class="img-full border-radius-10px"
                                    alt="{{ $post->title }}" />
                            </div>
                            <div class="news-description mrb-10">
                                <div class="news-bottom-part">
                                    <div class="post-author mrr-30 mrb-sm-15">
                                        <div class="author-img">
                                            <a href="page-news.html">
                                                <img src="{{ asset(optional($post->user)->avatar ?? 'admin/img/user.png') }}"
                                                    class="rounded-circle" alt="#" />

                                            </a>
                                        </div>
                                        <span>Admin</span>
                                    </div>
                                    <div class="post-link mrr-30 mrb-sm-15">
                                        <a href="#"><span class="entry-date"><i
                                                    class="far fa-calendar-alt mrr-10 text-primary-color"></i>  {{ $post->created_at->format('F d, Y') }}</span>
                                        </a>
                                    </div>
                                    <div class="post-link views">
                                        <i class="fas fa-eye mrr-10 text-primary-color"></i>
                                        <a href="#">{{ $post->views }} Read</a>
                                    </div>

                                </div>
                            </div>
                            <div class="entry-content">
                                {!! $post->description !!}
                            </div>
                            <div class="single-news-tag-social-area">
                                <div class="single-news-tags mrb-lg-30">

                                </div>
                                <div class="single-news-share text-start text-sm-end">
                                    <h5 class="mrb-15">Social Share:</h5>
                                    <ul class="social-icons">
                                        <li>
                                            <a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" target="_blank"><i class="fab fa-linkedin"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
