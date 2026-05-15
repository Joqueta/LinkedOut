<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    // Protect
    protected $fillable = [
        'title',
        'content',
        'user_id',
    ];

    // Factory 
    use HasFactory;

    // Relations 
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->withDefault(['name' => 'Inconnu']);
    }
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class)->withDefault(['name' => 'Inconnu']);
    }
    public function comment(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
