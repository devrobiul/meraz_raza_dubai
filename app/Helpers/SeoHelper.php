<?php

namespace App\Helpers;

use SEO;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;

class SeoHelper
{
    public static function setSeo($page)
    {
        $title = setting('meta_title_' . $page);
        $description = setting('meta_description_' . $page);
        $keywords = setting('meta_keywords_' . $page);
        $pageType = $page;

        // SEO meta
        SEO::setTitle($title);
        SEO::setDescription($description);
        SEO::setCanonical(url()->current());

        // SEOMeta
        if ($keywords) {
            SEOMeta::addKeyword(explode(',', $keywords));
        }
        SEOMeta::addMeta('robots', setting('robots_' . $page) ?: 'index, follow');

        // OpenGraph
        $ogTitle = setting('og_title_' . $page) ?: $title;
        $ogDescription = setting('og_description_' . $page) ?: $description;
        OpenGraph::setTitle($ogTitle);
        OpenGraph::setDescription($ogDescription);
        OpenGraph::setUrl(url()->current());
        OpenGraph::addProperty('type', 'website');
        OpenGraph::addProperty('fb:app_id', setting('facebook_app_id') ?: '');
        OpenGraph::addProperty('fb:pages', setting('facebook_page_id') ?: '');
        if (setting('og_image')) {
            OpenGraph::addImage(asset(setting('og_image')));
        }

        // Twitter
        $twitterTitle = setting('twitter_title_' . $page) ?: $title;
        $twitterDesc = setting('twitter_description_' . $page) ?: $description;
        TwitterCard::setType(setting('twitter_card_type') ?: 'summary_large_image');
        TwitterCard::setTitle($twitterTitle);
        TwitterCard::setDescription($twitterDesc);

        if (setting('twitter_image_' . $page)) {
            TwitterCard::addImage(asset(setting('twitter_image_' . $page)));
        } elseif (setting('og_image')) {
            TwitterCard::addImage(asset(setting('og_image')));
        }

        // JsonLd
        JsonLd::setTitle($title);
        JsonLd::setDescription($description);
        JsonLd::setType('WebPage');
        JsonLd::addValue('url', url()->current());
        JsonLd::addValue('keywords', $keywords ? explode(',', $keywords) : []);

        if (setting('og_image')) {
            JsonLd::addValue('image', asset(setting('og_image')));
        }

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
                    'name' => ucfirst($pageType),
                    'item' => url()->current()
                ]
            ]
        ]);
    }
}
