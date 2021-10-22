@extends('layouts.app')
@section('title')
    Edit {{ $user->name }}
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

    <form action="/users/{{ $user->id }}/update" method="POST">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="">Name</label>
                    <input name="name" type="text" class="form-control" value="{{ $user->name }}" placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="">Email address</label>
                    <input name="email" type="email" class="form-control" value="{{ $user->email }}"
                        placeholder="Enter email">
                </div>

                <div>
                    <label for="modify_password">Modify password?</label>
                    <input type="checkbox" id="modify_password" onchange="modifyPassword()" checked=false>
                </div>

                <div class="d-none" id="modifyPasswordBlock">
                    <div class="form-group">
                        <label for="">Password</label>
                        <input name="password" type="password" class="form-control" placeholder="Enter password">
                    </div>
                    <div class="form-group">
                        <label for="">Confirm Password</label>
                        <input name="confirm-password" type="password" class="form-control"
                            placeholder="Confirm password">
                    </div>
                </div>

                <hr>
                <h3>Roles</h3>
                <div class="row">
                    @foreach ($roles as $role)
                        <div class="col-md-4">
                            <div>
                                <input id="{{ $role->name }}" type="checkbox" name="roles[]" value="{{ $role->id }}"
                                    {{ $user->hasRole($role->name) ? 'checked' : '' }}>
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
                                <input id="{{ $permission->name }}" type="checkbox" name="permissions[]"
                                    value="{{ $permission->id }}"
                                    {{ $user->permissions->contains($permission) ? 'checked' : '' }}>
                                <label for="{{ $permission->name }}">{{ $permission->display_name }}</label>
                            </div>
                        </div>
                    @endforeach
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
    </form>
@endsection


@section('scripts')
    <script>
        var element = document.getElementById('modify_password');
        element.checked = false;
        function modifyPassword() {
            
            var modifyPsswordBlock = document.getElementById('modifyPasswordBlock');
            if (element.checked == true) {
                modifyPasswordBlock.classList.remove('d-none');
            } else {
                modifyPasswordBlock.classList.add('d-none');
            }
        }
    </script>
@endsection
