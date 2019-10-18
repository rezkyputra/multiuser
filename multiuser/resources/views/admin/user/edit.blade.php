@extends('admin.layouts.app')

@section('content')
<div class="col-md-6 mx-auto my-3">  
    <h4 class="my-2 text-primary">Update Data</h4>
    <hr>
    <div class="container">
        <form action="/admin/user/{{$user->id}}" method="POST">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <div class="form-group">
                <!-- <input type="hidden" name="password" value=""> -->
                <label for="username">Username</label>
                <input type="text" value="{{$user->username}}" class="form-control" name="username" id="username" aria-describedby="emailHelp" placeholder="Username" required>
            </div>
            @if ($errors->has('username'))
                <span class="help-block">
                    <p class="text-danger" >{{ $errors->first('username') }}</p>
                </span>
            @endif
            <div class="form-group">
                <label for="exampleInputPassword1">Email</label>
                <input type="email" value="{{$user->email}}" class="form-control" name="email" id="email" placeholder="Email" required>
            </div>
            @if ($errors->has('email'))
                <span class="help-block">
                    <p class="text-danger" >{{ $errors->first('email') }}</p>
                </span>
            @endif
            <div class="form-group">
                <label for="level">Level</label>
                <select class="form-control" name="role_id" id="level" required>
                    <option value="">-</option>
                    <option value="0">Admin</option>
                    <option value="1">User</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection