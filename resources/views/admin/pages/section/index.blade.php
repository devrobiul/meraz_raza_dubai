@extends('admin.layout.app')
@section('title')
Section {{ ucfirst($type) }}
@endsection


@section('content')
    <div class="row gy-4">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header border-bottom">
                    <h6 class="text-xl mb-0">Add New {{ ucfirst($type) }} Feature</h6>
                </div>
                <div class="card-body p-24">
                    <form action="{{ route('admin.section.store', $type) }}" method="post" class="d-flex flex-column"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class="form-label">{{ ucfirst($type) }} feature title</label>
                                <input type="text" name="title" class="form-control form-control-sm"
                                    id="{{ $type }}_name" placeholder="{{ ucfirst($type) }} title"
                                    value="{{ old('name') }}">
                                @error('name')
                                    <span class="text-danger error-message"
                                        id="error-{{ $type }}">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">{{ ucfirst($type) }}feature Button</label>
                                <input type="text" name="button" class="form-control form-control-sm"
                                    id="{{ $type }}_name" placeholder="{{ ucfirst($type) }} button"
                                    value="{{ old('button') }}">
                                @error('button')
                                    <span class="text-danger error-message"
                                        id="error-{{ $type }}">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">{{ ucfirst($type) }} feature Button link</label>
                                <input type="text" name="url" class="form-control form-control-sm"
                                    id="{{ $type }}url" placeholder="{{ ucfirst($type) }} url"
                                    value="{{ old('url') }}">
                                @error('url')
                                    <span class="text-danger error-message"
                                        id="error-{{ $type }}">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">{{ ucfirst($type) }} feature description</label>
                                <textarea name="description" class="form-control" id="description" cols="3" rows="3"></textarea>
                                @error('url')
                                    <span class="text-danger error-message"
                                        id="error-{{ $type }}">{{ $message }}</span>
                                @enderror
                            </div>
                        <div class="col-md-12 mb-3">
                                <label class="form-label">{{ ucfirst($type) }} feature photo</label>
                                <input type="file" name="image" class="form-control form-control-sm"
                                    id="{{ $type }}image" placeholder="{{ ucfirst($type) }} image"
                                    value="{{ old('image') }}" accept="image">
                                @error('image')
                                    <span class="text-danger error-message"
                                        id="error-{{ $type }}">{{ $message }}</span>
                                @enderror
                            </div>
                           
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <div class="btn-box">
                                <button class="btn btn-md btn-primary">
                                    {{ 'Create ' . ucfirst($type) }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Sidebar Start -->
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h6 class="text-xl mb-0"> All {{ ucfirst($type) }}</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table bordered-table mb-0 table-bordered" id="dataTable" data-page-length='10'>
                            <thead>
                                <tr>
                                    <th scope="col">Sl</th>
                                    <th scope="col">Photo</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Section</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sections as $section)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>
                                            @if ($section->image)
                                                <img width="20px" src="{{ asset($section->image) }}" alt="Thumbnail">
                                            @else
                                                <i class="ri-image-line" style="font-size:20px;"></i>
                                            @endif

                                        </td>
                                        <td>{{ $section->title }}</td>
                                        <td>{{ ucfirst($section->type )}} section</td>

                                        <td class="text-center">
                                            <div class="d-flex align-items-center gap-10 justify-content-center">
                                            
                                                <a href="{{ route('admin.section.edit', [$type, $section->id]) }}"
                                                    class="btn btn-success btn-sm">
                                                    <i class="ri-edit-2-line text-light"></i>
                                                </a>

                                            
                                                <form
                                                    action="{{ route('admin.section.destroy', ['id' => $section->id, 'type' => $type]) }}"
                                                    method="POST" style="display:inline;"
                                                    onsubmit="return confirmDelete(event);">
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
@endsection


