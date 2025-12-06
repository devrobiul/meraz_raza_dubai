/**
 * Main JavaScript file for Car Pooling Dashboard
 * Handles sidebar toggle, theme switching, and custom dropdown implementation
 */

document.addEventListener('DOMContentLoaded', function () {
    // Initialize theme from localStorage or default to light
    initTheme();

    // Initialize sidebar state
    initSidebar();

    // Setup event listeners
    setupEventListeners();

    // Initialize Bootstrap components
    initDropdowns();
    initModals();
    initializeBootstrapTabs();
    initializeListGroupTabs(); // Added new initialization

    // Initialize our custom dropdowns
    initializeCustomDropdowns();

    // Call other initialization functions
    initBookingInterface();
    initPaymentManagement();
    initRideHistoryChart();
    initReviewManagement();

    // Initialize analytics charts
    initializeAnalyticsCharts();

    // Initialize revenue reports
    initRevenueReports();
});

/**
 * Initialize theme based on user preference or system preference
 */
function initTheme() {
    const savedTheme = localStorage.getItem('theme');
    const prefersDark = window.matchMedia('(prefers-color-scheme: light)').matches;

    // Determine which theme to use
    const theme = savedTheme === 'dark' || (!savedTheme && prefersDark) ? 'dark' : 'light';
    
    // Set theme on root element
    document.documentElement.setAttribute('data-theme', theme);
    
    // Set theme on sidebar for logo visibility
    document.getElementById('sidebar')?.setAttribute('data-theme', theme);
    
    // Update theme toggle button if it exists
    if (theme === 'dark') {
        document.getElementById('theme-toggle')?.classList.add('active');
    }
}

/**
 * Initialize sidebar state based on screen size and saved preference
 */
function initSidebar() {
    const isMobile = window.innerWidth < 992;
    
    // Always start with sidebar collapsed on mobile
    if (isMobile) {
        document.body.classList.add('sidebar-collapsed');
        document.body.classList.remove('sidebar-expanded');
    } else {
        // On desktop, use saved state or default to expanded
        const savedSidebarState = localStorage.getItem('sidebar');
        if (savedSidebarState === 'collapsed') {
            document.body.classList.add('sidebar-collapsed');
            document.body.classList.remove('sidebar-expanded');
        } else {
            document.body.classList.remove('sidebar-collapsed');
            document.body.classList.add('sidebar-expanded');
        }
    }

    // Ensure toggle button reflects current state
    const toggleBtn = document.getElementById('sidebar-toggle');
    if (toggleBtn) {
        toggleBtn.setAttribute('aria-expanded', 
            document.body.classList.contains('sidebar-expanded'));
        updateToggleIcon(toggleBtn, 
            document.body.classList.contains('sidebar-collapsed'));
    }
}

/**
 * Update toggle icon based on sidebar state
 */
function updateToggleIcon(toggleBtn, isCollapsed) {
    if (!toggleBtn) return;
    
    const toggleIcon = toggleBtn.querySelector('i');
    if (toggleIcon) {
        if (isCollapsed) {
            toggleIcon.classList.add('ri-menu-line');
            toggleIcon.classList.remove('ri-close-line');
        } else {
            toggleIcon.classList.remove('ri-menu-line');
            toggleIcon.classList.add('ri-close-line');
        }
    }
}

/**
 * Setup all event listeners for interactive elements
 */
function setupEventListeners() {
    // Theme toggle
    const themeToggle = document.getElementById('theme-toggle');
    if (themeToggle) {
        themeToggle.addEventListener('click', toggleTheme);
    }

    // Sidebar toggle - direct event binding instead of delegation
    const sidebarToggle = document.getElementById('sidebar-toggle');
    if (sidebarToggle) {
        sidebarToggle.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            toggleSidebar();
        });
    }

    // Close sidebar button (mobile)
    const closeSidebar = document.getElementById('close-sidebar');
    if (closeSidebar) {
        closeSidebar.addEventListener('click', closeSidebarOnMobile);
    }

    // Mobile sidebar overlay click handler
    const overlay = document.getElementById('mobile-sidebar-overlay');
    if (overlay) {
        overlay.addEventListener('click', closeSidebarOnMobile);
    }

    // Handle window resize
    window.addEventListener('resize', handleResize);

    // Close sidebar when clicking outside on mobile devices
    document.addEventListener('click', function(e) {
        const isMobile = window.innerWidth < 992;
        const sidebar = document.getElementById('sidebar');
        const sidebarToggle = document.getElementById('sidebar-toggle');
        
        if (isMobile && sidebar && !sidebar.contains(e.target) && 
            sidebarToggle && !sidebarToggle.contains(e.target) && 
            !document.body.classList.contains('sidebar-collapsed')) {
            
            closeSidebarOnMobile();
        }
    });

    // Initialize user profile dropdown
    initUserProfileDropdown();

    // Initialize non-dropdown Bootstrap components if needed
    initializeOtherBootstrapComponents();
}

