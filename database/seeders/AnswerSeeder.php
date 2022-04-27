<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;
use App\Models\Answer;
use App\Models\Question;
use App\Models\User;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
