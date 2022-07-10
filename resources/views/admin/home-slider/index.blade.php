@extends('admin.layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Home Slider List</h4>

                <div class="table-responsive mt-4">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                <th>Video URL</th>
                                <th width="200">Status</th>
                                <th colspan="2" width="100">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($homeSliders as $homeSlider)
                            <tr>
                                <th scope="row">{{ $homeSlider->id }}</th>
                                <td>{{ $homeSlider->title }}</td>
                                <td>
                                    <a href="{{ $homeSlider->video_url }}" target="__blank">
                                        {{ $homeSlider->video_url }}
                                    </a>
                                </td>
                                <td>
                                    <form id="update-status-{{ $homeSlider->id }}"
                                        action="{{ route('admin.update-home-slider-status', $homeSlider->id) }}"
                                        method="POST">
                                        @method('PUT')
                                        @csrf
                                        <button type="submit"
                                            class="bg-transparent border-0 {{ $homeSlider->getStatusColor() }}">
                                            {{ $homeSlider->getStatus() }}
                                        </button>
                                    </form>
                                </td>
                                <td colspan="2">
                                    <a href="{{ route('admin.edit-home-slider', $homeSlider->id) }}" class="me-1">
                                        <i class="ri-edit-2-line text-primary" style="font-size: 20px"></i>
                                    </a>
                                    <a href="javascript:void()"
                                        onclick="confirm('Are you sure want to delete?'); document.getElementById('delete-{{ $homeSlider->id }}').submit();">
                                        <i class="ri-delete-bin-2-line text-danger" style="font-size: 20px"></i>
                                    </a>
                                    <form id="delete-{{ $homeSlider->id }}"
                                        action="{{ route('admin.delete-home-slider', $homeSlider->id) }}" method="POST">
                                        @method('DELETE') @csrf
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7">Data Not Found.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <!-- Pagination -->
                    <div class="mt-4">
                        {{ $homeSliders->appends(request()->query())->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
    function loadImage(e) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('preview-image').src = e.target.result;
        }
        reader.readAsDataURL(e.target.files[0]);
    }
</script>
@endsection