/**
 * Initialize user profile dropdown with custom behavior
 */
function initUserProfileDropdown() {
    const userDropdown = document.querySelector('.user-dropdown');
    if (!userDropdown) return;

    const dropdownToggle = userDropdown.querySelector('.dropdown-toggle');
    const dropdownMenu = userDropdown.querySelector('.dropdown-menu');
    const dropdownItems = userDropdown.querySelectorAll('.dropdown-item');

    // Toggle dropdown on click
    dropdownToggle?.addEventListener('click', (e) => {
        e.preventDefault();
        const isExpanded = dropdownToggle.getAttribute('aria-expanded') === 'true';
        toggleUserDropdown(!isExpanded);
    });

    // Close dropdown when clicking outside
    document.addEventListener('click', (e) => {
        if (!userDropdown.contains(e.target)) {
            toggleUserDropdown(false);
        }
    });

    // Keyboard navigation
    dropdownToggle?.addEventListener('keydown', (e) => {
        if (e.key === 'ArrowDown' || e.key === 'Enter' || e.key === ' ') {
            e.preventDefault();
            toggleUserDropdown(true);
            dropdownItems[0]?.focus();
        }
    });

    dropdownItems.forEach((item, index) => {
        item.addEventListener('keydown', (e) => {
            switch (e.key) {
                case 'ArrowDown':
                    e.preventDefault();
                    dropdownItems[index + 1]?.focus();
                    break;
                case 'ArrowUp':
                    e.preventDefault();
                    if (index === 0) {
                        dropdownToggle?.focus();
                    } else {
                        dropdownItems[index - 1]?.focus();
                    }
                    break;
                case 'Escape':
                    e.preventDefault();
                    toggleUserDropdown(false);
                    dropdownToggle?.focus();
                    break;
            }
        });
    });

    function toggleUserDropdown(show) {
        dropdownToggle?.setAttribute('aria-expanded', show);
        if (show) {
            dropdownMenu?.classList.add('show');
        } else {
            dropdownMenu?.classList.remove('show');
        }
    }
}

/**
 * Toggle between light and dark theme
 */
function toggleTheme() {
    const currentTheme = document.documentElement.getAttribute('data-theme');
    const newTheme = currentTheme === 'dark' ? 'light' : 'dark';

    // Update theme on root element
    document.documentElement.setAttribute('data-theme', newTheme);
    
    // Update theme specifically on sidebar for logo switching
    document.getElementById('sidebar')?.setAttribute('data-theme', newTheme);
    
    // Save theme preference to localStorage
    localStorage.setItem('theme', newTheme);
    document.getElementById('theme-toggle')?.classList.toggle('active');

    // Update theme for all other themed elements
    document.querySelectorAll('[data-theme]').forEach(el => {
        el.setAttribute('data-theme', newTheme);
    });
}

/**
 * Toggle sidebar visibility
 */
