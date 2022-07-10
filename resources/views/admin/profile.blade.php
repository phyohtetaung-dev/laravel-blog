@extends('admin.layouts.app')

@section('content')

<div class="col-lg-4">
    <div class="card">
        <center class="mt-5 mb-5">
            <img class="rounded-circle avatar-xl" src="{{ asset($user->showProfile()) }}" alt="Card image cap">
        </center>
        <div class="card-body">
            <h4 class="card-title">Name: {{ $user->name }}</h4>
            <hr>
            <h4 class="card-title">Email: {{ $user->email }}</h4>
            <hr>
            <h4 class="card-title">Joined at: {{ $user->created_at->diffForHumans() }}</h4>
            <hr>
            <a href="{{ route('admin.edit-profile') }}" class="btn btn-info waves-effect waves-light">
                Edit
            </a>
        </div>
    </div>
</div>

@endsection