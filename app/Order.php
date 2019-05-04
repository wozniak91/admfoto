<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Combination;

class Order extends Model
{
    public function address() {

    	return $this->hasOne('App\Address', 'order_id');
    }

    public function images() {

    	return $this->hasMany('App\Image', 'order_id');
    }

    public static function displayPrice($price, $tax = true, $unit = true) {

        return ($tax ? $price/100 : $price*0.77/100).($unit ? ' zł' : ''); 
    }

    public function getTotalPrice() {

        $totalPrice = 0;

        foreach ($this->images as $image) {
            
            $combination = Combination::findOrFail($image->combination_id);
            
            if($combination->priceRules()) {

                $priceRule = $combination->price*$image->qty;

                foreach ($combination->priceRules as $rule) {
                    if($this->getTotalCombinationQty($image->combination_id) >= $rule->min_images_count) {
                        $priceRule = $rule->price*$image->qty;
                    } 
                }

                $totalPrice += $priceRule;

            } else {

                $totalPrice += $combination->price*$image->qty;
            }
        }

        return $totalPrice;
    }

    public function getImagePrice($image) {

        $combination = Combination::findOrFail($image->combination_id);
        $totalPrice = 0;
        
        if($combination->priceRules()) {

            $priceRule = $combination->price*$image->qty;

            foreach ($combination->priceRules as $rule) {
                if($this->getTotalCombinationQty($image->combination_id) >= $rule->min_images_count) {
                    $priceRule = $rule->price*$image->qty;
                } 
            }

            $totalPrice += $priceRule;

        } else {

            $totalPrice += $combination->price*$image->qty;
        }

        return $totalPrice;
    }

    public function getTotalCombinationQty($id_combination) {

        $totalQty = 0;

        foreach ($this->images as $image) {
            
            if($image->combination_id == $id_combination) {
                $totalQty += $image->qty;
            }

        }

        return $totalQty;
    }
}
