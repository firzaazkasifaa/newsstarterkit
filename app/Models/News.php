<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class News extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'title', 
        'slug', 
        'content', 
        'image', 
        'status', 
        'category_id', 
        'user_id', 
        'published_at'
    ];

    /**
     * The attributes that should be cast to dates.
     *
     * @var array<string>
     */
    protected $dates = ['published_at'];

    /**
     * Get the category that owns the news.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the author (user) of the news.
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get all approvals for the news.
     */
    public function approvals(): HasMany
    {
        return $this->hasMany(NewsApproval::class);
    }
}