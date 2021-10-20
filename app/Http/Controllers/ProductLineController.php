<?php

namespace App\Http\Controllers;

use App\Models\ProductLine;
use Illuminate\Http\Request;

class ProductLineController extends Controller
{
    public function index()
    {
       $productLines = ProductLine::all();
       return view('product_lines.index', ['productLines' => $productLines]);
    }
}
