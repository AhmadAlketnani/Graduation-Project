<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait ImagesStorage
{
    public function storeImage($image, $name, $path)
    {
        // Generate a unique filename
        $imageName = $name . time() . '.' . $image->extension();

        // Generate full path
        $fullPath = "images/$path/$imageName";

        // Store image properly in public storage
        Storage::disk('public')->
            put($fullPath, file_get_contents($image));

        // Save path to the database
        return $fullPath;
    }

    public function storeImages($images, $name, $path)
    {
        $imagesArray = [];
        foreach ($images as $index => $image) {
            $imagesArray[] = $this->storeImage($image, $name . "_$index", $path);
        }
        return $imagesArray;
    }

    public function deleteImage($image)
    {
        if ($image) {
            Storage::disk('public')->delete($image);
        }
    }

    public function deleteImages($images)
    {
        if ($images) {
            foreach ($images as $image) {
                $this->deleteImage($image);
            }
        }
    }
}
