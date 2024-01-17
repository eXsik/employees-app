<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Tables\Employees;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Splade;
use App\Http\Requests\EmployeeStoreRequst;
use App\Http\Requests\EmployeeUpdateRequst;
use App\Models\City;
use App\Models\Department;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.employees.index', [
            'employees' => Employees::class
        ]);
    }

    /**
     * Show the form for creating a new resource.   
     */
    public function create()
    {
        $departments = Department::pluck('name', 'id')->toArray();
        $cities = City::pluck('name', 'id')->toArray();

        return view('admin.employees.create', compact('departments', 'cities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeStoreRequst $request)
    {
        $city = City::findOrFail($request->city_id);

        Employee::create(array_merge($request->validated(), [
            'country_id' => $city->state->country_id,
            'state_id' => $city->state_id,
        ]));
    
        Splade::toast('Employee created successfully')->autoDismiss(3);
        
        return to_route('admin.employees.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        $departments = Department::pluck('name', 'id')->toArray();
        $cities = City::pluck('name', 'id')->toArray();
        return view('admin.employees.edit', compact('employee', 'departments', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeUpdateRequst $request, Employee $employee)
    {   
        $city = City::findOrFail($employee->city_id);
        $employee->update(array_merge($request->validated(), [
            'country_id' => $city->state->country_id,
            'state_id' => $city->state_id
        ]));
        Splade::toast('Employee updated successfully')->autoDismiss(3);
        
        return to_route('admin.employees.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        Splade::toast('Employee deleted successfully')->autoDismiss(3);
        
        return to_route('admin.employees.index');
    }
}
