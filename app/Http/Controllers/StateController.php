<?php

namespace App\Http\Controllers;

use App\Http\Requests\StateStoreRequest;
use App\Http\Requests\StateUpdateRequest;
use App\Models\State;
use App\Tables\States;
use App\Models\Country;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Splade;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.states.index', [
            'states' => States::class
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $countries = Country::pluck('name', 'id')->toArray();

        return view('admin.states.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StateStoreRequest $request)
    {
        State::create($request->validated());
        Splade::toast('State created successfully')->autoDismiss(3);

        return to_route('admin.states.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(State $state)
    {   
        $countries = Country::pluck('name', 'id');
        return view('admin.states.edit', compact('state', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StateUpdateRequest $request, State $state)
    {
        $state->update($request->validated());
        Splade::toast('State updated successfully')->autoDismiss(3);

        return to_route('admin.states.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(State $state)
    {
        $state->delete();
        Splade::toast('State deleted successfully')->autoDismiss(3);

        return to_route('admin.states.index');
    }
}
