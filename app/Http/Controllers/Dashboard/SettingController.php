<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class SettingController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();

        return view('dashboard.settings.index', compact('permissions'));
    }

    public function addRole(Request $request)
    {
        $request->validate([
            'name'          => 'required',
            'permissions'   => 'required',
        ]);

        $data = [
            'name'      => Str::snake($request->name),
            'caption'   => $request->name,
        ];

        $role = Role::create($data);
        $role->givePermissionTo($request->permissions);

        return back()->with('success', 'Data telah tersimpan.');
    }

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

    public function listRole()
    {
        $permission = Role::all();

        return datatables($permission)
                ->addIndexColumn()
                ->addColumn('action', function($query) {
                    $id = $query->id;

                    return '<button onclick="edit('. $id .')" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Ubah"><em class="icon ni ni-edit"></em> Ubah</button> '.
                    '<button onclick="remove('. $id .')" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Hapus"><em class="icon ni ni-trash"></em> Hapus</button>';
                })
                ->make(true);
    }

    public function listPermission()
    {
        $permission = Permission::all();

        return datatables($permission)
                ->addIndexColumn()
                ->addColumn('action', function($query) {
                    $id = $query->id;

                    return '<button onclick="edit('. $id .')" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Ubah"><em class="icon ni ni-edit"></em> Ubah</button> '.
                    '<button onclick="remove('. $id .')" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Hapus"><em class="icon ni ni-trash"></em> Hapus</button>';
                })
                ->make(true);
    }
}
