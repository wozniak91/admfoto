<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttributesGroup extends Model
{
    protected $fillable = ['name', 'type'];
    public $timestamps = false;

    public function attributes() {

        return $this->hasMany(Attribute::class);
    }
}
