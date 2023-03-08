<?php

namespace  App\Models;

use App\Models\ComponentTransaction;
use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    protected $guarded = ['id'];

    public function type()
    {
        return $this->belongsTo(AssetType::class, 'asset_type_id', 'id');
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function transaction()
    {
        return $this->hasMany(AssetTransaction::class);
    }
}
