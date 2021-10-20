@extends('layouts.app')
@section('title')
    Orders
@endsection

@section('main-content')
<div class="card">
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Number</th>
                    <th>Date</th>
                    <th>Shipped date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->orderNumber }}</td>
                        <td>{{ $order->orderDate }}</td>
                        <td>{{ $order->shippedDate }}</td>
                        <td>{{ $order->status }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Number</th>
                    <th>Date</th>
                    <th>Shipped date</th>
                    <th>Status</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

@endsection