<?php

namespace ImageCompressor;

use Illuminate\Support\ServiceProvider;

class ImageCompressorServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/image-compressor.php', 'image-compressor');

        $this->app->singleton(ImageCompressorService::class, function () {
            return new ImageCompressorService();
        });
    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/image-compressor.php' => config_path('image-compressor.php'),
        ], 'config');
    }
}
