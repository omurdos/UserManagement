@extends('layouts.app')
@section('title')
    Employees
@endsection

@section('main-content')

    <div class="card">
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Number</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Job title</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $employee)
                        <tr>
                            <td>{{ $employee->employeeNumber }}</td>
                            <td>{{ $employee->firstName }}, {{ $employee->lastName }}</td>
                            <td>{{ $employee->email }}</td>
                            <td>{{ $employee->jobTitle }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Number</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Job title</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

@endsection