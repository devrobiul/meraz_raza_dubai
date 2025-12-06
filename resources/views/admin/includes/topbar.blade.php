<header class="header">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center w-100">
            <div class="d-flex align-items-center">
                <button class="btn sidebar-toggle me-3" id="sidebar-toggle" type="button" aria-label="Toggle Sidebar"
                    aria-expanded="true" aria-controls="sidebar">
                    <i class="ri-menu-line" aria-hidden="true"></i>
                </button>
                <h5 class=" mb-0">@yield('title')</h5>
            </div>
            <div class="d-flex align-items-center">
                <!-- Theme Toggle -->

            

                <div class="theme-toggle me-3">
                    <a target="_blank" href="{{ route('home') }}" class="text-decoration-none btn theme-toggle-btn">
                        <i class="ri-earth-line" style="font-size: 20px;"></i>
                    </a>
                </div>
                <div class="theme-toggle me-3">
                    <button class="btn theme-toggle-btn" id="theme-toggle">
                        <i class="ri-sun-line light-icon"></i>
                        <i class="ri-moon-line dark-icon"></i>
                    </button>
                </div>
                <!-- User Profile Dropdown -->
                <div class="dropdown user-dropdown">
                    <button class="btn dropdown-toggle d-flex align-items-center border-0 bg-transparent" type="button"
                        id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="avatar avatar-sm avatar-with-badge me-2">
                            <img src="{{ asset($authUser->avatar ?? 'admin/img/user.png') }}" alt="User profile"
                                class="avatar-image">
                            <span class="avatar-status avatar-status-online"></span>
                        </div>
                        <span class="d-none d-md-inline">{{ $authUser->name }}</span>
                    </button>

                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li><a class="dropdown-item" href="{{ route('admin.profile') }}"><i
                                    class="ri-user-line me-2"></i>Profile</a></li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form action="{{ route('admin.logout') }}" method="post">
                                @csrf
                                <button type="submit" class="btn dropdown-item"><i
                                        class="ri-logout-box-line me-2"></i>Sign Out</button>
                            </form>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</header>
