<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    public function index(){
        $employees = Employee::all();
        return view('employees.index',['employees' => $employees]);
    }
}
