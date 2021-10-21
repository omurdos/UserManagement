@extends('layouts.app')
@section('title')
    Users
@endsection

@section('main-content')


@if(session()->has('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
   @if ( session()->get('message'))
       <strong>Congrats!</strong> user has been updated successfully
   @endif
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
   
@endif
    <div class="card">
        <div class="card-header">
            <a href="/users/create" class="btn btn-primary float-right">New User</a>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->roles->count() }}</td>
                            <td>
                                <a href="users/{{$user->id}}/edit">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <th>Actions</th>

                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection
