<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\SeoHelper;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Attribute;
use App\Models\Education;
use App\Models\Gallery;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){

        SeoHelper::setSeo('home');
        return view('frontend.pages.index', [
            'services' => Post::type('service')->orderBy('title', 'asc')->get(),
            'portoflios' => Post::type('portfolio')->orderBy('title', 'asc')->limit(10)->get(),
            'articles' => Post::type('article')->orderBy('title', 'asc')->limit(3)->get(),
            'reviews' => Post::type('review')->orderBy('title', 'asc')->get(),
        ]);
    }


    public function about(){
        SeoHelper::setSeo('about');
        return view('frontend.pages.about',[
            'awards' => Post::type('award')->orderBy('title', 'asc')->get(),
            'educations' => Education::all(),
        ]);
    }



    public function services(){
        SeoHelper::setSeo('service');
        return view('frontend.pages.service',[
            'services'=>Post::type('service')->orderBy('title','asc')->get(),
        ]);
    }



    public function blog(){
        SeoHelper::setSeo('blog');
        return view('frontend.pages.blog',[
            'articles' => Post::type('article')->orderBy('title', 'asc')->get(),
        ]);
    }



    public function portfolio(){
        SeoHelper::setSeo('portfolio');
        $categories = Attribute::type('category')->whereHas('portfolioPosts')->orderBy('name', 'asc')->get();
        return view('frontend.pages.portfolio',[
            'categories'=> $categories,
        ]);
    }


    public function gallery(){
        SeoHelper::setSeo('gallery');
        return view('frontend.pages.gallery',[
            'galleries' =>Gallery::latest()->get(),
        ]);
    }

    public function contactMe(){
        SeoHelper::setSeo('contact');
        return view('frontend.pages.contact');
    }
}
