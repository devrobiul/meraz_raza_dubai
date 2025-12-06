<div class="sidebar" id="sidebar" data-theme="light">
    <!-- Sidebar Header with Logo -->
    <div class="sidebar-header">
        <div class="logo-container">
            <!-- Light Theme Logos -->
            <img src="{{ asset(setting('secondary_logo')) }}" alt="{{ setting('app_name') }}" class="logo-full logo-light">
            <img src="{{ asset(setting('secondary_logo')) }}" alt="{{ setting('app_name') }}"
                class="logo-icon logo-light">

            <!-- Dark Theme Logos -->
            <img src="{{ asset(setting('secondary_logo')) }}" alt="{{ setting('app_name') }}"
                class="logo-full logo-dark">
            <img src="{{ asset(setting('secondary_logo')) }}" alt="{{ setting('app_name') }}"
                class="logo-icon logo-dark">
        </div>
        <button class="btn d-md-none" id="close-sidebar">
            <i class="ri-close-line"></i>
        </button>
    </div>

    <!-- Sidebar Menu -->
    <div class="sidebar-menu">
        <ul>

            <li class="active">
                <a href="{{ route('admin.dashboard') }}">
                    <i class="ri-dashboard-line text-primary"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="active">
                <a href="{{ route('admin.attribute.index', ['type' => 'category']) }}">
                     <i class="ri-folder-line text-success"></i>
                    <span>Categories</span>
                </a>
            </li>
            <li class="active">
                <a href="{{ route('admin.post.index',['type'=>'article']) }}">
                     <i class="ri-file-list-line text-primary"></i>
                    <span>Articles</span>
                </a>
            </li>
          <li class="active">
                <a href="{{ route('admin.post.index',['type'=>'service']) }}">
                    <i class="ri-service-line text-primary"></i>
                    <span>Services</span>
                </a>
            </li>
            <li class="active">
                <a href="{{ route('admin.post.index', ['type' => 'portfolio']) }}">
                    <i class="ri-briefcase-line text-primary"></i>
                    <span>Portfolios</span>
                </a>
            </li>
            <li class="active">
                <a href="{{ route('admin.post.index', ['type' => 'review']) }}">
                    <i class="ri-star-line text-success"></i>
                    <span>Reviews</span>
                </a>
            </li>
       <li class="active">
    <a href="{{ route('admin.post.index', ['type' => 'award']) }}">
        <i class="ri-award-line text-success"></i>
        <span>Awards & Achievements</span>
    </a>
</li>









        















  

            @php
                $faqs = [
                    [
                        'type' => 'general',
                        'label' => 'General',
                        'icon' => 'ri-question-line',
                        'color' => 'text-primary',
                    ],
                    ['type' => 'service', 'label' => 'Service', 'icon' => 'ri-tools-line', 'color' => 'text-warning'],
                    ['type' => 'sellcar', 'label' => 'Sell Car', 'icon' => 'ri-car-line', 'color' => 'text-danger'],
                    ['type' => 'car', 'label' => 'Car Faq', 'icon' => 'ri-car-line', 'color' => 'text-success'],
                    ['type' => 'finance', 'label' => 'Finance', 'icon' => 'ri-bank-card-line', 'color' => 'text-info'],
                    [
                        'type' => 'warranty',
                        'label' => 'Warranty',
                        'icon' => 'ri-shield-check-line',
                        'color' => 'text-success',
                    ],
                    ['type' => 'payment', 'label' => 'Payment', 'icon' => 'ri-wallet-line', 'color' => 'text-warning'],
                    ['type' => 'refund', 'label' => 'Refund', 'icon' => 'ri-refund-2-line', 'color' => 'text-danger'],
                ];
            @endphp






            <!-- Settings Section -->
            <li class="has-dropdown">
                <a href="#feature" data-bs-toggle="collapse" aria-expanded="false" aria-controls="feature">
                    <i class="ri-layout-grid-line text-secondary"></i>
                    <span>Sections</span>
                    <i class="ri-arrow-down-s-line ms-auto"></i>
                </a>

                <ul class="collapse submenu ps-3" id="feature">

                    <li class="sub_menu">
                        <a href="{{ route('admin.section.index', ['type' => 'slider']) }}"
                            class="d-flex align-items-center">
                            <i class="ri-home-3-line text-warning me-2"></i>
                            Slider Section
                        </a>
                    </li>
         <li class="sub_menu">
    <a href="{{ route('admin.section.index', ['type' => 'about']) }}" class="d-flex align-items-center">
        <i class="ri-information-line text-warning me-2"></i>
        About Section
    </a>
</li>

                <li class="sub_menu">
                    <a href="{{ route('admin.education.index') }}" class="d-flex align-items-center">
                        <i class="ri-graduation-cap-line text-info me-2"></i>
                        Education Section
                    </a>
                </li>

<li class="sub_menu">
    <a href="{{ route('admin.gallery.index') }}" class="d-flex align-items-center">
        <i class="ri-gallery-line text-success me-2"></i>
        Gallery Section
    </a>
</li>


                  

                </ul>
            </li>


            <li class="has-dropdown">
                <a href="#settingsMenu" data-bs-toggle="collapse" aria-expanded="false" aria-controls="settingsMenu">
                    <i class="ri-settings-line text-secondary"></i>
                    <span> Settings</span>
                    <i class="ri-arrow-down-s-line ms-auto"></i>
                </a>
                <ul class="collapse submenu ps-3" id="settingsMenu">
                    <li class="sub_menu">
                        <a href="{{ route('admin.setting.general') }}" class="d-flex align-items-center">
                            <i class="ri-tools-line text-warning me-2"></i>
                            General Settings
                        </a>
                    </li>
                    <li class="sub_menu">
                        <a href="{{ route('admin.setting.information') }}" class="d-flex align-items-center">
                            <i class="ri-information-line text-info me-2"></i>
                            Information Settings
                        </a>
                    </li>
                    <li class="sub_menu">
                        <a href="{{ route('admin.setting.googlecode') }}" class="d-flex align-items-center">
                            <i class="ri-code-s-slash-line text-danger me-2"></i>
                            Google Code
                        </a>
                    </li>
                </ul>
            </li>

            <li class="has-dropdown">
                <a href="#settingSEO" data-bs-toggle="collapse" aria-expanded="false" aria-controls="settingSEO">
                    <i class="ri-global-line text-secondary"></i>
                    <span> Page SEO</span>
                    <i class="ri-arrow-down-s-line ms-auto"></i>
                </a>

                <ul class="collapse submenu ps-3" id="settingSEO">

                    @foreach (config('page_seo') as $seo)
                        <li class="sub_menu">
                            <a href="{{ route('admin.setting.seo', $seo['type']) }}"
                                class="d-flex align-items-center">
                                <i class="{{ $seo['icon'] }} me-2"></i> {{ $seo['name'] }}
                            </a>
                        </li>
                    @endforeach

                </ul>
            </li>





        </ul>
    </div>


    <!-- Sidebar Footer -->
    <div class="sidebar-footer">
        <div class="d-flex justify-content-between align-items-center">
            <a href="settings/profile.html" class="d-flex align-items-center w-100" title="User Profile">
                <div class="avatar avatar-sm me-3">
                    <img src="{{ asset($authUser->avatar ?? 'admin/img/user.png') }}" alt="User Avatar"
                        class="rounded-circle">
                </div>
                <div class="user-info">
                    <span class="fw-medium">{{ $authUser->name ?? 'N/A' }}</span>
                    <small class="d-block text-muted">Admin</small>
                </div>
            </a>
        </div>
    </div>

</div>