function toggleSidebar() {
    const isCollapsed = document.body.classList.contains('sidebar-collapsed');
    const isMobile = window.innerWidth < 992;
    const overlay = document.getElementById('mobile-sidebar-overlay');

    if (isCollapsed) {
        // Expanding sidebar
        document.body.classList.remove('sidebar-collapsed');
        document.body.classList.add('sidebar-expanded');
        
        // For mobile: prevent body scrolling and show overlay
        if (isMobile) {
            document.body.style.overflow = 'hidden';
            if (overlay) {
                overlay.style.display = 'block';
                setTimeout(() => {
                    overlay.style.opacity = '1';
                    overlay.style.visibility = 'visible';
                    overlay.style.pointerEvents = 'auto';
                }, 10);
            }
        }
    } else {
        // Collapsing sidebar
        document.body.classList.add('sidebar-collapsed');
        document.body.classList.remove('sidebar-expanded');
        
        // For mobile: restore body scrolling and hide overlay
        if (isMobile) {
            document.body.style.overflow = '';
            if (overlay) {
                overlay.style.opacity = '0';
                overlay.style.visibility = 'hidden';
                overlay.style.pointerEvents = 'none';
                setTimeout(() => {
                    if (document.body.classList.contains('sidebar-collapsed')) {
                        overlay.style.display = 'none';
                    }
                }, 300);
            }
        }
    }

    // Update toggle button state
    const toggleBtn = document.getElementById('sidebar-toggle');
    if (toggleBtn) {
        toggleBtn.setAttribute('aria-expanded', !isCollapsed);
        updateToggleIcon(toggleBtn, isCollapsed);
    }

    // Save state to localStorage (only for desktop)
    if (!isMobile) {
        localStorage.setItem('sidebar', isCollapsed ? 'expanded' : 'collapsed');
    }
}

/**
 * Close sidebar on mobile view
 */
function closeSidebarOnMobile() {
    const overlay = document.getElementById('mobile-sidebar-overlay');
    
    document.body.classList.add('sidebar-collapsed');
    document.body.classList.remove('sidebar-expanded');
    document.body.style.overflow = '';
    
    // Update toggle button state
    const toggleBtn = document.getElementById('sidebar-toggle');
    if (toggleBtn) {
        toggleBtn.setAttribute('aria-expanded', false);
        updateToggleIcon(toggleBtn, true);
    }
    
    // Hide overlay with animation
    if (overlay) {
        overlay.style.opacity = '0';
        overlay.style.visibility = 'hidden';
        overlay.style.pointerEvents = 'none';
        setTimeout(() => {
            if (document.body.classList.contains('sidebar-collapsed')) {
                overlay.style.display = 'none';
            }
        }, 300);
    }
}

/**
 * Handle window resize events
 */
function handleResize() {
    const isMobile = window.innerWidth < 992;
    
    // Update body class for mobile/desktop styles
    if (isMobile) {
        document.body.classList.add('is-mobile');
    } else {
        document.body.classList.remove('is-mobile');
    }
    
    // On mobile, always collapse sidebar when resizing to mobile breakpoint
    if (isMobile) {
        closeSidebarOnMobile();
    }
}

/**
 * Initialize non-dropdown Bootstrap components
 */
function initializeOtherBootstrapComponents() {
    // Initialize tooltips if Bootstrap is available
    if (typeof bootstrap !== 'undefined' && typeof bootstrap.Tooltip === 'function') {
        document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach(el => {
            new bootstrap.Tooltip(el);
        });
    }

    // Initialize modals if Bootstrap is available
    if (typeof bootstrap !== 'undefined' && typeof bootstrap.Modal === 'function') {
        document.querySelectorAll('[data-bs-toggle="modal"]').forEach(el => {
            new bootstrap.Modal(el);
        });
    }
}

/**
 * Initialize custom dropdowns, replacing Bootstrap's collapse functionality
 */
