<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $paragraphs = $this->faker->paragraphs(rand(4, 10));
        $body = '';
        foreach ($paragraphs as $paragraph) {
            $body .= '<p>' . $paragraph . '</p>';
        }

        return [
            'title'     => Str::of($this->faker->sentence(rand(5, 10)))->rtrim('.'),
            'body'      => $body,
            'views'     => rand(0, 10),
            // 'answers_count'   => rand(0, 10),
            // 'votes_count'     => rand(-3, 10)
        ];
    }
}
