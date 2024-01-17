<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Tables\Users;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\View\View as ViewView;
use ProtoneMedia\Splade\Facades\Splade;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.users.index', [
            'users' => Users::class,      
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::pluck('name', 'id')->toArray();
        $roles = Role::pluck('name', 'id')->toArray();

        return view('admin.users.create', compact('permissions', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $user =  User::create($request->validated());
        $roles = Role::whereIn('id', $request->roles)->get();
        $permissions = Role::whereIn('id', $request->permissions)->get();
        $user->syncRoles($roles); 
        $user->syncPermissions($permissions); 
        Splade::toast('User created successfully')->autoDismiss(3);

        return to_route('admin.users.index');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): View
    {   $permissions = Permission::pluck('name', 'id')->toArray();
        $roles = Role::pluck('name', 'id')->toArray();

        return view('admin.users.edit', compact('user', 'permissions', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->validated());
        $roles = Role::whereIn('id', $request->roles)->get();
        $permissions = Role::whereIn('id', $request->permissions)->get();
        $user->syncRoles($roles); 
        $user->syncPermissions($permissions); 
        Splade::toast('User updated successfully')->autoDismiss(3);

        return to_route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        Splade::toast('User has been deleted.')->autoDismiss(3);

        return back();
    }
}
