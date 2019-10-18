@extends('admin.layouts.app')

@section('content')
<div class="col-md-6 mx-auto my-3">  
    <h4 class="my-2 text-primary">Add Data</h4>
    <hr>
        <div class="container">
            <form action="/admin/user" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username" required>
                </div>
                    @if ($errors->has('username'))
                        <span class="help-block">
                            <p class="text-danger" >{{ $errors->first('username') }}</p>
                        </span>
                    @endif  
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="password" required>
                </div>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <p class="text-danger" >{{ $errors->first('password') }}</p>
                        </span>
                    @endif
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                </div>
                    @if ($errors->has('username'))
                        <span class="help-block">
                            <p class="text-danger" >{{ $errors->first('username') }}</p>
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
                    <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection