<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PriceRule extends Model
{
    protected $fillable = ['combination_id', 'price', 'min_images_count', 'max_images_count'];
    public $timestamps = false;

}
