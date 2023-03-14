<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\{
    Asset,
    Component,
    Supplier,
    Brand,
    Location,
    AssetType,
    ComponentTransaction,
    Employee
};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ComponentRequest;
use Illuminate\Support\Facades\Storage;

class ComponentController extends Controller
{
    public function index()
    {
        $components = Component::with(['brand', 'type', 'location'])->get();

        $datas = [
            'assets'        => Asset::all(),
            'suppliers'     => Supplier::all(),
            'brands'        => Brand::all(),
            'locations'     => Location::all(),
            'asset_types'   => AssetType::all(),
            'employees'     => Employee::all(),
        ];

        if (request()->ajax()) {
            return $this->simpleThreeAction($components, 'component');
        }

        return view('dashboard.components.index', $datas);
    }

    public function show(Component $component)
    {
        $datas = [
            'type'          => $component,
            'component'     => $component,
            'dt_components' => Component::all(),
            'dt_assets'     => Asset::all(),
        ];

        return view('dashboard.component_details.index', $datas);
    }

    public function store(ComponentRequest $request)
    {
        $data = $request->all();
        $data['available_quantity'] = $request->quantity;
        $data['photo'] = $this->convertFile($request, 'photo_component');
        $data['purchase_date'] = date('Y-m-d', strtotime($request->purchase_date));

        $addType = Component::create($data);

        return $addType;
    }

    public function edit(Component $component)
    {
        return $component;
    }

    public function update(ComponentRequest $request, Component $component)
    {
        $data = $request->all();

        if ($request->file('photo_component')) {
            $photoname = explode('/', $component->photo)[3];
            $stoPath = 'public/photo/photo_component/'.$photoname;
            Storage::delete($stoPath); // Menghapus photo yg sebelumnya

            $data['photo'] = $this->convertFile($request, 'photo_component');
        }

        if (!is_null($request->quantity)) {
            $difference = $component->quantity - $component->available_quantity;
            $data['available_quantity'] = $request->quantity - $difference;
        }

        return $component->update($data);
    }

    public function destroy(Component $component)
    {
        return  $component->delete();
    }
}
