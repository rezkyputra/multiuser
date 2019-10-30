@extends('user.layouts.app')
@section('content')
    <h1 class="mt-4">Selamat Datang <b class="text-primary">{{ Auth::user()->username }}</b></h1>
@endsection