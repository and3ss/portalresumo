<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    public function portal()
    {
        return $this->belongsTo(Portal::class);
    }
}
