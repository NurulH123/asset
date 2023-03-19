<?php

namespace  App\Models;

use App\Models\{ Asset, Maintenance };
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Supplier extends Model
{
    protected $guarded = ['id'];

    public function setCityAttribute($value)
    {
        $this->attributes['city'] = strtolower($value);
    }

    public function getCityAttribute($value)
    {
        return ucfirst($value);
    }

    public function asset()
    {
        return $this->hasMany(Asset::class);
    }

    public function maintenance()
    {
        return $this->hasMany(Maintenance::class);
    }
}
