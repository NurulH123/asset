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
        $roles = Role::whereNotIn('name', ['master', 'super_admin'])->get();
        $permissions = Permission::all();

        if (request()->ajax()) {
            $groups = Permission::whereNull('group_id')->get();

            return view('dashboard.settings.modals.options_add_permission', compact('groups'));
        }

        return view('dashboard.settings.index', compact('permissions', 'roles'));
    }
}
