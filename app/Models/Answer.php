<?php

namespace App\Models;

use App\Models\Traits\VotableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Mews\Purifier\Casts\CleanHtmlOutput;

class Answer extends Model
{
    use HasFactory;
    use VotableTrait;

    protected $fillable = [
        'body',
        'user_id'
    ];

    protected $casts = [
        'body'    => CleanHtmlOutput::class, // cleans when getting the value
    ];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::created(function ($answer) {
            $answer->question->increment('answers_count');
        });

        static::deleted(function ($answer) {
            $answer->question->decrement('answers_count');
        });
    }

    public function status(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $this->id === $this->question->best_answer_id ? 'vote-accepted' : ''
        );
    }

    public function isAccepted(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $this->id === $this->question->best_answer_id
        );
    }

}
