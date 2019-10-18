@extends('admin.layouts.app')

@section('content')
    <div class="col-md-6 mx-auto my-3">
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
            <form action="/admin/setting/ubah" method="POST">
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
                    <input type="password" class="form-control" name="current-password" id="password" placeholder="password" required>
                </div>
                @if ($errors->has('current-password'))
                        <span class="help-block">
                            <p class="text-danger" >{{ $errors->first('current-password') }}</p>
                        </span>
                @endif
                <div class="form-group {{ $errors->has('new-password') ? ' has-error' : '' }}">
                    <label for="password1">Password Baru</label>
                    <input type="password" class="form-control" name="new-password" id="password1" placeholder="Password Baru" required>
                </div>
                    @if ($errors->has('new-password'))
                        <span class="help-block">
                            <p class="text-danger" >{{ $errors->first('new-password') }}</p>
                        </span>
                    @endif
                <div class="form-group">
                    <label for="password2">Konfirmasi Password</label>
                    <input type="password" class="form-control" name="new-password_confirmation" id="password2" placeholder="Konfirmasi Password Baru" required>
                </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
<!-- <div class="row justify-content-center">  
    <div class="col-md-8 col-md-offset-2">
        <div class="row">
            <h2>Edit Page</h2>
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
            <form action="/admin/setting/ubah" method="POST">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" id="username" aria-describedby="emailHelp" placeholder="Username" autofocus required>
                </div>
                    @if ($errors->has('username'))
                        <span class="help-block">
                            <p class="text-danger" >{{ $errors->first('username') }}</p>
                        </span>
                    @endif
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                </div>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <p class="text-danger" >{{ $errors->first('email') }}</p>
                        </span>
                    @endif
                <div class="form-group {{ $errors->has('current-password') ? ' has-error' : '' }}">
                    <label for="password">Password Lama</label>
                    <input type="password" class="form-control" name="current-password" id="password" placeholder="Password Lama" required>
                </div>
                    @if ($errors->has('current-password'))
                        <span class="help-block">
                            <p class="text-danger" >{{ $errors->first('current-password') }}</p>
                        </span>
                    @endif
                <div class="form-group {{ $errors->has('new-password') ? ' has-error' : '' }}">
                    <label for="password1">Password Baru</label>
                    <input type="password" class="form-control" name="new-password" id="password1" placeholder="Password Baru" required>
                </div>
                    @if ($errors->has('new-password'))
                        <span class="help-block">
                            <p class="text-danger" >{{ $errors->first('new-password') }}</p>
                        </span>
                    @endif
                <div class="form-group">
                    <label for="password2">Konfirmasi Password</label>
                    <input type="password" class="form-control" name="new-password_confirmation" id="password2" placeholder="Konfirmasi Password Baru" required>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div> -->