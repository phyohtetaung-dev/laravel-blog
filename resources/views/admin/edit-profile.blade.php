@extends('admin.layouts.app')

@section('content')

<div class="row">
    <div class="col-8">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title mb-4">Edit Profile</h4>

                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                <form action="{{ route('admin.update-profile', $user->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row mb-3">
                        <label for="name" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" placeholder="Username" id="name" name="name"
                                value="{{ old('name') ?? $user->name }}">
                        </div>
                    </div>
                    <!-- end row -->
                    <div class="row mb-3">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" placeholder="Email" id="email" name="email"
                                value="{{ old('email') ?? $user->email }}">
                        </div>
                    </div>
                    <!-- end row -->
                    <div class="row mb-3">
                        <label for="profile" class="col-sm-2 col-form-label">Profile Image</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="file" class="form-control" id="profile" name="profile"
                                    onchange="loadProfile(event)">
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <img id="preview-profile" class="rounded avatar-xl"
                                src="{{ asset($user->showProfile()) }}" alt="Card image cap">
                        </div>
                    </div>
                    <!-- end row -->
                    <button type="submit" class="btn btn-info waves-effect waves-light mt-2">
                        Update Profile
                    </button>
                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div>

@endsection

@section('script')
<script>
    function loadProfile(e) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('preview-profile').src = e.target.result;
        }
        reader.readAsDataURL(e.target.files[0]);
    }
</script>
@endsection