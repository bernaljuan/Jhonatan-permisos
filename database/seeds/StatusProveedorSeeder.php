<?php

use App\StatusProveedor;
use Illuminate\Database\Seeder;

class StatusProveedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StatusProveedor::create([
			'name' => 'En espera',
		]);
		StatusProveedor::create([
			'name' => 'Aprobado',
		]);
    }
}
