@extends('layouts.app')
@section('title')
    New role
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
<form action="/roles" method="POST">
    @csrf
   <div class="card">
    <div class="card-body">
        <div class="form-group">
            <label for="">Name</label>
            <input name="name" type="text" class="form-control"  placeholder="Name" required>
        </div>
        <div class="form-group">
            <label for="">Display Name</label>
            <input name="display_name" type="text" class="form-control"  placeholder="Display name" required>
        </div>
        <div class="form-group">
            <label for="">Description</label>
            <input name="description" type="text" class="form-control"  placeholder="Description">
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
    <div class="card-footer">
        <div class="float-right">
            <button type="submit" class="btn btn-primary">Submit</button>

        </div>
       </div>
   </div>

</form>
@endsection
