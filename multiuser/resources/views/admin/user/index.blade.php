@extends('admin.layouts.app')
@section('content')    
<div class="col-md-9 mt-2 mx-auto border bg-light">
<h4 class="mt-4 text-primary">Data User</h4>
<hr>
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}    
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif   
        <a href="/admin/user/create" class="btn btn-info my-3">Add User</a>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>                        
                        <th scope="col">#</th>
                        <th scope="col">User</th>
                        <th scope="col">Email</th>
                        <th scope="col">Level</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($users as $key => $value)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $value -> username }}</td>
                        <td>{{ $value -> email }}</td>
                        <td>
                        @if ($value -> role_id == 0)
                            Admin                          
                        @else
                            User
                        @endif
                        </td>
                        <td>
                            <img src="{{ url('img/'.$value -> image) }}" alt="" style="width: 150px; height: 150px;" >
                        </td>
                        <td>
                            <a href="/admin/user/{{ $value->id }}" class="btn btn-info btn-sm mb-1">Show</a>
                            <a href="/admin/user/{{ $value->id }}/edit" class="btn btn-success btn-sm mb-1">Update</a>
                            <form action="/admin/user/{{ $value->id }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                                <input type="submit" value="Delete" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete?')">
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>        
@endsection