@extends('admin.layouts.app')

@section('content')

<div class="row">
    <div class="col-8">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title mb-4">Create Home Slider</h4>

                <form action="{{ route('admin.store-home-slider') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-3">
                        <label for="title" class="col-sm-2 col-form-label">
                            Title <span class="text-danger">*</span>
                        </label>
                        <div class="col-sm-10">
                            <input class="form-control @error('title') is-invalid @enderror" type="text"
                                placeholder="Title" id="title" name="title" value="{{ old('title') }}">
                            @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <!-- end row -->
                    <div class="row mb-3">
                        <label for="short_title" class="col-sm-2 col-form-label">
                            Short Title <span class="text-danger">*</span>
                        </label>
                        <div class="col-sm-10">
                            <input class="form-control @error('short_title') is-invalid @enderror" type="text"
                                placeholder="Short Title" id="short-title" name="short_title"
                                value="{{ old('short_title') }}">
                            @error('short_title')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <!-- end row -->
                    <div class="row mb-3">
                        <label for="video_url" class="col-sm-2 col-form-label">
                            Video URL <span class="text-danger">*</span>
                        </label>
                        <div class="col-sm-10">
                            <input class="form-control @error('video_url') is-invalid @enderror" type="text"
                                placeholder="Video URL" id="video-url" name="video_url" value="{{ old('video_url') }}">
                            @error('video_url')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <!-- end row -->
                    <div class="row mb-3">
                        <label for="image" class="col-sm-2 col-form-label">
                            Slider Image <span class="text-danger">*</span>
                        </label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
                                    name="image" onchange="loadImage(event, 'show-image')">
                                @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <img id="show-image" class="rounded avatar-xl" src="{{ asset('images/no-image.jpg') }}"
                                alt="Card image cap">
                        </div>
                    </div>
                    <!-- end row -->
                    <button type="submit" class="btn btn-info waves-effect waves-light mt-2">
                        Create
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