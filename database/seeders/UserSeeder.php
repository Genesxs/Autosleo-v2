<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nombres' => 'Carolina',
            'apellidos' => 'Rendon',
            'name' => 'Carolina',
            'email' => 'autosleo.car@hotmail.com',
            'direccion' => 'cr 22 #34-32',
            'celular' => '1234567854',
            'telefono' => '1234567',
            'estado' => '1',
            'password' => bcrypt('a1b2c3')])->assignRole('Admin');

        // User::factory(25)->create();
    }
}
