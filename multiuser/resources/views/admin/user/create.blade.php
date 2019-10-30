@extends('admin.layouts.app')

@section('content')
<div class="col-md-6 mx-auto my-3 border bg-light">  
    <h4 class="my-2 text-primary">Add Data</h4>
    <hr>
        <div class="container">
            <form action="/admin/user" enctype="multipart/form-data" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" value="{{ old('username') }}" class="form-control" name="username" id="username" placeholder="Username" required autofocus>
                </div>
                    @if ($errors->has('username'))
                        <span class="form-text">
                            <p class="text-danger" >{{ $errors->first('username') }}</p>
                        </span>
                    @endif  
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="password" required>
                </div>
                    @if ($errors->has('password'))
                        <span class="form-text">
                            <p class="text-danger" >{{ $errors->first('password') }}</p>
                        </span>
                    @endif
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" value="{{ old('email') }}" class="form-control" name="email" id="email" placeholder="Email" required>
                </div>
                    @if ($errors->has('email'))
                        <span class="form-text">
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
                    @if ($errors->has('role_id'))
                        <span class="form-text">
                            <p class="text-danger" >{{ $errors->first('role_id') }}</p>
                        </span>
                    @endif
                <div class="form-group">
                    <label for="img">Image</label>
                    <input id="img" type="file" name="image" class="form-control-file">
                </div>
                <hr>
                    @if ($errors->has('image'))
                        <span class="form-text">
                            <p class="text-danger" >{{ $errors->first('image') }}</p>
                        </span>
                    @endif
                    <button type="submit" class="btn btn-primary mb-2">Submit</button>
            </form>
        </div>
    </div>
@endsection