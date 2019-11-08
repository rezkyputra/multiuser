@extends('user.layouts.app')

@section('content')
<div class="col-md-9 mx-auto my-3 border bg-light">  
    <h4 class="my-2 text-primary"> <b>PROFILE</b></h4>
    <hr>
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}    
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="container my-2">
        <div class="row">        
            <div class="col-md-3">
                <img class="rounded rounded-circle mr-2 border" src="{{ asset('img/'.$profile->image) }}" alt="" style="width: 150px; height: 150px;">
            </div>
            <div class="col-md-8">
            <h2 class="text-primary"><b>Personal Details</b></h2>        
                <table style="width:100%; font-size: 18px;" class="text-secondary">
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
                        <td>Address</td>
                        <td> : </td>
                        <td> {{$profile->profile->address}} </td>                
                    </tr>
                    @else
                    <tr>
                        <td colspan="3" class="text-danger">
                        <button type="button" class="btn btn-primary btn-sm my-2" data-toggle="modal" data-target="#Tambah">
                            <i class="fas fa-plus"></i> Tambah Data
                        </button>
                        </td>
                    </tr>
                    @endif            
                </table>            
            </div> 
        </div>    
            @include('user.profile.create')
            @if(!empty($profile->profile))
                <a href="/profile/{{$profile->id}}/edit" class="btn btn-primary btn-lg my-1 rounded-circle"> <i class="fas fa-edit"></i></a>
            @endif                  
        <hr/> 
    </div>
</div>
@endsection