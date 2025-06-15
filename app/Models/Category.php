<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = ['name', 'slug'];

    /**
     * Get all news articles for the category.
     */
    public function news(): HasMany
    {
        return $this->hasMany(News::class);
    }
}
