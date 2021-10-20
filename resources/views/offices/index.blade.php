@extends('layouts.app')
@section('title')
    Offices
@endsection

@section('main-content')
<div class="card">
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Code</th>
                    <th>City</th>
                    <th>Phone</th>
                    <th>AddressLine1</th>
                    <th>AddressLine2</th>
                    <th>State</th>
                    <th>Country</th>
                    <th>Territory</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($offices as $office)
                    <tr>
                        <td>{{ $office->officeCode }}</td>
                        <td>{{ $office->city }}</td>
                        <td>{{ $office->phone }}</td>
                        <td>{{ $office->addressLine1 }}</td>
                        <td>{{ $office->addressLine2 }}</td>
                        <td>{{ $office->state }}</td>
                        <td>{{ $office->country }}</td>
                        <td>{{ $office->territory }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Code</th>
                    <th>City</th>
                    <th>Phone</th>
                    <th>AddressLine1</th>
                    <th>AddressLine2</th>
                    <th>State</th>
                    <th>Country</th>
                    <th>Territory</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@endsection