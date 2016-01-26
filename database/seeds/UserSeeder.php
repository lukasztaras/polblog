<?php
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([
            'name' => 'Administrator',
            'email' => 'administrator@localhost',
            'password' => bcrypt('administrator'),
            'remember_token' => str_random(10),
        ]);
    }
}
