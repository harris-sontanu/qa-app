<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;
use App\Models\User;
use App\Models\Question;
use App\Models\Answer;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()
            ->count(9)
            ->create();

        Question::factory()
            ->count(27)
            ->state(new Sequence(
                fn ($sequence) => ['user_id' => User::all()->random()],
            ))
            ->create();

        Answer::factory()
            ->count(45)
            ->state(new Sequence(
                fn ($sequence) => [
                    'user_id' => User::all()->random(),
                    'question_id' => Question::all()->random()
                ],
            ))
            ->create();

    }
}
