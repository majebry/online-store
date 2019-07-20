<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category1 = new Category;
        $category1->name = 'Bags';
        $category1->save();

        $category2 = new Category;
        $category2->name = 'Clothes';
        $category2->save();
    }
}
