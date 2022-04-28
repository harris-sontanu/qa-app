<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Question;

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
}
