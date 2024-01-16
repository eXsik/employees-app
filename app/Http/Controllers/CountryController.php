<?php

namespace App\Http\Controllers;

use App\Tables\Countries;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.countries.index', [
            'countries' => Countries::class
        ]);
    }
}
