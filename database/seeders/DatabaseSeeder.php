<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $userArray = [];

        for($i=1; $i < 11; $i++) {
            $userArray[$i] = [
                'name' => $faker->name(),
                'email' => $faker->unique()->safeEmail(),
            ];
        }

        foreach($userArray as $user) {
            \App\Models\User::factory()->create([
                'name' => $user["name"],
                'email' => $user["email"],
                'password' => bcrypt('password'),
                'elo' =>  $faker->numberBetween(0, 2800)
            ]);
        }
        
        for ($i=1; $i < 5001; $i++) {
            $chance = $faker->numberBetween(0, 1000);

            \App\Models\Matches::create([
                'scoreB' => $chance%2 == 0 ? 5 : 10,
                'scoreR' => $chance%2 == 0 ? 10 : 5,
                'gamemode' => 'Classique',
                'state' => 2
            ]);
        }

        for ($i=1; $i < 5001; $i++) {
            $userIdR = $faker->numberBetween(1, 10);
            $userIdB = $userIdR;

            do {
                $userIdB = $faker->numberBetween(1, 10);
            } while($userIdB == $userIdR);

            \App\Models\UserMatches::create([
                'matches_id' => $i,
                'user_id' => $userIdR,
                'role' => 'owner',
                'side' => 'red',
            ]);

            \App\Models\UserMatches::create([
                'matches_id' => $i,
                'user_id' => $userIdB,
                'role' => 'member',
                'side' => 'blue',
            ]);
        }

    }
}
