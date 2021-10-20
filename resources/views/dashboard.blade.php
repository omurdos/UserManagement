@extends('layouts.app')

@section('title')
    Dashboard
@endsection

@section('main-content')

    <h1>Hello, welcome home</h1>
    @permission('payments-delete')
        <p>This is visible to users with the given permissions. Gets translated to
            @endpermission
        @endsection
