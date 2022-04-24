<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'attachment'
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
        $last7days = Carbon::now()->subDays(7);
        return $query->where('created_at', '>=', $last7days)
                    ->orderBy('votes', 'desc');
    }
}
