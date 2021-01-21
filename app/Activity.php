<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $guarded = [];

    public function activitable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        $this->belongsTo(User::class, 'user_id');
    }
}
