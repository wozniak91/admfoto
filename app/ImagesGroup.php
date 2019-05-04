<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImagesGroup extends Model
{
    protected $fillable = ['name'];

    public function galleries()
    {
        return $this->belongsToMany(Gallery::class);
    }
}
