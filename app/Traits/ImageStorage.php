<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait ImageStorage
{
    /**
     * For Upload Photo
     * @param mixed $photo
     * @param mixed $name
     * @param mixed $path
     * @param bool $update
     * @param mixed|null $old_photo
     * @return void
     */
    public function uploadImage($foto, $nama, $path, $update = false, $old_foto = null)
    {
        if ($update) {
            Storage::delete("/public/{$path}/" . $old_foto);
        }

        $nama = Str::slug($nama) . '-' . time();
        if($foto != NULL){
            $extension = $foto->getClientOriginalExtension();
            $newName = $nama . '.' . $extension;
            Storage::putFileAs("/public/{$path}", $foto, $newName);
            return $newName;
        }
    }

    /**
     *
     * @param mixed $old_photo
     * @param mixed $path
     * @return void
     */
    public function deleteImage($old_foto, $path)
    {
        Storage::delete("/public/{$path}" . $old_foto);
    }
}

