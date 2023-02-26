<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Supplier;
use App\Http\Controllers\Controller;
use App\Http\Requests\SupplierRequest;
use App\Http\Controllers\Dashboard\Traits\Supplier as TraitSupplier;

class SupplierController extends Controller
{
    use TraitSupplier;

    public function index()
    {
        $suppliers = Supplier::all();

        if (request()->ajax()) {
            return $this->simpleData($suppliers);
        }

        return view('dashboard.supplier.index');
    }

    public function store(SupplierRequest $request)
    {
        $data = $request->all();
        $data['phone'] = $this->phoneFormat($data['phone']);

        $addSupplier = Supplier::create($data);

        return $addSupplier;
    }

    public function edit(Supplier $supplier)
    {
        return $supplier;
    }

    public function update(SupplierRequest $request, Supplier $supplier)
    {
        $data = $request->all();
        $data['phone'] = $this->phoneFormat($data['phone']);

        return $supplier->update($data);
    }

    public function destroy(Supplier $supplier)
    {
        return  $supplier->delete();
    }
}
