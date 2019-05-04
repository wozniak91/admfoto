<?php

use Illuminate\Database\Seeder;

class AttributesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $attribute = new App\Attribute();
        $attribute->attributes_group_id = 1;
        $attribute->value = 'matowy';
        $attribute->save();

        $attribute = new App\Attribute();
        $attribute->attributes_group_id = 1;
        $attribute->value = 'błyszczący';
        $attribute->save();

        $attribute = new App\Attribute();
        $attribute->attributes_group_id = 2;
        $attribute->value = '9x13';
        $attribute->save();

        $attribute = new App\Attribute();
        $attribute->attributes_group_id = 2;
        $attribute->value = '10x15';
        $attribute->save();

        $attribute = new App\Attribute();
        $attribute->attributes_group_id = 2;
        $attribute->value = '13x18';
        $attribute->save();

        $attribute = new App\Attribute();
        $attribute->attributes_group_id = 2;
        $attribute->value = '15x21';
        $attribute->save();

        $attribute = new App\Attribute();
        $attribute->attributes_group_id = 2;
        $attribute->value = '18x25';
        $attribute->save();

        $attribute = new App\Attribute();
        $attribute->attributes_group_id = 2;
        $attribute->value = '21x30';
        $attribute->save();

        $attribute = new App\Attribute();
        $attribute->attributes_group_id = 2;
        $attribute->value = '25x38';
        $attribute->save();

        $attribute = new App\Attribute();
        $attribute->attributes_group_id = 2;
        $attribute->value = '30x40';
        $attribute->save();

        $attribute = new App\Attribute();
        $attribute->attributes_group_id = 2;
        $attribute->value = '40x60';
        $attribute->save();

        $attribute = new App\Attribute();
        $attribute->attributes_group_id = 2;
        $attribute->value = '60x80';
        $attribute->save();

        $attribute = new App\Attribute();
        $attribute->attributes_group_id = 3;
        $attribute->value = 'bez ramki';
        $attribute->save();

        $attribute = new App\Attribute();
        $attribute->attributes_group_id = 3;
        $attribute->value = 'z ramki';
        $attribute->save();

        $attribute = new App\Attribute();
        $attribute->attributes_group_id = 3;
        $attribute->value = 'pełny kadr';
        $attribute->save();

    }
}
