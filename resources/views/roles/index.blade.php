@extends('layouts.app')
@section('title')
    Roles
@endsection

@section('main-content')


@if(session()->has('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
   @if ( session()->get('message'))
       <strong>Congrats!</strong> changes saved successfully
   @endif
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
   
@endif
    <div class="card">
        <div class="card-header">
            <a href="/roles/create" class="btn btn-primary float-right">New Role</a>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Display name</th>
                        <th>Description</th>
                        <th>Permissions</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{ $role->name }}</td>
                            <td>{{ $role->display_name }}</td>
                            <td>{{ $role->description }}</td>
                            <td>{{ $role->permissions->count() }}</td>
                            <td>
                                <a href="roles/{{$role->id}}/edit">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Display name</th>
                        <th>Description</th>
                        <th>Permissions</th>
                        <th>Actions</th>

                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection
