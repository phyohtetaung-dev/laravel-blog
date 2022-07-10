<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class ImageService
{
    public function upload($file, $width = '', $height = ''): string
    {
        $name = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();
        $dir = sprintf('images/%s/%s/%s', date('Y'), date('m'), date('d'));

        // no resize
        if (! $width && ! $height) {
            $path = $file->storeAs($dir, $name);

            return Storage::url($path);
        }

        \ImageIntervention::make($file->getRealPath())
            ->resize($width, $height)
            ->save(storage_path("app/public/$dir/$name"));

        return Storage::url("$dir/$name");
    }
}
