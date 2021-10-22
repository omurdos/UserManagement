@extends('layouts.app')
@section('title')
    Logs
@endsection

@section('main-content')
<div class="card">
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Message</th>
                    <th>created at</th>
                    <th>updated at</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($logs as $log)
                    <tr>
                        <td>{{ $log->message }}</td>
                        <td>{{ $log->created_at }}</td>
                        <td>{{ $log->updated_at }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Message</th>
                    <th>created at</th>
                    <th>updated at</th>

                </tr>
            </tfoot>
        </table>
    </div>
</div>
@endsection