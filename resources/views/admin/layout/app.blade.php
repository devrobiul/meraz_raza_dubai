<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.includes.header')
</head>

<body>
  
    @include('admin.includes.sidebar')

    <div class="mobile-sidebar-overlay" id="mobile-sidebar-overlay" role="button" tabindex="0" aria-label="Close sidebar">
    </div>

    <div class="main-content">

        @include('admin.includes.topbar')

        <div class="container-fluid py-4">
            @yield('content')
        </div>
        <footer class="footer">
            <div class="container-fluid">
                <div class="row align-items-center g-3">
                    <div class="col-md-6">
                        <p class="mb-0">© {{date('Y')}} Meraz Raza.All rights reserved.</p>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex justify-content-md-end align-items-center">
                            <a href="https://raidaitbd.com" target="_blank" class="">Design & developed by Robiul Hossain</a>
                            <span class="ms-3 opacity-75">|</span>
                            <span class="ms-3">Version 2.0</span>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
  <div class="modal fade view-modal" id="staticBackdrop" tabindex="-1" 
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    </div>
    <div id="loadingPopup"
        style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); z-index: 9999; text-align: center;">
        <div style="position: relative; top: 50%; transform: translateY(-50%);">
            <div class="spinner-border text-light" role="status"></div>
            <p class="text-light mt-2">Processing...</p>
        </div>
    </div>
    @include('admin.includes.scripts')

</html>
