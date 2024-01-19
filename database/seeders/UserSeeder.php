<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
	public function run(): void
	{
		User::factory()->count(1)->create([
			'first_name' => 'Sogol',
			'last_name'  => 'Hedayat Manesh',
			'email'      => 'hedayatmanesh.sogol@gmail.com',
			'password'   => Hash::make('12345678'),
		]);
	}
}
