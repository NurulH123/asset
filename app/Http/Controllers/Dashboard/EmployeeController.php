<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\{ Employee, Department };
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;

class EmployeeController extends Controller
{
    public function index()
    {
        $employes = Employee::with('department')->get();
        $departments = Department::all();

        if (request()->ajax()) {
            return $this->simpleData($employes);
        }

        return view('dashboard.employee.index', compact('departments'));
    }

    public function store(EmployeeRequest $request)
    {
        $data = $request->all();
        if (isset($request->phone)) {
            $data['phone'] = $this->phoneFormat($data['phone']);
        }

        $addEmployee = Employee::create($data);

        return $addEmployee;
    }

    public function edit(Employee $employee)
    {
        return $employee;
    }

    public function update(EmployeeRequest $request, Employee $employee)
    {
        $data = $request->all();
        if (isset($request->phone)) {
            $data['phone'] = $this->phoneFormat($data['phone']);
        }

        return $employee->update($data);
    }

    public function destroy(Employee $employee)
    {
        return  $employee->delete();
    }
}
