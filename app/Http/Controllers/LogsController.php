<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Log;
class LogsController extends Controller
{
    public function index()
    {
        $logs = log::select('*')->orderByDesc('updated_at')->get();
        return view('logs.index', [
            "logs"=>$logs
        ]);
    }
}
