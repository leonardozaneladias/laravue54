<?php

use Illuminate\Database\Seeder;
use Laravue54\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create([
            'name' => 'Admin',
            'email' => 'admin@laravue54.edu',
            'enrolment' => 100000,
        ])->each(function (User $user){
            User::assingRole($user, User::ROLE_TEACHER);
            $user->save();
        });

        factory(User::class, 10)->create()->each(function (User $user){
            if(!$user->userable){
                User::assingRole($user, User::ROLE_TEACHER);
                User::assignEnrolment(new User(), User::ROLE_TEACHER);
                $user->save();
            }
        });

        factory(User::class, 10)->create()->each(function (User $user){
            if(!$user->userable) {
                User::assingRole($user, User::ROLE_STUDENT);
                User::assignEnrolment(new User(), User::ROLE_STUDENT);
                $user->save();
            }
        });
    }
}
