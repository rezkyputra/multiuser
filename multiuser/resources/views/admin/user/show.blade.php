@extends('admin.layouts.app')

@section('content')
<div class="col-md-9 mx-auto my-3 border bg-light">  
    <h4 class="my-2 text-primary">Detail Data</h4>
    <hr>
    <div class="container my-2">
        <div class="row">        
            <div class="col-3">
                <img class="rounded mr-2 border" src="{{ asset('img/'.$user->image) }}" alt="" style="width: 150px; height: 150px;">
            </div>
            <div class="col-9">
            <h3 class="text-primary"><b>Personal Details</b></h3>        
                <table>                
                <tr>
                        <td>Username</td>
                        <td> : </td>
                        <td>{{$user->username}}</td>
                    </tr>
                    <tr>
                        <td>Email</td>                    
                        <td> : </td>
                        <td><a href="#">{{$user->email}}</a></td>
                    </tr>
                    <tr>
                        <td>Level</td>
                        <td> : </td>
                        <td> @if ($user->role == 0)
                                Admin
                            @else
                                User
                            @endif 
                        </td>                
                    </tr>
                    @if(!empty($user->profile))
                    <tr>
                        <td>Fullname</td>
                        <td> : </td>
                        <td>{{$user->profile->fullname}}</td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td> : </td>
                        <td> @if ($user->profile->gender == 'L')
                                Male
                            @else
                                Female
                            @endif 
                        </td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td> : </td>
                        <td> {{$user->profile->no_telp}} </td>
                    </tr>
                    <tr>
                        <td>Expected Sallary</td>
                        <td> : </td>
                        <td> {{$user->profile->expected_sallary}} </td>                
                    </tr>
                    <tr>
                        <td>Addres</td>
                        <td> : </td>
                        <td> {{$user->profile->address}} </td>                
                    </tr>
                    @else
                    <tr>
                        <td colspan="3"><h5 class="text-danger">Profile Belum di isi oleh user</h5></td>
                    </tr>
                    @endif                 
                </table>
            </div>
        </div>
        <a href="/admin/user" class="btn btn-danger">Back</a>
    </div>
</div>
@endsection