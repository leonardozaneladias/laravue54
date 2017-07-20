<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\Laravue54\Models\User::class)->create([
            'name' => 'Admin',
            'email' => 'admin@laravue54.edu',
            'enrolment' => 100000,
        ]);
    }
}
