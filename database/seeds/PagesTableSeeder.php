<?php

use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $page = new App\Page;
        $page->title = 'Kontakt';
        $page->content = '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste soluta quod dolore aut, quia rem quasi, accusantium officiis sunt corporis quisquam odit obcaecati repellat ullam facere distinctio sapiente eius voluptate?</p>';
        $page->save();

        $page = new App\Page;
        $page->title = 'O nas';
        $page->content = '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste soluta quod dolore aut, quia rem quasi, accusantium officiis sunt corporis quisquam odit obcaecati repellat ullam facere distinctio sapiente eius voluptate?</p>';
        $page->save();

        $page = new App\Page;
        $page->title = 'Cennik';
        $page->content = '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste soluta quod dolore aut, quia rem quasi, accusantium officiis sunt corporis quisquam odit obcaecati repellat ullam facere distinctio sapiente eius voluptate?</p>';
        $page->save();

        $page = new App\Page;
        $page->title = 'Regulamin';
        $page->content = '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste soluta quod dolore aut, quia rem quasi, accusantium officiis sunt corporis quisquam odit obcaecati repellat ullam facere distinctio sapiente eius voluptate?</p>';
        $page->save();

        $page = new App\Page;
        $page->title = 'Oferta';
        $page->content = '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste soluta quod dolore aut, quia rem quasi, accusantium officiis sunt corporis quisquam odit obcaecati repellat ullam facere distinctio sapiente eius voluptate?</p>';
        $page->save();
    }
}
