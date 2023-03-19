<?php

namespace  App\Models;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $guarded = ['id'];

    public function employee()
    {
        return $this->hasMany(Employee::class);
    }

}