function initializeCustomDropdowns() {
    // Get all dropdown toggles
    const dropdownToggles = document.querySelectorAll('.has-dropdown > a');
    
    // First, make sure all collapse elements are reset to a known state
    const collapseElements = document.querySelectorAll('.collapse');
    collapseElements.forEach(el => {
        // Ensure it starts hidden
        el.classList.remove('show');
        
        // Clean up any Bootstrap instances if Bootstrap is loaded
        if (typeof bootstrap !== 'undefined' && typeof bootstrap.Collapse === 'function') {
            try {
                const bsInstance = bootstrap.Collapse.getInstance(el);
                if (bsInstance) {
                    bsInstance.dispose();
                }
            } catch (e) {
                // Ignore errors, just trying to clean up
            }
        }
    });

    // Handle hover positioning for collapsed state
    document.querySelectorAll('.has-dropdown').forEach(dropdown => {
        const submenu = dropdown.querySelector('ul.collapse');
        if (!submenu) return;

        dropdown.addEventListener('mouseenter', () => {
            if (document.body.classList.contains('sidebar-collapsed')) {
                const dropdownRect = dropdown.getBoundingClientRect();
                const sidebarRect = document.querySelector('.sidebar').getBoundingClientRect();
                submenu.style.top = `${dropdownRect.top}px`;
                
                // Adjust submenu position if it would go below viewport
                const viewportHeight = window.innerHeight;
                const submenuHeight = submenu.offsetHeight;
                if (dropdownRect.top + submenuHeight > viewportHeight) {
                    submenu.style.top = `${viewportHeight - submenuHeight - 10}px`;
                }
            }
        });
    });

    // Attach click handlers to dropdown toggles
    dropdownToggles.forEach((toggle) => {
        // First, ensure we start with the correct aria-expanded state
        const targetId = toggle.getAttribute('data-bs-target') || toggle.getAttribute('href');
        if (targetId && targetId.startsWith('#')) {
            const targetEl = document.querySelector(targetId);
            const isExpanded = targetEl?.classList.contains('show') || false;
            toggle.setAttribute('aria-expanded', isExpanded ? 'true' : 'false');
        }
        
        // Then attach the click handler
        toggle.addEventListener('click', handleDropdownToggle);
    });
    
    // Close dropdowns when clicking outside of them
    document.addEventListener('click', (e) => {
        // If the click wasn't inside a dropdown or on a toggle, close all dropdowns
        if (!e.target.closest('.collapse') && 
            !e.target.closest('.has-dropdown > a')) {
            collapseElements.forEach(el => {
                el.classList.remove('show');
                
                // Update the toggle button
                const toggleBtn = document.querySelector(`[data-bs-target="#${el.id}"], [href="#${el.id}"]`);
                if (toggleBtn) {
                    toggleBtn.setAttribute('aria-expanded', 'false');
                }
            });
        }
    });
    
    // Set the active page and expand its dropdown
    setActivePage();
}

/**
 * Handle dropdown toggle click events
 */
function handleDropdownToggle(e) {
    e.preventDefault();
    e.stopPropagation();
    
    // Get target from href or data-bs-target
    const targetId = this.getAttribute('data-bs-target') || this.getAttribute('href');
    if (!targetId || !targetId.startsWith('#')) {
        return;
    }
    
    const targetEl = document.querySelector(targetId);
    if (!targetEl) {
        return;
    }
    
    // Check current state
    const isExpanded = targetEl.classList.contains('show');
    
    // Close all other dropdowns first
    document.querySelectorAll('.collapse.show').forEach(el => {
        if (el !== targetEl) {
            // Close dropdown
            el.classList.remove('show');
            
            // Update trigger button
            const trigger = document.querySelector(`[data-bs-target="#${el.id}"], [href="#${el.id}"]`);
            if (trigger) {
                trigger.setAttribute('aria-expanded', 'false');
            }
        }
    });
    
    // Toggle this dropdown
    if (isExpanded) {
        // Close this dropdown
        targetEl.classList.remove('show');
        this.setAttribute('aria-expanded', 'false');
    } else {
        // Open this dropdown
        targetEl.classList.add('show');
        this.setAttribute('aria-expanded', 'true');
    }
}

/**
 * Set the active page and expand its parent dropdown
 */
function setActivePage() {
    // Clear any existing active states
    document.querySelectorAll('.active, .active-parent').forEach(el => {
        el.classList.remove('active', 'active-parent');
    });
    
    const currentPath = window.location.pathname;
    
    // Find link matching current path
    document.querySelectorAll('.collapse a').forEach(link => {
        const href = link.getAttribute('href') || '';
        
        // Check for exact match or common variations
        if (href === currentPath || 
            href === currentPath.substring(1) || 
            '/' + href === currentPath) {
            
            // Mark link as active
            link.classList.add('active');
            
            // Find and expand parent dropdown
            const parentCollapse = link.closest('.collapse');
            if (parentCollapse) {
                parentCollapse.classList.add('show');
                
                // Update the toggle button
                const toggleBtn = document.querySelector(`[data-bs-target="#${parentCollapse.id}"], [href="#${parentCollapse.id}"]`);
                if (toggleBtn) {
                    toggleBtn.setAttribute('aria-expanded', 'true');
                    toggleBtn.classList.add('active-parent');
                }
            }
        }
    });
}

/**
 * Initialize booking interface
 */
