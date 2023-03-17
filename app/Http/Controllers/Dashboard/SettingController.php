<?php

namespace App\Http\Controllers\Dashboard;

use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\Dashboard\Traits\Setting\RoleTrait;
use App\Http\Controllers\Dashboard\Traits\Setting\PermissionTrait;

class SettingController extends Controller
{
    use RoleTrait, PermissionTrait;

    public function index()
    {
        $roles = Role::all();
        $permissions = Permission::all();

        return view('dashboard.settings.index', compact('permissions', 'roles'));
    }
}
