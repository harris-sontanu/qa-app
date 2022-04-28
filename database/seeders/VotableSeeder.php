<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Question;
use App\Models\Answer;

class VotableSeeder extends Seeder
{
    private $votes = [-1, 1];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->voteQuestion();
        $this->voteAnswer();
    }

    private function voteQuestion() {
        DB::table('votables')->where('votable_type', 'App\Models\Question')->delete();
        DB::table('questions')->update(['votes_count' => 0]);

        $users = User::all();

        foreach (Question::all() as $question) {
            for ($i=0; $i < rand(1, $users->count()); $i++) {
                $user = $users[$i];
                $user->voteQuestion($question, $this->votes[rand(0, 1)]);
            }
        }
    }

    private function voteAnswer() {
        DB::table('votables')->where('votable_type', 'App\Models\Answer')->delete();
        DB::table('answers')->update(['votes_count' => 0]);$users = User::all();

        foreach (Answer::all() as $answer) {
            for ($i=0; $i < rand(1, $users->count()); $i++) {
                $user = $users[$i];
                $user->voteAnswer($answer, $this->votes[rand(0, 1)]);
            }
        }
    }
}
