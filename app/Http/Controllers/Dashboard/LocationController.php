<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index()
    {
        $dataType = Location::all();

        if (request()->ajax()) {
            return $this->simpleData($dataType);
        }

        return view('dashboard.location.index');
    }

    public function store(Request $request)
    {
        $this->validate($request,
            ['name' => 'required'],
            ['name.required' => 'Nama Harus Diisi']
        );
        $data = $request->all();

        $addType = Location::create($data);

        return $addType;
    }

    public function edit(Location $location)
    {
        return $location;
    }

    public function update(Request $request, Location $location)
    {
        $this->validate($request,
            ['name' => 'required'],
            ['name.required' => 'Nama Harus Diisi']
        );
        
        return $location->update($request->all());
    }

    public function destroy(Location $location)
    {
        return  $location->delete();
    }
}