function initBookingInterface() {
    const bookingForm = document.getElementById('bookingForm');
    if (!bookingForm) return;

    const recurringRideCheckbox = document.getElementById('recurringRide');
    const recurringOptions = document.getElementById('recurringOptions');

    if (recurringRideCheckbox && recurringOptions) {
        recurringRideCheckbox.addEventListener('change', function () {
            recurringOptions.classList.toggle('d-none', !this.checked);
        });
    }

    const routeMap = document.getElementById('routeMap');
    const routeDetails = document.getElementById('routeDetails');

    function simulateRouteCalculation() {
        const pickup = document.getElementById('pickupLocation')?.value;
        const destination = document.getElementById('destination')?.value;
        const routeMap = document.getElementById('routeMap');
        const routeDetails = document.getElementById('routeDetails');
        const routeSimulation = routeMap?.querySelector('.route-simulation');

        if (pickup && destination && routeMap && routeSimulation) {
            routeSimulation.classList.remove('d-none');
            routeMap.querySelector('.pickup-location').textContent = pickup;
            routeMap.querySelector('.destination-location').textContent = destination;

            // Show route details with simulated data
            if (routeDetails) {
                routeDetails.classList.remove('d-none');
                document.getElementById('estimatedDistance').textContent = '12.5 km';
                document.getElementById('estimatedTime').textContent = '25 min';
                document.getElementById('estimatedFare').textContent = '$18.75';
            }
        }
    }

    document.getElementById('pickupMapBtn')?.addEventListener('click', simulateRouteCalculation);
    document.getElementById('destinationMapBtn')?.addEventListener('click', simulateRouteCalculation);

    bookingForm.addEventListener('submit', function (e) {
        e.preventDefault();
        simulateRouteCalculation();

        const successAlert = document.createElement('div');
        successAlert.className = 'alert alert-success mt-3';
        successAlert.innerHTML = '<i class="ri-check-line me-2"></i> Ride scheduled successfully!';
        this.parentElement?.appendChild(successAlert);

        setTimeout(() => successAlert.remove(), 3000);
    });

    const viewCalendarBtn = document.getElementById('viewCalendarBtn');
    const viewListBtn = document.getElementById('viewListBtn');

    if (viewCalendarBtn && viewListBtn) {
        viewCalendarBtn.addEventListener('click', function () {
            this.classList.add('active');
            viewListBtn.classList.remove('active');
            alert('Calendar view would be shown here');
        });

        viewListBtn.addEventListener('click', function () {
            this.classList.add('active');
            viewCalendarBtn.classList.remove('active');
        });
    }
}

/**
 * Initialize payment management
 */
function initPaymentManagement() {
    const paymentCards = document.querySelectorAll('.payment-card');
    if (paymentCards.length === 0) return;

    document.querySelectorAll('.form-check-input[id^="defaultCard"]').forEach(switchEl => {
        switchEl.addEventListener('change', function () {
            if (this.checked) {
                document.querySelectorAll('.form-check-input[id^="defaultCard"]').forEach(other => {
                    if (other !== this) other.checked = false;
                });
            }
        });
    });

    document.querySelectorAll('[data-bs-target="#addPaymentMethodModal"]').forEach(btn => {
        btn.addEventListener('click', () => alert('Add payment method modal would open here'));
    });

    document.querySelector('[data-bs-target="#editBillingModal"]')?.addEventListener('click', () => {
        alert('Edit billing information modal would open here');
    });
}

/**
 * Initialize charts on analytics page
 */
