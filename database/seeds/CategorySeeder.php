<?php

use App\Categoy;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Catégorie 1 ,' , 'Catégorie 2' , 'Catégorie 3'];

        foreach ($categories as $cartegory)
        {
            Categoy::create(['name' => $cartegory]);
        }
    }
}
