<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\State;
use App\Tables\Cities;
use Illuminate\Http\Request;
use App\Http\Requests\CityStoreRequest;
use App\Http\Requests\CityUpdateRequest;
use ProtoneMedia\Splade\Facades\Splade;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.cities.index', [
            'cities' => Cities::class
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $states = State::pluck('name', 'id')->toArray();

        return view('admin.cities.create', compact('states'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CityStoreRequest $request)
    {
        City::create($request->validated());
        Splade::toast('City created successfully')->autoDismiss(3);

        return to_route('admin.cities.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(City $city)
    {
        $states = State::pluck('name', 'id')->toArray();

        return view('admin.cities.edit', compact('city', 'states'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CityUpdateRequest $request, City $city)
    {
        $city->update($request->validated());
        Splade::toast('City updated successfully')->autoDismiss(3);

        return to_route('admin.cities.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city)
    {
        $city->delete();
        Splade::toast('City deleted successfully')->autoDismiss(3);

        return to_route('admin.cities.index');
    }
}