function initializeAnalyticsCharts() {
    // Only initialize the charts specific to analytics page
    const tripDistCtx = document.getElementById('tripDistributionChart');
    if (tripDistCtx) {
        new Chart(tripDistCtx, {
            type: 'doughnut',
            data: {
                labels: ['Morning', 'Afternoon', 'Evening', 'Night'],
                datasets: [{
                    data: [35, 30, 25, 10],
                    backgroundColor: [
                        '#0d6efd',
                        '#198754',
                        '#ffc107',
                        '#dc3545'
                    ]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });
    }
}

/**
 * Initialize ride history analytics chart
 */
function initRideHistoryChart() {
    const ctx = document.getElementById('rideHistoryChart');
    if (!ctx) return;

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
            datasets: [
                {
                    label: 'Number of Rides',
                    data: [65, 59, 80, 81, 56, 95, 75],
                    backgroundColor: 'rgba(13, 110, 253, 0.5)',
                    borderColor: '#0d6efd',
                    borderWidth: 1,
                    borderRadius: 4,
                    order: 2
                },
                {
                    label: 'Revenue ($)',
                    data: [1200, 1100, 1500, 1550, 1000, 1800, 1400],
                    type: 'line',
                    borderColor: '#198754',
                    backgroundColor: 'rgba(25, 135, 84, 0.1)',
                    fill: true,
                    tension: 0.4,
                    order: 1,
                    yAxisID: 'y1'
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            interaction: {
                intersect: false,
                mode: 'index'
            },
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Number of Rides'
                    }
                },
                y1: {
                    beginAtZero: true,
                    position: 'right',
                    title: {
                        display: true,
                        text: 'Revenue ($)'
                    },
                    grid: {
                        drawOnChartArea: false
                    }
                }
            },
            plugins: {
                legend: {
                    position: 'top'
                },
                tooltip: {
                    padding: 12,
                    backgroundColor: 'rgba(0, 0, 0, 0.8)'
                }
            }
        }
    });
}

/**
 * Initialize Bootstrap tabs
 */
function initializeBootstrapTabs() {
    // Manually activate the first tab for each tab group on the page
    document.querySelectorAll('.nav-tabs').forEach(tabGroup => {
        const firstTab = tabGroup.querySelector('[data-bs-toggle="tab"]');
        if (firstTab && typeof bootstrap !== 'undefined' && typeof bootstrap.Tab === 'function') {
            const tab = new bootstrap.Tab(firstTab);
            tab.show();
        }
    });
    
    // Initialize all tab click events
    document.querySelectorAll('[data-bs-toggle="tab"]').forEach(tabEl => {
        tabEl.addEventListener('click', function(e) {
            e.preventDefault();
            if (typeof bootstrap !== 'undefined' && typeof bootstrap.Tab === 'function') {
                const tab = new bootstrap.Tab(this);
                tab.show();
            }
        });
    });
}

/**
 * Initialize list-group style tabs (used in settings page)
 */
function initializeListGroupTabs() {
    // Initialize list-group tab click events
    document.querySelectorAll('.list-group-item[data-bs-toggle="list"]').forEach(listItem => {
        listItem.addEventListener('click', function(e) {
            e.preventDefault();
            if (typeof bootstrap !== 'undefined' && typeof bootstrap.Tab === 'function') {
                const tab = new bootstrap.Tab(this);
                tab.show();
            }
        });
    });

    // Show the active tab on page load
    const activeListItem = document.querySelector('.list-group-item.active[data-bs-toggle="list"]');
    if (activeListItem && typeof bootstrap !== 'undefined' && typeof bootstrap.Tab === 'function') {
        const tab = new bootstrap.Tab(activeListItem);
        tab.show();
    }

    // If no active tab, show the first tab
    if (!activeListItem) {
        const firstListItem = document.querySelector('.list-group-item[data-bs-toggle="list"]');
        if (firstListItem && typeof bootstrap !== 'undefined' && typeof bootstrap.Tab === 'function') {
            const tab = new bootstrap.Tab(firstListItem);
            tab.show();
        }
    }
}

/**
 * Initialize all Bootstrap dropdowns
 */
function initBootstrapDropdowns() {
    // Initialize all dropdowns on the page
    document.querySelectorAll('[data-bs-toggle="dropdown"]').forEach(function(element) {
        new bootstrap.Dropdown(element, {
            // Add any custom options here if needed
        });
    });
}

/**
 * Initialize review management functionality
 */
function initReviewManagement() {
    // Handle reply modal
    document.querySelectorAll('[data-bs-toggle="dropdown"]').forEach(dropdown => {
        const menu = dropdown.nextElementSibling;
        if (!menu) return;

        const replyButton = menu.querySelector('[data-action="reply"]');
        if (!replyButton) return;

        replyButton.addEventListener('click', function(e) {
            e.preventDefault();
            const reviewCard = this.closest('.card');
            const reviewerName = reviewCard.querySelector('h6').textContent;
            const reviewText = reviewCard.querySelector('p').textContent;
            
            const modal = new bootstrap.Modal(document.getElementById('replyModal'));
            const modalTitle = document.querySelector('#replyModal .modal-title');
            modalTitle.textContent = `Reply to ${reviewerName}'s Review`;
            
            // Add review context to modal
            const reviewContext = document.createElement('div');
            reviewContext.className = 'review-context mb-3 p-3 bg-light rounded';
            reviewContext.innerHTML = `<small class="text-muted">Original Review:</small><p class="mb-0 mt-1">${reviewText}</p>`;
            
            const modalBody = document.querySelector('#replyModal .modal-body');
            const existingContext = modalBody.querySelector('.review-context');
            if (existingContext) {
                existingContext.remove();
            }
            modalBody.insertBefore(reviewContext, modalBody.firstChild);
            
            modal.show();
        });
    });
}

