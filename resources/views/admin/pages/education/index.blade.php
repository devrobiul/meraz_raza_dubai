@extends('admin.layout.app')
@section('title')
Education
@endsection

@section('content')
<div class="row gy-4">
    <!-- Add / Edit Education -->
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header border-bottom">
                <h6 class="text-xl mb-0">
                    {{ isset($education) ? 'Edit Education' : 'Add New Education' }}
                </h6>
            </div>
            <div class="card-body p-24">
                <form action="{{ isset($education) ? route('admin.education.update', $education->id) : route('admin.education.store') }}" 
                      method="post" class="d-flex flex-column">
                    @csrf
                    @if(isset($education))
                        @method('PUT')
                    @endif

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Degree / Title</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                   placeholder="e.g., B.Sc in Computer Science"
                                   value="{{ old('title', $education->title ?? '') }}" required>
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-12 mb-3">
                            <label class="form-label">Organization / University</label>
                            <input type="text" name="org" class="form-control @error('org') is-invalid @enderror"
                                   placeholder="e.g., Harvard University"
                                   value="{{ old('org', $education->org ?? '') }}" required>
                            @error('org')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-12 mb-3">
                            <label class="form-label">Session / Year</label>
                            <input type="text" name="session" class="form-control @error('session') is-invalid @enderror"
                                   placeholder="e.g., 2018-2022"
                                   value="{{ old('session', $education->session ?? '') }}" required>
                            @error('session')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-12 mb-3">
                            <label class="form-label">GPA / Result</label>
                            <input type="text" name="gpa" class="form-control @error('gpa') is-invalid @enderror"
                                   placeholder="e.g., 3.75/4.0"
                                   value="{{ old('gpa', $education->gpa ?? '') }}">
                            @error('gpa')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-12 mb-3">
                            <label class="form-label">Department / Field</label>
                            <input type="text" name="department" class="form-control @error('department') is-invalid @enderror"
                                   placeholder="e.g., Computer Science"
                                   value="{{ old('department', $education->department ?? '') }}">
                            @error('department')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12 d-flex justify-content-end">
                        <button class="btn btn-sm btn-primary">
                            {{ isset($education) ? 'Update Education' : 'Create Education' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Education List Table -->
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h6 class="text-xl mb-0">All Education Records</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered mb-0" id="dataTable" data-page-length="10">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Degree / Title</th>
                                <th>Organization</th>
                                <th>Session</th>
                                <th>GPA</th>
                                <th>Department</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($educations as $edu)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $edu->title }}</td>
                                    <td>{{ $edu->org }}</td>
                                    <td>{{ $edu->session }}</td>
                                    <td>{{ $edu->gpa }}</td>
                                    <td>{{ $edu->department }}</td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{ route('admin.education.edit', $edu->id) }}" class="btn btn-success btn-sm">
                                                <i class="ri-edit-2-line text-light"></i>
                                            </a>

                                            <form action="{{ route('admin.education.destroy', $edu->id) }}" method="POST" onsubmit="return confirmDelete(event);">
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
                    @if ($educations->isEmpty())
                        <p class="text-center mt-3">No education records found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
