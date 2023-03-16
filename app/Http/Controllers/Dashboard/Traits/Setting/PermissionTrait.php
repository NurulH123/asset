<?php
namespace App\Http\Controllers\Dashboard\Traits\Setting;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

/**
 *
 */
trait PermissionTrait
{
    public function addPermission(Request $request)
    {
        $this->validate($request, ['name' => 'required'], ['name.required' => 'Nama harus diisi']);
        $data = [
            'name'      => Str::snake($request->name),
            'caption'   => $request->name,
        ];

        $permission = Permission::create($data);

        return $permission;
    }

    public function editPermission(Permission $permission)
    {
        return $permission;
    }

    public function updatePermission(Request $request, Permission $permission)
    {
        $name = Str::snake($request->name);

        $data = [
            'name'      => $name,
            'caption'   => $request->name
        ];

        return $permission->update($data) ? 'Success' : 'Failed';
    }

    public function deletePermission(Permission $permission)
    {
        $permission->roles()->detach();

        if ($permission->delete()) {
            return 'success';
        }
    }

    public function listPermission()
    {
        $permission = Permission::all();

        return datatables($permission)
                ->addIndexColumn()
                ->addColumn('action', function($query) {
                    $id = $query->id;

                    return '<button onclick="editPermission('. $id .')" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Ubah"><em class="icon ni ni-edit"></em> Ubah</button> '.
                    '<button onclick="removePermission('. $id .')" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Hapus"><em class="icon ni ni-trash"></em> Hapus</button>';
                })
                ->make(true);
    }
}

