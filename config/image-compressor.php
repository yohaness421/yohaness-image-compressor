<?php

return [
    'endpoint' => env('IMAGE_COMPRESSOR_URL', 'http://localhost:8080'),
    'quality' => 75,
    'formats' => ['jpeg', 'png', 'webp'],
    'resize' => [
        'width' => 800,
        'height' => 600,
    ],
    'mode' => 'cover', // или 'fit', 'scale'
];
