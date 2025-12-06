@extends('admin.layout.app')
@section('title')
    All {{ ucfirst($type) }}
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0"> All {{ ucfirst($type) }}</h5>
                    <div class="d-flex gap-2">
                        <a href="{{ route('admin.post.create', $type) }}" class="btn btn-sm btn-primary"><i class="fa fa-plus"
                                aria-hidden="true"></i> Add {{ ucfirst($type) }}</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="dataTable" data-page-length='10'>
                            <thead>
                                <tr>
                                    <th>#SL</th>
                                    <th>{{ ucfirst($type) }} photo</th>
                                  <th class="{{ $type === 'review' ? 'w-20' : '' }}">
                                 {{ ucfirst($type) }} title</th>
                                    @if ($type === 'article')
                                        <th>{{ ucfirst($type) }} category</th>

                                        <th>{{ ucfirst($type) }} views</th>
                                    @endif
                                    @if ($type === 'review')
                                        <th>{{ ucfirst($type) }} name</th>

                                        <th>{{ ucfirst($type) }} deg</th>
                                    @endif
                                    <th>Created/time</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                        <td>
                                            <span class="text-primary">{{ $loop->index + 1 }}</span>
                                        </td>


                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset($post->image ?? 'admin/img/user.png') }}" alt="POST"
                                                    width="120" height="50" class="">

                                            </div>
                                        </td>
                                        <td  @if ($type=='review')
                                    style="width: 20%"
                                        
                                    @endif>{{ $post->title }}</td>
                                        @if ($type === 'article')
                                            <td>{{ $post->category->name }}</td>

                                            <td>{{ $post->views }}</td>
                                        @endif
                                        @if ($type === 'review')
                                        @php
                                            $meta = json_decode($post->meta,true);
                                       @endphp
                                            <td>{{ $meta['r_name']??''}}</td>
                                            <td>{{ $meta['r_deg']??''}}</td>
                                        @endif
                                        <td>{{ $post->created_at->format('d, M Y') }}</td>


                                        <td class="text-center action-icons">
                                            <a href="" class="btn btn-sm btn-outline-dark" title="Edit">
                                                <i class="ri-eye-line"></i> View
                                            </a>
                                            <a href="{{ route('admin.post.edit', $post->id) }}"
                                                class="btn btn-sm btn-outline-primary" title="Edit">
                                                <i class="ri-edit-line"></i> Edit
                                            </a>
                                            <form action="{{ route('admin.post.destroy', $post->id) }}" method="POST"
                                                style="display:inline;" onsubmit="return confirmDelete(event);">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                                    <i class="ri-delete-bin-line"></i> Delete
                                                </button>
                                            </form>


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
