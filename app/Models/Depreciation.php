<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;

class Depreciation extends Model
{
    protected $guarded = ['id'];

    public function depreciationable()
    {
        return $this->morphTo();
    }
}
