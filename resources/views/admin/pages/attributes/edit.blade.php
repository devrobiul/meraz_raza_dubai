@extends('admin.layout.app')
@section('title')
Edit {{ ucfirst($type) }}
@endsection
@section('content')
    <div class="row gy-4">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header border-bottom">
                    <h6 class="text-xl mb-0">Edit {{ ucfirst($type) }}</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.attribute.update', ['type' => $type, 'id' => $attribute->id]) }}"
                        method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-12">
                                <label class="form-label">{{ ucfirst($type) }} Name</label>
                                <input type="text" name="name" class="form-control form-control-sm"
                                    id="{{ $type }}_name" value="{{ $attribute->name }}"
                                    placeholder="{{ ucfirst($type) }} name">
                                <span class="text-danger error-message" style="color:red"
                                    id="error-{{ $type }}"></span>
                            </div>

                            @includeIf("admin.pages.attributes.includes.$type")


                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <div class="btn-box">
                                <button class="btn btn-md btn-primary">
                                    {{ 'Edit ' . ucfirst($type) }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Sidebar Start -->

    </div>
@endsection
@push('scripts')
    <script>
        document.getElementById('file-upload-name').addEventListener('change', function(event) {
            var fileInput = event.target;
            var fileList = fileInput.files;
            var ul = document.getElementById('uploaded-img-names');

            // Add show-uploaded-img-name class to the ul element if not already added
            ul.classList.add('show-uploaded-img-name');

            // Append each uploaded file name as a list item with Font Awesome and Iconify icons
            for (var i = 0; i < fileList.length; i++) {
                var li = document.createElement('li');
                li.classList.add('uploaded-image-name-list', 'text-primary-600', 'fw-semibold', 'd-flex',
                    'align-items-center', 'gap-2');

                // Create the Link Iconify icon element
                var iconifyIcon = document.createElement('iconify-icon');
                iconifyIcon.setAttribute('icon', 'ph:link-break-light');
                iconifyIcon.classList.add('text-xl', 'text-secondary-light');

                // Create the Cross Iconify icon element
                var crossIconifyIcon = document.createElement('iconify-icon');
                crossIconifyIcon.setAttribute('icon', 'radix-icons:cross-2');
                crossIconifyIcon.classList.add('remove-image', 'text-xl', 'text-secondary-light',
                    'text-hover-danger-600');

                // Add event listener to remove the image on click
                crossIconifyIcon.addEventListener('click', (function(liToRemove) {
                    return function() {
                        ul.removeChild(liToRemove); // Remove the corresponding list item
                    };
                })(li)); // Pass the current list item as a parameter to the closure

                // Append both icons to the list item
                li.appendChild(iconifyIcon);

                // Append the file name text to the list item
                li.appendChild(document.createTextNode(' ' + fileList[i].name));

                li.appendChild(crossIconifyIcon);

                // Append the list item to the unordered list
                ul.appendChild(li);
            }
        });
    </script>
@endpush
