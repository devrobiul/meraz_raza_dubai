<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $guarded = [];


    public function scopeType($query, $type)
    {
        return $query->where('type', $type);
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'attribute_id');
    }

    public function portfolioPosts()
    {
        return $this->hasMany(Post::class, 'attribute_id')->where('type', 'portfolio');
    }
    public function serviceposts()
    {
        return $this->hasMany(Post::class, 'attribute_id')->where('type', 'service');
    }
}
