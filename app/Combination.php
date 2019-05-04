<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Combination extends Model
{

    protected $fillable = ['price'];
    public $timestamps = false;
    
    public function attributes()
    {
        return $this->belongsToMany(Attribute::class, 'combination_has_attributes');
    }

    public function priceRules()
    {
        return $this->hasMany(PriceRule::class);
    }

    public function setDefault() {

        foreach (Combination::get() as $combination) {
            $combination->default = 0;
            $combination->save();
        }
        $this->default = 1;
    }

}
