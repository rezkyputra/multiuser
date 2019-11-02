@extends('user.layouts.app')

@section('content')
    <div class="col-md-6 mx-auto my-3 border bg-light">
    <h4 class="my-2 text-primary">Change Password</h4>
        @if (session('error'))
            <div class="alert alert-danger">
        {{ session('error') }}
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success">
        {{ session('success') }}
            </div>
        @endif
    <hr>
        <div class="container">
            <form action="/ganti/ubah" method="POST">
                {{ csrf_field() }}                
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" value="{{ Auth::user()->username }}" disabled>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" value="{{ Auth::user()->email }}" disabled>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="current-password" id="password" required autofocus>
                </div>
                @if ($errors->has('current-password'))
                        <span class="help-block">
                            <p class="text-danger" >{{ $errors->first('current-password') }}</p>
                        </span>
                @endif
                <div class="form-group {{ $errors->has('new-password') ? ' has-error' : '' }}">
                    <label for="password1">Password Baru</label>
                    <input type="password" class="form-control" name="new-password" id="password1" required>
                </div>
                    @if ($errors->has('new-password'))
                        <span class="help-block">
                            <p class="text-danger" >{{ $errors->first('new-password') }}</p>
                        </span>
                    @endif
                <div class="form-group">
                    <label for="password2">Konfirmasi Password</label>
                    <input type="password" class="form-control" name="new-password_confirmation" id="password2" required>
                </div>
                    <button type="submit" class="btn btn-primary mb-3">Update</button>
            </form>
        </div>
    </div>
@endsection