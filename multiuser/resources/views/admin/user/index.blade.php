@extends('admin.layouts.app')
@section('content')    
<div class="col-md-9 mx-auto">
<h4 class="mt-2 text-primary">Data User</h4>
<hr>
    <div class="container">        
        <a href="/admin/user/create" class="btn btn-info btn-sm my-3">Tambah</a>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>                        
                        <th scope="col">#</th>
                        <th scope="col">User</th>
                        <th scope="col">Email</th>
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
                            <!-- <a href="/admin/profile/{{ $value->id }}" class="btn btn-info btn-xs">Show</a> -->
                            <a href="/admin/user/{{ $value->id }}/edit" class="btn btn-success btn-sm mb-2">Update</a>
                            <form action="/admin/user/{{ $value->id }} " method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                                <input type="submit" value="Delete" class="btn btn-danger btn-sm">
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