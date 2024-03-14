<?php

namespace App\Uploaders;

use Intervention\Image\Image;

class EntradaImgUploaders
{
    protected $imgWidth = 380;
    protected $imgHeight = 380;

    public function formatearImg($image, $path, $nombreImg)
    {
        $image->fit($this->imgWidth, $this->imgHeight)->save($path . $nombreImg);
    }
}