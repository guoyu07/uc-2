<?php

return [
    'class' => 'himiklab\sitemap\Sitemap',
    'models' => [
        // модели с сайтмэпом
        'app\models\StaticPage',
        'app\models\News',
    ],
    'urls'=> [
        // your additional urls
        [
            'loc' => '/',
            'changefreq' => \himiklab\sitemap\behaviors\SitemapBehavior::CHANGEFREQ_DAILY,
            'priority' => 0.8
        ],
        [
            'loc' => '/site/seminars',
            'changefreq' => \himiklab\sitemap\behaviors\SitemapBehavior::CHANGEFREQ_DAILY,
            'priority' => 0.8
        ],
        [
            'loc' => '/site/reviews',
            'changefreq' => \himiklab\sitemap\behaviors\SitemapBehavior::CHANGEFREQ_DAILY,
            'priority' => 0.8
        ],
        [
            'loc' => '/site/teachers',
            'changefreq' => \himiklab\sitemap\behaviors\SitemapBehavior::CHANGEFREQ_DAILY,
            'priority' => 0.8
        ],
        [
            'loc' => '/site/news',
            'changefreq' => \himiklab\sitemap\behaviors\SitemapBehavior::CHANGEFREQ_DAILY,
            'priority' => 0.8
        ],
    ],
    'enableGzip' => true, // default is false
    'cacheExpire' => 1, // 1 second. Default is 24 hours
];