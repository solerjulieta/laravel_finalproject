<?php

namespace App\Uploaders;

use Intervention\Image\Image;

class CursoImgUploaders
{
    protected $imgWidth = 400; 
    protected $imgHeight = 260; 
    protected $portadatWidth = [
        'mobile' => 410,  
        'tablet' => 440, 
        'pc' => 1700   
    ];
    protected $portadaHeight = [
        'mobile' => 254,
        'tablet' => 254,
        'pc' => 257
    ];

    public function formatearImg($image, $storagePath, $imageName)
    {
        $width = $this->imgWidth;
        $height = $this->imgHeight;

        $image->fit($width, $height)->save($storagePath . $imageName);
    }

    public function formatearPortada($image, $storagePath, $imageName, $size)
    {
        $width = $this->portadatWidth[$size];
        $height = $this->portadaHeight[$size];
        $prefix = '';

        if ($size === 'tablet') {
            $prefix = 'tb-';
        } elseif ($size === 'mobile') {
            $prefix = 'mb-';
        }

        $imageNameWithPrefix = $prefix . $imageName;

        $image->fit($width, $height)->save($storagePath . $imageNameWithPrefix);
    }
}