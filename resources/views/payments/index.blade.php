@extends('layouts.app')
@section('title')
    Payments
@endsection

@section('main-content')
<div class="card">
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Customer name</th>
                    <th>Check number</th>
                    <th>Payment date</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($payments as $payment)
                    <tr>
                        <td>{{ $payment->customer->customerName }}</td>
                        <td>{{ $payment->checkNumber }}</td>
                        <td>{{ $payment->paymentDate }}</td>
                        <td>{{ $payment->amount }}</td>
                  
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Check number</th>
                    <th>Payment date</th>
                    <th>Amount</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@endsection