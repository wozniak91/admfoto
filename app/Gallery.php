<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
   

    public function groups()
    {
        return $this->belongsToMany(ImagesGroup::class, 'gallery_has_groups');
    }
}
