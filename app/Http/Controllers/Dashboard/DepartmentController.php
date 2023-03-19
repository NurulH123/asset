<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DepartmentController extends Controller
{
    public function index()
    {
        $department = Department::all();

        if (request()->ajax()) {
            return $this->simpleData($department);
        }

        return view('dashboard.department.index');
    }

    public function store(Request $request)
    {
        $this->validate($request,
            ['name' => 'required'],
            ['name.required' => 'Nama Harus Diisi']
        );
        $data = $request->all();

        $addType = Department::create($data);

        return $addType;
    }

    public function edit(Department $department)
    {
        return $department;
    }

    public function update(Request $request, Department $department)
    {
        $this->validate($request,
            ['name' => 'required'],
            ['name.required' => 'Nama Harus Diisi']
        );

        return $department->update($request->all());
    }

    public function destroy(Department $department)
    {
        return  $department->delete();
    }
}