/**
 * Initialize Bootstrap dropdowns with enhanced functionality
 */
function initDropdowns() {
    document.querySelectorAll('.dropdown-toggle, [data-bs-toggle="dropdown"]').forEach(dropdownToggle => {
        // Create new dropdown instance for each toggle
        const dropdown = new bootstrap.Dropdown(dropdownToggle, {
            autoClose: true
        });

        // Add click handler to ensure proper toggling
        dropdownToggle.addEventListener('click', (e) => {
            e.preventDefault();
            e.stopPropagation();
            
            // Toggle the dropdown
            if (dropdownToggle.classList.contains('show')) {
                dropdown.hide();
            } else {
                dropdown.show();
            }
        });
    });

    // Handle dropdown items click
    document.querySelectorAll('.dropdown-menu .dropdown-item').forEach(item => {
        item.addEventListener('click', (e) => {
            const dropdownToggle = item.closest('.dropdown').querySelector('[data-bs-toggle="dropdown"]');
            if (dropdownToggle) {
                bootstrap.Dropdown.getInstance(dropdownToggle)?.hide();
            }
        });
    });
}

/**
 * Initialize Bootstrap modals
 */
function initModals() {
    // Initialize all modals on the page
    document.querySelectorAll('.modal').forEach(modalElement => {
        let modal = bootstrap.Modal.getOrCreateInstance(modalElement);
        
        // Ensure proper cleanup when modal is hidden
        modalElement.addEventListener('hidden.bs.modal', function () {
            const form = this.querySelector('form');
            if (form) form.reset();
        });
    });
}

/**
 * Initialize revenue reports charts
 */
function initRevenueReports() {
    // Revenue Trends Chart
    const revenueCtx = document.getElementById('revenueChart');
    if (revenueCtx) {
        new Chart(revenueCtx.getContext('2d'), {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: 'Revenue',
                    data: [65000, 72000, 68000, 78000, 85000, 82000, 88000, 92000, 86000, 94000, 90000, 124568],
                    borderColor: '#4361ee',
                    tension: 0.4,
                    fill: true,
                    backgroundColor: 'rgba(67, 97, 238, 0.1)'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return '$' + value.toLocaleString();
                            }
                        }
                    }
                }
            }
        });
    }

    // Revenue Distribution Chart
    const distributionCtx = document.getElementById('revenueDistribution');
    if (distributionCtx) {
        new Chart(distributionCtx.getContext('2d'), {
            type: 'doughnut',
            data: {
                labels: ['Standard Rides', 'Premium Rides', 'Surge Pricing', 'Cancellation Fees'],
                datasets: [{
                    data: [68.4, 19.9, 10.0, 1.7],
                    backgroundColor: ['#4361ee', '#2cc6c6', '#ff6b6b', '#ffd93d']
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });
    }

    // Sparkline Charts in Stat Cards
    document.querySelectorAll('.sparkline-chart').forEach(function(canvas) {
        if (!canvas) return;
        const values = JSON.parse(canvas.getAttribute('data-values'));
        
        new Chart(canvas.getContext('2d'), {
            type: 'line',
            data: {
                labels: Array(values.length).fill(''),
                datasets: [{
                    data: values,
                    borderColor: canvas.closest('.card').querySelector('.stat-icon').classList.contains('bg-danger') 
                        ? '#ff6b6b' 
                        : '#4361ee',
                    borderWidth: 2,
                    tension: 0.4,
                    pointRadius: 0,
                    pointHoverRadius: 3,
                    fill: true,
                    backgroundColor: 'rgba(67, 97, 238, 0.1)'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        enabled: true
                    }
                },
                scales: {
                    x: {
                        display: false
                    },
                    y: {
                        display: false,
                        beginAtZero: false
                    }
                }
            }
        });
    });
}


