<?php

namespace App\Models;

use App\Models\{ Asset, Maintenance };
use Illuminate\Database\Eloquent\Model;

class AssetType extends Model
{
    protected $guarded = ['id'];

    public function asset()
    {
        return $this->hasMany(Asset::class);
    }

    public function maintenance()
    {
        return $this->hasMany(Maintenance::class);
    }
}
