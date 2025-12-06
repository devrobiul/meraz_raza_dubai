@extends('frontend.layout.app')

@section('content')
    <section class="pdt-120 pdb-90 py-120">
        <div class="section-content">
            <div class="container">
                <div class="text-center py-5">
                    <h2>My Blogs/Articls</h2>
                </div>
                <div class="row">
                    @foreach ($articles as $post)
                           <div class="col-md-6 col-lg-6 col-xl-4">
                        <div class="news_wrapper_style1 wx_hover_item mrb-30">
                            <div class="news-thumb tp--hover-img"
                                data-displacement="" data-intensity="0.2"
                                data-speedin="1" data-speedout="1">
                                <a href="{{ route('single.post',['type'=>'article',$post->slug]) }}"><img src="{{ asset($post->image)}}" class="img-full" alt="{{ $post->title }}" /></a>
                            </div>
                            <div class="news-description">
                                <ul class="news-top-meta">
                                    <li class="post-cat">
                                        <span>{{ $post->category->name??'N/A' }}</span>
                                    </li>
                                    <li class="post-date">
                                        <span class="entry-date">
                                            <a href="#"> {{ $post->created_at->format('F d, Y') }} </a>
                                        </span>
                                    </li>
                                </ul>
                                <h4 class="the-title">
                                    <a href="{{ route('single.post',['type'=>'article',$post->slug]) }}">{{ $post->title }}</a>
                                </h4>
                                <div class="news_button">
                                    <a href="{{ route('single.post',['type'=>'article',$post->slug]) }}" class="btn_link">Read More</a>
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
