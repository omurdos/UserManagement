<?php

namespace App\Http\Controllers;

use App\Models\Office;
use Illuminate\Http\Request;

class OfficesController extends Controller
{
    public function index()
    {
        $offices = Office::all();
        return view('offices.index',['offices' => $offices]);
    }
}
