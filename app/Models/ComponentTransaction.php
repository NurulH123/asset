<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ComponentTransaction extends Pivot
{
    public $table = 'component_transactions';
    protected $guarded = ['id'];

    public function components()
    {
        return $this->belongsTo(Component::class, 'component_id', 'id');
    }

    public function assets()
    {
        return $this->belongsTo(Asset::class, 'asset_id', 'id');
    }

    public function parent()
    {
        return $this->hasMany(ComponentTransaction::class, 'parent_id', 'id');
    }

    public function child()
    {
        return $this->belongsTo(ComponentTransaction::class, 'parent_id', 'id');
    }
}
