<?php

namespace App\Tasks\Media;

use Illuminate\Support\Facades\Storage;

class DeleteFileFromStorageTask
{
    public function run($path): bool
    {
        return Storage::disk('public')->delete($path);
    }
}
