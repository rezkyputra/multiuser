@extends('user.layouts.app')

@section('content')
<div class="col-md-9 mx-auto my-3 border bg-light">  
    <h4 class="my-2 text-primary">Detail Data</h4>
    <hr>
    <div class="container my-2">
        <div class="row">        
            <div class="col-3">
                <img class="rounded rounded-circle mr-2 border" src="{{ asset('img/'.$profile->image) }}" alt="" style="width: 150px; height: 150px;">
            </div>
            <div class="col-6">
            <b><h2 class="text-primary">Personal Details</h2></b>        
                <table>
                    <tr>
                        <td>Username</td>
                        <td> : </td>
                        <td>{{$profile->username}}</td>
                    </tr>
                    <tr>
                        <td>Email</td>                    
                        <td> : </td>
                        <td>{{$profile->email}}</td>
                    </tr>
                    <tr>
                        <td>Level</td>
                        <td> : </td>
                        <td> @if ($profile->role == 0)
                                Admin
                            @else
                                User
                            @endif 
                        </td>                
                    </tr>
                    @if(!empty($profile->profile))
                    <tr>
                        <td>Fullname</td>
                        <td> : </td>
                        <td>{{$profile->profile->fullname}}</td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td> : </td>
                        <td> @if ($profile->profile->gender == 'L')
                                Male
                            @else
                                Female
                            @endif 
                        </td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td> : </td>
                        <td> {{$profile->profile->no_telp}} </td>
                    </tr>
                    <tr>
                        <td>Expected Sallary</td>
                        <td> : </td>
                        <td> {{$profile->profile->expected_sallary}} </td>                
                    </tr>
                    <tr>
                        <td>Addres</td>
                        <td> : </td>
                        <td> {{$profile->profile->address}} </td>                
                    </tr>
                    @else
                    <tr>
                        <td colspan="3" class="text-danger">
                            <b>Profile belum diisi silahkan di update</b>
                        </td>
                    </tr>
                    @endif            
                </table>                
            </div>
        </div>
        <a href="/profile/{{$profile->id}}/edit" class="btn btn-primary my-2">Update</a>
    </div>
</div>
@endsection