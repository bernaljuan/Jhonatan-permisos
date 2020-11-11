<?php

use App\Category;
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
        Category::create([
            'nombre' => 'Android',
            'slug' => 'android',

        ]);

        Category::create([
            'nombre' => 'iOS',
            'slug' => 'ios',

        ]);
    }
}
