<?php

return [

    'front_page_post_count' => env('FRONT_PAGE_POST_COUNT', 13),

    'description' => 'Welcome to our platform, where innovation meets collaboration.',
    'keywords' => 'blogchain, blockchain, decentralized, community, innovation, news, articles, technology, open-source, collaboration',
    'og-image' => 'https://blogchain.example.com/image/og-image.png',

    'pagination' => [
        'per_page' => env('BLOGCHAIN_PAGINATION_PER_PAGE', 30),
    ],
];
