<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class FileHelper
{
    /**
     * Handle file upload.
     *
     * @param \Illuminate\Http\UploadedFile $file
     * @param string $path
     * @return string|bool The file path if uploaded successfully, or false otherwise.
     */
    public static function uploadFile($file, $path = 'uploads')
    {
        if ($file) {
            return $file->store($path, 'public');
        }

        return false;
    }
}