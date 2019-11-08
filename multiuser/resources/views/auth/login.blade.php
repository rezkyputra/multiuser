<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('css/login.css')}}" rel="stylesheet">
  </head>

  <body class="text-center bg-light">    
    <form class="form-signin bg-success" method="POST" action="{{ route('login') }}">
    {{ csrf_field() }}
      <img class="mb-1" src="{{asset('img/user1.png')}}" alt="" width="70%">
      <h1 class="h3 mb-3 text-light font-weight-normal"> <b>LOGIN</b></h1>
      <hr>      
      @if ($errors->has('username'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">      
        {{ $errors->first('username') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      @endif
      @if ($errors->has('password'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">      
        {{ $errors->first('password') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      @endif      
      <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
      <label for="inputEmail" class="sr-only">Username</label>
      <input type="text" name="username" id="inputEmail" class="form-control my-1" placeholder="Username" value="{{ old('username') }}" required autofocus>
        
      </div>

      <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" name="password" id="inputPassword" class="form-control my-1" placeholder="Password" required>
      </div>
      
      <button class="btn btn-md btn-primary btn-block" type="submit">Sign in</button>
    </form>
  </body>  
  <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
</html>