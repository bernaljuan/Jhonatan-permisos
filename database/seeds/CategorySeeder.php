<?php

use App\categorias;
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
        categorias::create([
			'nombre' => 'Personal',
        ]);
        
        categorias::create([
			'nombre' => 'Familiar',
		]);
    }
}
