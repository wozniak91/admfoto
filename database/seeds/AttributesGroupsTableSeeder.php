<?php

use Illuminate\Database\Seeder;

class AttributesGroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $group = new App\AttributesGroup();
        $group->name = 'Papier';
        $group->type = 'select';
        $group->save();

        $group = new App\AttributesGroup();
        $group->name = 'Format';
        $group->type = 'select';
        $group->save();

        $group = new App\AttributesGroup();
        $group->name = 'Kadr';
        $group->type = 'select';
        $group->save();
    }
}
