<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class FileUploader
{
    public const CATEGORY = 'category';
    public const PRODUCT = 'product';

    public function upload(UploadedFile $file, string $path): string
    {
        return $file->store($path);
    }

    public function remove($path): void
    {
        Storage::delete($path);
    }
}
