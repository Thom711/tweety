<?php

namespace Database\Seeders;

use App\Models\Tweet;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // NOTE: BEFORE RUNNING THE SEEDER, CREATE ONE USER FIRST FOR YOURSELF TO USE!!
        // MAKE SURE THIS USER HAS THE ID OF 1

        //5 users are created with 5 tweets each, and registered as all friends of each other.
        //10 more users are created with 5 tweets each, without friends.

        User::factory(5)->create();

        $users = User::all();

         foreach($users as $user) {
             Tweet::factory(5)->create(['user_id' => $user->id]);

             foreach(range(1, 6) as $value)  {
                 if($value != $user->id) {
                     $friend = User::where('id', $value)->firstOrFail();
                     $user->follow($friend);
                 }
             }
         }

        $users = User::factory(10)->create();

        foreach($users as $user) {
            Tweet::factory(5)->create(['user_id' => $user->id]);
        }

    }
}
