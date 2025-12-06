@extends('admin.layout.app')

@section('title')
Gallery
@endsection

@section('content')
<div class="row gy-4">
    <!-- Add / Edit Gallery -->
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header border-bottom">
                <h6 class="text-xl mb-0">
                    {{ isset($gallery) ? 'Edit Gallery' : 'Add New Gallery' }}
                </h6>
            </div>
            <div class="card-body p-24">
                <form action="{{ isset($gallery) ? route('admin.gallery.update', $gallery->id) : route('admin.gallery.store') }}" 
                      method="post" class="d-flex flex-column" enctype="multipart/form-data">
                    @csrf
                    @if(isset($gallery))
                        @method('PUT')
                    @endif

                    <div class="row">
                        <!-- Gallery Title -->
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Gallery Title</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                   placeholder="Enter gallery title"
                                   value="{{ old('title', $gallery->title ?? '') }}" required>
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Gallery Type -->
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Gallery Type</label>
                            <select name="type" id="gallery_type" class="form-control" required>
                                <option value="">Select type</option>
                                <option value="photo" {{ isset($gallery) && $gallery->type=='photo' ? 'selected' : '' }}>Photo</option>
                                <option value="video" {{ isset($gallery) && $gallery->type=='video' ? 'selected' : '' }}>Video</option>
                            </select>
                        </div>

                        <!-- Photo Input -->
                        <div class="col-md-12 mb-3 photo" style="display: none">
                            <label class="form-label">Gallery Photo</label>
                            <input type="file" name="photo" class="form-control">
                            @if(isset($gallery) && $gallery->photo)
                                <img src="{{ asset($gallery->photo) }}" class="img-fluid mt-2" style="max-height:80px;">
                            @endif
                        </div>

                        <!-- Video Input -->
                        <div class="col-md-12 mb-3 video" style="display: none">
                            <label class="form-label">Gallery Video URL</label>
                            <input type="text" name="video" class="form-control" 
                                   value="{{ old('video', $gallery->video ?? '') }}" placeholder="Enter video URL">
                        </div>
                    </div>

                    <div class="col-12 d-flex justify-content-end">
                        <button class="btn btn-sm btn-primary">
                            {{ isset($gallery) ? 'Update Gallery' : 'Create Gallery' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Gallery List Table -->
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h6 class="text-xl mb-0">All Gallery Items</h6>
            </div>
            <div class="card-body">
<div class="table-responsive">
    <table class="table table-bordered mb-0" id="dataTable">
        <thead>
            <tr>
                <th>Sl</th>
                <th>Type</th>
                <th>Title</th>
                <th>Media</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($galleries as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ ucfirst($item->type) }}</td>
                    <td>{{ $item->title }}</td>
                    <td>
                        @if($item->type === 'photo' && $item->photo)
                            <img src="{{ asset($item->photo) }}" style="max-height:80px; border-radius:4px;">
                        @elseif($item->type === 'video' && $item->video)
                            @php
                                // Extract YouTube ID from URL
                                preg_match("/(?:youtube\.com\/watch\?v=|youtu\.be\/)([^\&\?\/]+)/", $item->video, $matches);
                                $youtube_id = $matches[1] ?? null;
                            @endphp
                            @if($youtube_id)
                                <iframe width="200" height="120" 
                                        src="https://www.youtube.com/embed/{{ $youtube_id }}" 
                                        frameborder="0" allowfullscreen></iframe>
                            @else
                                <span class="text-danger">Invalid YouTube URL</span>
                            @endif
                        @else
                            <span class="text-muted">No media</span>
                        @endif
                    </td>
                    <td class="text-center">
                        <div class="d-flex justify-content-center gap-2">
                     
                            <form action="{{ route('admin.gallery.destroy', $item->id) }}" method="POST" onsubmit="return confirmDelete(event);">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="ri-delete-bin-line text-light"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
          
        </tbody>
    </table>
</div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function toggleGalleryFields() {
        var type = $('#gallery_type').val();
        if(type=='photo') {
            $('.photo').show();
            $('.video').hide();
        } else if(type=='video') {
            $('.video').show();
            $('.photo').hide();
        } else {
            $('.photo, .video').hide();
        }
    }

    $(document).ready(function() {
        toggleGalleryFields(); // initial check for edit page
        $('#gallery_type').on('change', toggleGalleryFields);
    });
</script>
@endpush
