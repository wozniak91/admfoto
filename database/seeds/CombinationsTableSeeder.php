<?php

use Illuminate\Database\Seeder;

class CombinationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $groups = App\AttributesGroup::with('attributes')->get();
        $default = false;
            
        foreach ($groups[0]->attributes as $attribute) {
                
            foreach ($groups[1]->attributes as $attr) {
                    
                if($attribute->id != $attr->id) {

                    foreach ($groups[2]->attributes as $att) {

                        if($attribute->id != $attr->id && $attribute->id != $att->id && $att->id != $attr->id) {
                            $combination = new App\Combination();
                            $combination->price = 100;
                            $attributesToAttach = [$attribute->id, $attr->id, $att->id];

                            if(!$default) {
                                $combination->default = 1;
                                $default = true;
                            }

                            if(in_array(5, $attributesToAttach)) {
                                $combination->price = 150;
                            }
                            if(in_array(6, $attributesToAttach)) {
                                $combination->price = 250;
                            }

                            if(in_array(7, $attributesToAttach)) {
                                $combination->price = 500;
                            }

                            if(in_array(8, $attributesToAttach)) {
                                $combination->price = 700;
                            }

                            if(in_array(9, $attributesToAttach)) {
                                $combination->price = 1200;
                            }

                            if(in_array(10, $attributesToAttach)) {
                                $combination->price = 2000;
                            }

                            if(in_array(11, $attributesToAttach)) {
                                $combination->price = 4500;
                            }

                            if(in_array(12, $attributesToAttach)) {
                                $combination->price = 6500;
                            }

                            $combination->save();
                            $combination->attributes()->attach($attributesToAttach);
                        } 
                    }

                }
            }
        }

    }
}
