<?php

namespace  App\Models;

use App\Models\{Asset, Supplier, AssetType};
use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    protected $guarded = ['id'];

    protected function getStartDateAttribute($value)
    {
        return date('d/m/Y', strtotime($value));
    }

    protected function getEndDateAttribute($value)
    {
        return date('d/m/Y', strtotime($value));
    }

    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function assetType()
    {
        return $this->belongsTo(AssetType::class, 'asset_type_id', 'id');
    }
}
