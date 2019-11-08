@extends('user.layouts.app')

@section('content')
<div class="col-md-6 mx-auto my-3 border bg-light">  
    <h4 class="my-2 text-primary">Update Data</h4>
    <hr>
    <div class="container">
        <form action="/profile/{{$profile->id}}" enctype="multipart/form-data" method="POST">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" value="{{$profile->username}}" class="form-control" name="username" id="username" placeholder="Username" required>
            </div>
            @if ($errors->has('username'))
                <p class="text-danger" >{{ $errors->first('username') }}</p>
            @endif
            <div class="form-group">
                <label for="fullname">Fullname</label>
                <input type="text" value="{{$profile->profile->fullname}}" class="form-control" name="fullname" id="fullname" placeholder="fullname" required>
            </div>
            @if ($errors->has('fullname'))
                <p class="text-danger" >{{ $errors->first('fullname') }}</p>
            @endif
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" value="{{$profile->email}}" class="form-control" name="email" id="email" placeholder="Email" required>
            </div>
            @if ($errors->has('email'))
                <p class="text-danger" >{{ $errors->first('email') }}</p>                
            @endif
            <div class="form-group">
                <label for="gender">Gender</label>
                <select class="form-control" name="gender" id="gender" required>
                    @if ($profile->profile->gender == "L")
                        <option value="">-</option>
                        <option value="L" selected>Laki-laki</option>
                        <option value="P">Perempuan</option>                          
                    @else
                        <option value="">-</option>
                        <option value="L">Laki-laki</option>
                        <option value="P" selected>Perempuan</option>
                    @endif
                </select>
            </div>                      
            @if ($errors->has('gender'))
                <p class="text-danger" >{{ $errors->first('gender') }}</p>                
            @endif
            <div class="form-group">
                <label for="no_telp">Phone</label>
                <input type="number" value="{{$profile->profile->no_telp}}" class="form-control" name="no_telp" id="no_telp" required>
            </div>
            @if ($errors->has('no_telp'))
                <p class="text-danger" >{{ $errors->first('no_telp') }}</p>
            @endif
            <div class="form-group">
                <label for="expected_sallary">Expected Sallary</label>
                <input type="number"value="{{$profile->profile->expected_sallary}}" class="form-control" name="expected_sallary" id="expected_sallary" required>
            </div>
            @if ($errors->has('expected_sallary'))
                <p class="text-danger" >{{ $errors->first('expected_sallary') }}</p>
            @endif
            <div class="form-group">
                <label for="address">Address</label>
                <textarea class="form-control" id="address" rows="3" name="address">{{$profile->profile->address}}</textarea>
            </div>
            @if ($errors->has('address'))
                <p class="text-danger" >{{ $errors->first('address') }}</p>
            @endif
            <div class="form-group">
                <label>Current Image</label>
                <img src="{{ url('img/'.$profile->image) }}" class="border" style="width: 150px; height: 150px;">
            </div>
            <div class="form-group">
                <label for="image">New Image</label>
                <input type="file" class="form-control-file" id="email" name="image">
            </div>
            @if ($errors->has('image'))
                <p class="text-danger" >{{ $errors->first('email') }}</p>                
            @endif
            <hr>
            <button type="submit" class="btn btn-primary mb-2">Update</button>
        </form>
    </div>
</div>
@endsection