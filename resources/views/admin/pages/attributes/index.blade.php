@extends('admin.layout.app')
@section('title')
All {{ ucfirst(str_replace('_',' ',$type))}}
@endsection


@section('content')
    <div class="row gy-4">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header border-bottom">
                    <h6 class="text-xl mb-0">Add New {{ ucfirst(str_replace('_',' ',$type)) }}</h6>
                </div>
                <div class="card-body p-24">
                    <form action="{{ route('admin.attribute.store', $type) }}" method="post" class="d-flex flex-column"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class="form-label">{{ ucfirst(str_replace('_',' ',$type)) }} name</label>
                                <input type="text" name="name" class="form-control form-control-sm @error('name')is-invalid
                                    
                                @enderror"
                                    id="{{ $type }}_name" placeholder="{{ ucfirst(str_replace('_',' ',$type)) }} name"
                                    value="{{ old('name') }}">
                                @error('name')
                                    <span class="text-danger error-message"
                                        id="error-{{ $type }}">{{ $message }}</span>
                                @enderror
                            </div>

                           @includeWhen(in_array($type, ['make', 'slider']), 'admin.pages.attributes.includes.make')
                            @includeWhen($type === 'model', 'admin.pages.attributes.includes.make-parent')
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <div class="btn-box">
                                <button class="btn btn-sm btn-primary">
                                    {{ 'Create ' . ucfirst(str_replace('_',' ',$type)) }}
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
                    <h6 class="text-xl mb-0"> All {{ ucfirst(str_replace('_',' ',$type))}}</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table bordered-table mb-0 table-bordered" id="dataTable" data-page-length='10'>
                            <thead>
                                <tr>
                                    <th scope="col">Sl</th>
                                    <th scope="col">Photo</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Slug</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($attributes as $attr)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>
                                            @if ($attr->image)
                                                <img width="20px" src="{{ asset($attr->image) }}" alt="Thumbnail">
                                            @else
                                                <i class="ri-image-line" style="font-size:20px;"></i>
                                            @endif

                                        </td>
                                        <td>{{ $attr->name }}</td>
                                        <td>{{ $attr->slug }}</td>
                                        <td class="text-center">
                                            <div class="d-flex align-items-center gap-10 justify-content-center">
                                            
                                                <a href="{{ route('admin.attribute.edit', [$type, $attr->id]) }}"
                                                    class="btn btn-success btn-sm">
                                                    <i class="ri-edit-2-line text-light"></i>
                                                </a>

                                            
                                                <form
                                                    action="{{ route('admin.attribute.destroy', ['id' => $attr->id, 'type' => $type]) }}"
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


