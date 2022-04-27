<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Question;

class FavoriteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all()->modelKeys();
        $totalUsers = count($users);

        foreach (Question::all() as $question)
        {
            for ($i=0; $i < rand(1, $totalUsers); $i++) {
                $user = $users[$i];
                $question->favorites()->attach($user);
            }
        }
    }
}
