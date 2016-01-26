<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $timestamps = true;
    protected $fillable = ['author', 'description', 'is_active'];

    public function post()
    {
        return $this->belongsTo('App\Models\Post');
    }
}
