<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    public function scopeType($query, $type)
    {
        return $query->where('type', $type);
    }

    public function category()
    {
        return $this->belongsTo(Attribute::class, 'attribute_id');
    }
}
