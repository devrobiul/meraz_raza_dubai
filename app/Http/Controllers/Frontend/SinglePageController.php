<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Post;
use Illuminate\Http\Request;

class SinglePageController extends Controller
{
    public function singlepost($type, $slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();

        if ($type === 'article') {
            $post->increment('views');
            return view('frontend.pages.blog-details', compact('type', 'post'));
        }

        if ($type === 'service') {
            $services =Post::type('service')->orderBy('title','asc')->get();
            return view('frontend.pages.service-details', compact('type', 'post', 'services'));
        }

        abort(404);
    }
}
