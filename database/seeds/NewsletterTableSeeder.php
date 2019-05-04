<?php

use Illuminate\Database\Seeder;

class NewsletterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $newsletter = new App\Newsletter;
        $newsletter->content = '<div style="max-width: 500px; width: 100%; margin: 0 auto; padding: 0 15px;">
						        <h1 style="text-align: center;">Przykładowy newsletter</h1>
						        </div>';
		$newsletter->save();
    }
}
