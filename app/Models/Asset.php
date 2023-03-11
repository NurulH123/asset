<?php

namespace  App\Models;

use App\Models\File;
use App\Models\{ AssetType, ComponentTransaction };
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    protected $guarded = ['id'];

    public function components()
    {
        return $this->belongsToMany(Component::class, ComponentTransaction::class);
    }

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

    public function maintenance()
    {
        return $this->hasMany(Maintenance::class);
    }

    public function files()
    {
        return $this->morphMany(File::class, 'filable');
    }
}
