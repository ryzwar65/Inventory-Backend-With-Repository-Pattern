<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for($i = 1; $i <= 50; $i++){
            // insert data ke table pegawai menggunakan Faker
          \DB::table('users')->insert([
              'firstname' => $faker->firstname,
              'lastname' => $faker->lastname,
              'email' => $faker->email,
              'address' => $faker->address,
              'phone'=>$faker->e164PhoneNumber,
              'password'=>\Hash::make(12345678)
          ]);
        }
        // $this->call(UsersTableSeeder::class);
    }
}
