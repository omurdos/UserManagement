@extends('layouts.app')
@section('title')
    New role
@endsection

@section('main-content')

<form action="/roles/store" method="POST">
    @csrf
   <div class="card">
    <div class="card-body">
        <div class="form-group">
            <label for="">Name</label>
            <input name="name" type="text" class="form-control"  placeholder="Name">
        </div>
        <div class="form-group">
            <label for="">Display Name</label>
            <input name="display_name" type="text" class="form-control"  placeholder="Display name">
        </div>
        <div class="form-group">
            <label for="">Description</label>
            <input name="description" type="text" class="form-control"  placeholder="Description">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    <hr>
    <h3>Permissions</h3>
    <div class="row">
        @foreach ($permissions as $permission)
        <div class="col-md-4">
            <div>
                <input type="checkbox" id="permission" name="permissions[]" value="{{ $permission->id }}">
                <label for="permission">{{$permission->display_name}}</label>
              </div>
        </div>
    @endforeach
    </div>
   </div>

</form>
@endsection
