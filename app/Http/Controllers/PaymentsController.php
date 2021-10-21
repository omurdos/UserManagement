<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    public function index()
    {
        $payments = Payment::all();
        return view('payments.index', [ 'payments' => $payments]);
    }
}
