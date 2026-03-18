<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
      protected $fillable = [
        'title',
        'slug',
        'description',
        'difficulty',
        'estimated_minutes',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
