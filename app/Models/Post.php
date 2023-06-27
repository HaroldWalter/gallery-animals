<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'description',
        'lieuPhoto',
        'datePhoto',
        'user_id',
        'online',

    ];


    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function validComments()
    {
        return $this->comments()->whereHas('users', function ($query){
            $query->whereValid(true);
        });
    }

    public function tags() :BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }
}
