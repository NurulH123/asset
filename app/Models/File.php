<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $guarded = ['id'];

    public function getCreatedAtAttribute($value)
    {
        return date('d F Y', strtotime($value));
    }

    public function filable()
    {
        return $this->morphTo();
    }
}
