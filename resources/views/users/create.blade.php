@extends('layouts.app')
@section('title')
    Users
@endsection

@section('main-content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="/users" method="POST">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="">Name</label>
                    <input name="name" type="text" class="form-control" placeholder="Name" value="{{ old('name')}}" required>
                </div>
                <div class="form-group">
                    <label for="">Email address</label>
                    <input name="email" type="email" class="form-control" placeholder="Enter email" value="{{ old('email') }}" required>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input name="password" type="password" class="form-control" placeholder="Enter password" required>
                </div>
                <div class="form-group">
                    <label for="">Confirm Password</label>
                    <input name="confirm-password" type="password" class="form-control"  placeholder="Confirm password" required>
                </div>

                <hr>
                <div class="container">
                    <h3>Roles</h3>
                <div class="row">
                    @foreach ($roles as $role)
                        <div class="col-md-4">
                            <div>
                                <input type="checkbox" id="{{ $role->name }}" name="roles[]" value="{{ $role->id }}">
                                <label for="{{ $role->name }}">{{ $role->display_name }}</label>
                            </div>
                        </div>
                    @endforeach
                </div>
                    <hr>
                    <h3>Permissions</h3>
                    <div class="row">
                        @foreach ($permissions as $permission)
                            <div class="col-md-4">
                                <div>
                                    <input type="checkbox" id="{{$permission->name}}" name="permissions[]"
                                        value="{{ $permission->id }}">
                                    <label for="{{$permission->name}}">{{ $permission->display_name }}</label>
                                </div>
                            </div>
                        @endforeach
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>

    </form>
@endsection
