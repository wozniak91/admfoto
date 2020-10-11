<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Combination;

class Image extends Model
{
    protected $fillable = [
        'order_id',
        'name',
        'combination_id',
        'qty'
    ];

    public function combination()
    {
        return $this->hasOne(Combination::class, 'id', 'combination_id')->with('options');
    }

    public function delete()
    {
        if (Storage::disk('local')->path('/public/images/orders/'.$this->order_id.'/'.$this->id)) {
            Storage::disk('local')->delete('/public/images/orders/'.$this->order_id.'/'.$this->id);
        }
        return parent::delete();
    }

    /**
     * Get the image path attribute.
     *
     * @return string
     */
    public function getImagePathAttribute()
    {

        $combination_url = [];
        foreach ($this->combination->options as $option) {
            $name = iconv('UTF-8', 'ISO-8859-1//TRANSLIT//IGNORE', $option->value);
            $combination_url[] = str_replace(' ', '_', $name);
        }
        $combination_url = join("-", $combination_url);

        return "{$combination_url}/{$this->name}";
    }

    public function saveAndStore()
    {
        return $this->save() && $this->store();
    }

    public function store()
    {
        return Storage::copy(
            '/tmp/'.$this->name, 
            '/public/images/orders/'.$this->order_id.'/'. $this->image_path
        ) && Storage::delete('/tmp/'.$this->name);
    }

    public function exists()
    {
        return (int)Storage::disk('local')->exists('/public/images/orders/'.$this->order_id.'/'.$this->image_path);
    }
}
