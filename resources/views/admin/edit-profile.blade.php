@extends('admin.layouts.app')

@section('content')

<div class="row">
    <div class="col-8">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title mb-4">Edit Profile</h4>

                <form action="{{ route('admin.update-profile', $user->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row mb-3">
                        <label for="name" class="col-sm-2 col-form-label">
                            Username <span class="text-danger">*</span>
                        </label>
                        <div class="col-sm-10">
                            <input class="form-control @error('name') is-invalid @enderror" type="text"
                                placeholder="Username" id="name" name="name" value="{{ old('name') ?? $user->name }}">
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <!-- end row -->
                    <div class="row mb-3">
                        <label for="email" class="col-sm-2 col-form-label">
                            Email <span class="text-danger">*</span>
                        </label>
                        <div class="col-sm-10">
                            <input class="form-control @error('email') is-invalid @enderror" type="text"
                                placeholder="Email" id="email" name="email" value="{{ old('email') ?? $user->email }}">
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <!-- end row -->
                    <div class="row mb-3">
                        <label for="profile" class="col-sm-2 col-form-label">Profile Image</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="file" class="form-control @error('profile') is-invalid @enderror"
                                    id="profile" name="profile" onchange="loadImage(event, 'show-image')">
                                @error('profile')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <img id="show-image" class="rounded avatar-xl" src="{{ asset($user->showProfile()) }}"
                                alt="Card image cap">
                        </div>
                    </div>
                    <!-- end row -->
                    <button type="submit" class="btn btn-info waves-effect waves-light mt-2">
                        Update
                    </button>
                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div>

@endsection

@section('script')
<script src="/js/load-image.js"></script>
@endsection