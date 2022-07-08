@extends('admin.layouts.app')

@section('content')

<div class="row">
    <div class="col-8">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title mb-4">Change Password</h4>

                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                <form action="{{ route('admin.update-password', auth()->id()) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row mb-3">
                        <label for="old_password" class="col-sm-2 col-form-label">Old Password</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="password" placeholder="Old Password" name="old_password">
                        </div>
                    </div>
                    <!-- end row -->
                    <div class="row mb-3">
                        <label for="new_password" class="col-sm-2 col-form-label">New Password</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="password" placeholder="New Password" name="new_password">
                        </div>
                    </div>
                    <!-- end row -->
                    <div class="row mb-3">
                        <label for="password_confirmation" class="col-sm-2 col-form-label">Confirm Password</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="password" placeholder="Confirm Password"
                                name="password_confirmation">
                        </div>
                    </div>
                    <!-- end row -->
                    <button type="submit" class="btn btn-info waves-effect waves-light mt-2">
                        Update Password
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