<?php

use Illuminate\Database\Seeder;
use App\Status;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
		Status::create([
			'name' => 'Orden recibida',
			'percent' => 10,
		]);
		Status::create([
			'name' => 'En preparacion',
			'percent' => 30,
		]);
		Status::create([
			'name' => 'Terminando preparacion',
			'percent' => 50,
		]);
		Status::create([
			'name' => 'En camino',
			'percent' => 70,
		]);
		Status::create([
			'name' => 'Tu pedido ha llegado',
			'percent' => 100,
		]);
	}
}
