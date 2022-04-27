<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;
use App\Models\Question;
use App\Models\User;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Question::factory()
            ->count(27)
            ->state(new Sequence(
                fn ($sequence) => ['user_id' => User::all()->random()],
            ))
            ->create();
    }
}
