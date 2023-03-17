<?php
namespace App\Http\Controllers\Dashboard\Traits\Setting;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

/**
 *
 */
trait RoleTrait
{
    public function addRole(Request $request)
    {
        $request->validate([
            'name'          => 'required',
        ], [
            'name.required' => 'Nama harus diisi',
        ]);

        $data = [
            'name'      => Str::snake($request->name),
            'caption'   => $request->name,
        ];

        $role = Role::create($data);

            $role->givePermissionTo($request->permissions);

        return back()->with('success', 'Data telah tersimpan.');
    }

    public function editRole($id)
    {
        $options = '';
        $role = Role::with('permissions:id')->where('id', $id)->first();
        $permissions = Permission::all();

        $rolePermission = array_map(function($item) {
            return $item["id"];
        }, $role->permissions->toArray());


        foreach ($permissions as $permission) {
            if (in_array($permission->id, $rolePermission)) {
                $options .= '<option selected value="'.$permission->id.'">'.$permission->caption.'</option>';
            } else {
                $options .= '<option value="'.$permission->id.'">'.$permission->caption.'</option>';
            }
        }

        return [
            'role'      => $role,
            'options'   => $options,
        ];
    }

    public function updateRole(Request $request, Role $role)
    {
        $request->validate([
            'name'          => 'required',
        ], [
            'name.required' => 'Nama harus diisi',
        ]);

        if ($request->permissions) {
            $role->permissions()->sync($request->permissions);
        }

        $name = Str::snake($request->name);
        $role = $role->update([
            'name'      => $name,
            'caption'   => $request->name,
        ]);

        return $role;
    }

    public function deleteRole(Role $role)
    {
        $role->permissions()->detach();

        if ($role->delete()) {
            return 'Success';
        }
    }

    public function listRole()
    {
        $permission = Role::with('permissions')->whereNotIn('name', ['master', 'super_admin'])->get();

        return datatables($permission)
                ->addIndexColumn()
                ->editColumn('permissions', function($query) {
                    $strPermission = '';
                    $permissions = $query->permissions;

                    if ($permissions) {
                        foreach ($permissions as $permission) {
                            $strPermission .= ' <span class="badge badge-dim bg-outline-primary">'.$permission->caption.'</span>';
                        }
                    }

                    return $strPermission;
                })
                ->addColumn('action', function($query) {
                    $id = $query->id;

                    return '<button onclick="editRole('. $id .')" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Ubah"><em class="icon ni ni-edit"></em> Ubah</button> '.
                    '<button onclick="removeRole('. $id .')" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Hapus"><em class="icon ni ni-trash"></em> Hapus</button>';
                })
                ->rawColumns(['permissions', 'action'])
                ->make(true);
    }
}

