<?php

namespace ImageCompressor;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Http;

class ImageCompressorService
{
    protected static string $key;

    public static function setKey(string $key)
    {
        self::$key = $key;
        return new static();
    }

    public function compress(UploadedFile $file, array $options = []): string
    {
        $query = http_build_query([
            'quality' => $options['quality'] ?? 60,
            'width' => $options['width'] ?? 0,
            'height' => $options['height'] ?? 0,
            'format' => $options['format'] ?? '',
            'mode' => $options['mode'] ?? '',
        ]);

        $response = Http::attach('image', file_get_contents($file->getRealPath()), $file->getClientOriginalName())
            ->post(config('image-compressor.endpoint') . "/compress?$query");

        if (!$response->ok()) {
            throw new \Exception('Ошибка сжатия: ' . $response->body());
        }

        return $response->body();
    }
}
