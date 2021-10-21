<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $ordersByStatus = DB::table('orders')
            ->select(DB::raw('count(*) as orders_count, status'))
            ->groupBy('status')
            ->get();

        $ordersDoughnutData = collect();

        foreach ($ordersByStatus as $item) {
            $ordersDoughnutData->add($item->orders_count);
        }

        return view('dashboard', [
            'ordersByStatus' => $ordersByStatus,
            'ordersDoughnutData' => $ordersDoughnutData
        ]);
    }


    public function stats()
    {
        $ordersByStatus = DB::table('orders')
            ->select(DB::raw('count(*) as orders_count, status'))
            ->groupBy('status')
            ->get();


        $paymentsSummary = DB::table('payments')
            ->select(DB::raw('SUM(amount) AS amount'))
            ->whereYear('paymentDate', '=', '2005')
            ->groupByRaw('Month(paymentDate)')
            ->get();


        $payments = array();

        foreach ($paymentsSummary as $item) {
            array_push($payments,  $item->amount);
        }

        $data = [
            'ordersByStatus' => $ordersByStatus,
            'paymentsSummary' => $payments
        ];
        return json_encode($data);
    }
}
