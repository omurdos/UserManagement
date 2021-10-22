@extends('layouts.app')
@section('title')
    Editing {{ $role->display_name }}
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
    <form action="/roles/{{ $role->id }}/update" method="POST">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="">Name</label>
                    <input name="name" type="text" class="form-control" placeholder="Name" value="{{ $role->name }}"
                        required>
                </div>
                <div class="form-group">
                    <label for="">Display Name</label>
                    <input name="display_name" type="text" class="form-control" placeholder="Display name"
                        value="{{ $role->display_name }}" required>
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <input name="description" type="text" class="form-control" placeholder="Description"
                        value="{{ $role->description }}">
                </div>
                <hr>
                <h3>Permissions</h3>
                <div class="row">
                    @foreach ($permissions as $permission)
                        <div class="col-md-4">
                            <div>
                                <input type="checkbox" id="{{ $permission->name }}" name="permissions[]"
                                    value="{{ $permission->id }}"
                                    {{ $role->hasPermission($permission->name) ? 'checked' : '' }}>

                                <label for="{{ $permission->name }}">{{ $permission->display_name }}</label>

                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
            <div class="card-footer">
                <div class="float-right">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>

    </form>
@endsection
