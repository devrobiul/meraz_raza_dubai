@extends('admin.layout.app')
@section('title')
    Edit {{ $post->title }}
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5 class="card-title mb-0">Edit {{ ucfirst($post->type) }}</h5>
                    <a href="{{ url()->previous() }}" class="btn btn-sm btn-success"><i class="fa fa-minus"></i> Go Back</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row g-3">
    
                                  <div class="col-md-4">
                                <label class="form-label">{{ ucfirst($post->type) }} Title</label>
                                <input type="text" name="title" class="form-control"
                                    placeholder="{{ ucfirst($post->type) }} title" value="{{ old('title', $post->title) }}">

                                @error('title')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
              

                            @includeWhen(in_array($post->type, ['article', 'portfolio']),
                                'admin.pages.post.components.article')

                            @includeWhen($post->type === 'award', 'admin.pages.post.components.award')
                            @includeWhen($post->type === 'service', 'admin.pages.post.components.icon')
                        @includeWhen($post->type === 'review', 'admin.pages.post.components.review')
                            <div class="col-md-3">
                                <label class="form-label">Thumbnail Image</label>
                                <input type="file" name="image" class="form-control" accept="image/*"
                                    id="thumbnailInput">
                                @error('image')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-2">
                                <label class="form-label">Thumbnail Preview</label> <br>
                                <img id="thumbnailPreview" src="{{ asset($post->image) }}" class="img-thumbnail mt-2"
                                    style="display:block; width:100%;">
                            </div>
                            @includeWhen($post->type === 'service', 'admin.pages.post.components.service')
                            @includeWhen($post->type === 'portfolio', 'admin.pages.post.components.portfolio')
                         @if (!in_array($post->type, ['portfolio','review','award']))
                                <div class="col-md-12">
                                    <label class="form-label">{{ ucfirst($post->type) }} Description</label>
                                    <textarea name="description" id="description" class="form-control" rows="2"
                                        placeholder=" {{ ucfirst($post->type) }} Description ">{{ old('description', $post->description) }}</textarea>
                                    @error('description')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror

                                </div>

                                <div class="row">
                                    <div class="col-md-12 mt-3">
                                        <label class="form-label">{{ ucfirst($post->type) }} Meta Keyword</label>
                                        <input type="text" name="meta_keyword" class="form-control"
                                            placeholder="keyword1, keyword2"
                                            value="{{ old('meta_keyword', $meta['meta_keyword']) }}">
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <label class="form-label">{{ ucfirst($post->type) }} Meta Description</label>
                                        <textarea name="meta_description" class="form-control" rows="2"
                                            placeholder="{{ ucfirst($post->type) }} Meta description">{{ old('meta_description', $meta['meta_description']) }}</textarea>
                                    </div>

                                </div>
                            @endif
                        </div>



                        <div class="mt-4 text-center">
                            <button type="submit" class="btn btn-sm btn-primary">
                                <i class="fas fa-check"></i> Edit {{ ucfirst($post->type) }}
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('admin/tinymce/tinymce.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#thumbnailInput').on('change', function(event) {
                var input = event.target;
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#thumbnailPreview').attr('src', e.target.result).show();
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            tinymce.init({
                selector: 'textarea#description,#short_description',
                height: 400,
                width: '100%',
                plugins: [
                    'advlist', 'autolink', 'link', 'image', 'lists', 'charmap', 'preview', 'anchor',
                    'pagebreak',
                    'searchreplace', 'wordcount', 'visualblocks', 'code', 'fullscreen',
                    'insertdatetime', 'media',
                    'table', 'emoticons', 'template', 'codesample'
                ],
                toolbar: 'undo redo | styles | bold italic underline | alignleft aligncenter alignright alignjustify |' +
                    'bullist numlist outdent indent | link image | print preview media fullscreen | ' +
                    'forecolor backcolor emoticons',
                menu: {
                    favs: {
                        title: 'Menu',
                        items: 'code visualaid | searchreplace | emoticons'
                    }
                },
                menubar: 'favs file edit view insert format tools table',
                content_style: 'body{font-family:Helvetica,Arial,sans-serif; font-size:16px}'
            });
        });
    </script>
@endpush
