<?php

namespace App\Http\Controllers;

use App\Tables\Roles;
use App\Http\Requests\RoleStoreRequest;
use App\Http\Requests\RoleUpdateRequest;
use ProtoneMedia\Splade\Facades\Splade;
use Spatie\Permission\Models\Role as ModelsRole;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.roles.index', ['roles' => Roles::class]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleStoreRequest $request)
    {
        ModelsRole::create($request->validated());
        Splade::toast('Role created successfully')->autoDismiss(3);

        return to_route('admin.roles.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ModelsRole $role)
    {
        return view('admin.roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleUpdateRequest $request, ModelsRole $role)
    {
        $role->update($request->validated());
        Splade::toast('Role created successfully')->autoDismiss(3);

        return to_route('admin.roles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ModelsRole $role)
    {
        $role->delete();
        Splade::toast('Role deleted successfully')->autoDismiss(3);

        return to_route('admin.roles.index');
    }
}
