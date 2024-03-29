<?php

namespace App\Models;

use App\Models\Traits\VotableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Mews\Purifier\Casts\CleanHtmlOutput;

class Question extends Model
{
    use HasFactory;
    use VotableTrait;

    protected $fillable = [
        'title',
        'body',
        'attachment'
    ];

    protected $casts = [
        'body'    => CleanHtmlOutput::class, // cleans when getting the value
    ];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

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
            get: fn ($value) => route('questions.show', $this->slug)
        );
    }

    public function excerpt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Str::limit(strip_tags($this->body), 200)
        );
    }

    public function attachmentUrl(): Attribute
    {
        $attachmentUrl = '';
        if (!is_null($this->attachment)) {
            if (Storage::disk('public')->exists($this->attachment)) $attachmentUrl = Storage::url($this->attachment);
        }

        return Attribute::make(
            get: fn ($value) => $attachmentUrl,
        );
    }

    public function attachmentName(): Attribute
    {
        $attachmentName = '';
        if (!is_null($this->attachment)) {
            $array = Str::of($this->attachment)->explode('/');
            $array = $array->toArray();
            $attachmentName = last($array);
        }

        return Attribute::make(
            get: fn ($value) => $attachmentName,
        );
    }

    public function attachmentExt(): Attribute
    {
        $attachmentExt = '';
        if (!is_null($this->attachment)) {
            $array = Str::of($this->attachment)->explode('.');
            $array = $array->toArray();
            $attachmentExt = last($array);
        }

        return Attribute::make(
            get: fn ($value) => $attachmentExt,
        );
    }

    public function scopePopular($query)
    {
        $last7days = Carbon::now()->subDays(7);

        return $query->where('created_at', '>=', $last7days)
                    ->orderBy('votes', 'desc');
    }

    public function answers()
    {
        return $this->hasMany(Answer::class)->orderBy('votes_count', 'DESC');
    }

    public function acceptBestAnswer(Answer $answer)
    {
        $this->best_answer_id = $answer->id;
        $this->save();
    }

    public function favorites()
    {
        return $this->belongsToMany(User::class, 'favorites')->withTimestamps();
    }

    public function isFavorited (): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $this->favorites()->where('user_id', Auth::id())->count() > 0
        );
    }

    public function favoritesCount(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $this->favorites->count()
        );
    }

}
