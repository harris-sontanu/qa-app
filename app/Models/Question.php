<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Str;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function title(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => [
                'title' => Str::title($value),
                'slug'  => Str::slug($value)
            ]
        );
    }

    public function url(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => route('questions.show', $this->id)
        );
    }

    public function scopePopular($query)
    {
        return $query->orderBy('votes', 'desc');
    }
}
