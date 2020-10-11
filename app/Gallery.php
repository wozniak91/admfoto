<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Gallery extends Model
{
   
    protected $fillable = [
        'title',
        'description',
        'image_link',
        'image_name',
        'width',
        'height',
        'ratio',
        'position'
    ];

    protected $attributes = [
        'image_path'
    ];

    public function groups()
    {
        return $this->belongsToMany(ImagesGroup::class, 'gallery_has_groups');
    }

    public static function updateImagesDimensions()
    {
        $images = Gallery::all();

        foreach($images as $image) {
            list($width, $height) = getimagesize(public_path($image->image_link));
            $image->update([
                'width' => (int)$width,
                'height' => (int)$height,
                'ratio' => $height/$width
            ]);
        }

    }

    public static function maheThumbs()
    {
        
    }
}
