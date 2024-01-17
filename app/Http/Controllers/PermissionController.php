<?php

namespace App\Http\Controllers;

use App\Tables\Permissions;
use ProtoneMedia\Splade\Facades\Splade;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\PermissionStoreRequest;
use App\Http\Requests\PermissionUpdateRequest;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.permissions.index', ['permissions' => Permissions::class]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.permissions.create', ['roles' => Role::pluck('name', 'id')->toArray()]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(PermissionStoreRequest $request)
    {
        $permission = Permission::create($request->validated());
        $roles = Role::whereIn('id', $request->roles)->get();
        $permission->syncRoles($roles);        
        Splade::toast('Role created successfully')->autoDismiss(3);

        return to_route('admin.permissions.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permission $permission)
    {
        $roles = Role::pluck('name', 'id')->toArray();

        return view('admin.permissions.edit', compact('permission', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PermissionUpdateRequest $request, Permission $permission)
    {
        $permission->update($request->validated());
        $roles = Role::whereIn('id', $request->roles)->get();
        $permission->syncRoles($roles);
        Splade::toast('Permission updated successfully')->autoDismiss(3);

        return to_route('admin.permissions.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();
        Splade::toast('Permission deleted successfully')->autoDismiss(3);

        return to_route('admin.permissions.index');
    }
}
