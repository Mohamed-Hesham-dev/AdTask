<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use HasFactory;
    public $guarded = [];
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get all of the tags for the Ad
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'tags_ads','ad_id', 'tag_id');
    }
}
