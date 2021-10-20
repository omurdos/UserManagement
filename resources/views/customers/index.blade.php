@extends('layouts.app')
@section('title')
    Customers
@endsection

@section('main-content')
<div class="card">
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Number</th>
                    <th>Customer name</th>
                    <th>Contact name</th>
                    <th>Phone</th>
                    <th>AddressLine1</th>
                    <th>AddressLine2</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Country</th>
                    <th>Credit limit</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                    <tr>
                        <td>{{ $customer->customerNumber }}</td>
                        <td>{{ $customer->customerName }}</td>
                        <td>{{ $customer->contactLastName }} {{ $customer->contactFirstName }}</td>
                        <td>{{ $customer->phone }}</td>
                        <td>{{ $customer->addressLine1 }}</td>
                        <td>{{ $customer->addressLine2 }}</td>
                        <td>{{ $customer->city }}</td>
                        <td>{{ $customer->state }}</td>
                        <td>{{ $customer->country }}</td>
                        <td>{{ $customer->creditLimit }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Number</th>
                    <th>Customer name</th>
                    <th>Contact name</th>
                    <th>Phone</th>
                    <th>AddressLine1</th>
                    <th>AddressLine2</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Country</th>
                    <th>Credit limit</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@endsection