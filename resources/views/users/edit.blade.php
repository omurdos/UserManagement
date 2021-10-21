@extends('layouts.app')
@section('title')
    Users
@endsection

@section('main-content')
<form action="/users/{{ $user->id }}/update" method="POST">
    @csrf
   <div class="card">
    <div class="card-body">
        <div class="form-group">
            <label for="">Name</label>
            <input name="name" type="text" class="form-control" value="{{$user->name}}" placeholder="Name">
        </div>
        <div class="form-group">
            <label for="">Email address</label>
            <input name="email" type="email" class="form-control" value="{{$user->email}}" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="">Password</label>
            <input name="password" type="password" class="form-control"  placeholder="Enter password">
        </div>
        <div class="form-group">
            <label for="">Confirm Password</label>
            <input name="confirm-password" type="password" class="form-control"  placeholder="Confirm password">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
   </div>

</form>
@endsection
