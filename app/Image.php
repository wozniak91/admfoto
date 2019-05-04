<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Combination;

class Image extends Model
{
    
    public function combination() {

        return $this->hasOne(Combination::class, 'id', 'combination_id')->with('attributes');

    }

}
