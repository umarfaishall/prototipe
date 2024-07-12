<?php

namespace App\Traits;

trait UploadFile
{
    public function uploadFile($file, string $path): string
    {
        $file_name = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs($path, $file_name, 'public');

        return $file_name;
    }
}
