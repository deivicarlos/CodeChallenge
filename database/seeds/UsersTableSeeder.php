<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

     /*
    CD: Latitude: 18.4558292 Longitude: -69.962637
    Sambil: (18.482843, -69.913290)
    Acropolis: (18.469596, -69.939480)
    Constanza: (18.909438, -70.732642)
    Santiago: (19.456582, -70.692162)
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => 'Carlos',
            'last_name' => 'Garcia',
            'name' => 'CD',
            'email' => 'carlos.garcia@bluecoding.com',
            'date_of_birth' => date_create(),
            'is_host' => true,
            'latitude' => 18.4558292,
            'longitude'  => -69.962637
        ]);

        //  Near user 1
        DB::table('users')->insert([
            'first_name' => 'Randall',
            'last_name' => 'Valenciano',
            'name' => 'Valen',
            'email' => 'rvalenciano@bluecoding.com',
            'date_of_birth' => date_create(),
            'is_host' => false,
            'latitude' => 18.482843, //Sambil latlog
            'longitude'  => -69.913290
        ]);

        //  Near user 1
        DB::table('users')->insert([
            'first_name' => 'Sambil',
            'last_name' => 'Sambil',
            'name' => 'Sambil',
            'email' => 'sambil@bluecoding.com',
            'date_of_birth' => date_create(),
            'is_host' => false,
            'latitude' => 18.482843, //Sambil latlog
            'longitude'  => -69.913290
        ]);

        //  Far of user 1
        DB::table('users')->insert([
            'first_name' => 'Far User 1',
            'last_name' => 'Far User 1',
            'name' => 'Far User 1',
            'email' => 'FarUser1@bluecoding.com',
            'date_of_birth' => date_create(),
            'is_host' => false,
            'latitude' => 18.909438,   //Constanza latlog
            'longitude'  => -70.732642
        ]);

        //  Far of user 1
        DB::table('users')->insert([
            'first_name' => 'Far User 2',
            'last_name' => 'Far User 2',
            'name' => 'Far User 2',
            'email' => 'FarUser2@bluecoding.com',
            'date_of_birth' => date_create(),
            'is_host' => false,
            'latitude' => 18.909438,   //Constanza latlog
            'longitude'  => -70.732642
        ]);
    }
}
