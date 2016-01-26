<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $timestamps = true;
    protected $fillable = ['title', 'description', 'is_active'];

    public function getCreatedAtAttribute($value)
    {
        $datetime = new \DateTime($value);
        return $datetime->format('d/m/Y');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }
}
