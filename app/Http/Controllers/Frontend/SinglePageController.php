<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEO;

class SinglePageController extends Controller
{
    public function singlepost($type, $slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();

        // SEO values
        $title = $post->title;
        $description = $post->description ?? 'Read this post';
        $image = $post->image ? asset($post->image) : asset('default-image.png');
        $subtitle = ucfirst($type);

        /*
        |--------------------------------------------------------------------------
        | SEOMeta
        |--------------------------------------------------------------------------
        */
        SEOMeta::setTitle("$title - $subtitle");
        SEOMeta::setDescription(strip_tags($description));
        SEOMeta::addKeyword([$title, $subtitle, 'post', 'blog']);
        SEOMeta::setCanonical(url()->current());

        /*
        |--------------------------------------------------------------------------
        | OpenGraph
        |--------------------------------------------------------------------------
        */
        OpenGraph::setTitle("$title - $subtitle");
        OpenGraph::setDescription(strip_tags($description));
        OpenGraph::setUrl(url()->current());
        OpenGraph::addImage($image);
        OpenGraph::setType('article');

        /*
        |--------------------------------------------------------------------------
        | Twitter Card
        |--------------------------------------------------------------------------
        */
        TwitterCard::setTitle("$title - $subtitle");
        TwitterCard::setDescription(strip_tags($description));
        TwitterCard::addImage($image);
        TwitterCard::setType('summary_large_image');

        /*
        |--------------------------------------------------------------------------
        | JSON-LD
        |--------------------------------------------------------------------------
        */
        JsonLd::setTitle($title);
        JsonLd::setDescription(strip_tags($description));
        JsonLd::setType('Article');
        JsonLd::addImage($image);

        JsonLd::addValue('breadcrumb', [
            '@type' => 'BreadcrumbList',
            'itemListElement' => [
                [
                    '@type' => 'ListItem',
                    'position' => 1,
                    'name' => 'Home',
                    'item' => url('/')
                ],
                [
                    '@type' => 'ListItem',
                    'position' => 2,
                    'name' => ucfirst($type),
                    'item' => url()->current()
                ],
                [
                    '@type' => 'ListItem',
                    'position' => 3,
                    'name' => $title,
                    'item' => url()->current()
                ],
            ]
        ]);

        /*
        |--------------------------------------------------------------------------
        | Page Type Rendering
        |--------------------------------------------------------------------------
        */
        if ($type === 'article') {
            $post->increment('views');
            return view('frontend.pages.blog-details', compact('type', 'post'));
        }

        if ($type === 'service') {
            $services = Post::where('type', 'service')->orderBy('title', 'asc')->get();
            return view('frontend.pages.service-details', compact('type', 'post', 'services'));
        }

        abort(404);
    }
}
