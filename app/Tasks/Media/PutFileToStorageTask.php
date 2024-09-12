<?php

namespace App\Tasks\Media;

use Illuminate\Support\Facades\Storage;

class PutFileToStorageTask
{
    public function run($file): array
    {
        return [
            'file_name' => $file->getClientOriginalName(),
            'file_extension' => $file->getClientOriginalExtension(),
            'file_path' => Storage::disk('public')->put('media', $file)
        ];
    }
}
