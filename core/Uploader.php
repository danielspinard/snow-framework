<?php

namespace Snow;

use Exception;
use CoffeeCode\Uploader\Image;
use function md5;
use function uniqid;
use function time;

class Uploader
{
    /**
     * @param array $image
     * @return string|null
     */
    public static function image(array $image): ?string
    {
        $uploader = new Image('uploads', 'images', 900);

        try {
            return $uploader->upload($image, md5(uniqid()) . '-' . time());
        } catch (Exception $e) {
            return null;
        }
    }
}
