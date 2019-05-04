<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $fillable = ['attributes_group_id', 'value', 'price'];
    public $timestamps = false;

    public function attributes_group() {

        return $this->hasOne(AttributesGroup::class, 'id', 'attributes_group_id');
    }

}
