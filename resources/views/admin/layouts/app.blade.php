<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <meta
        name="csrf-token"
        content="{{ csrf_token() }}"
    >

    <title>
        @yield('title', 'Admin Dashboard') | Glass Store
    </title>


    {{-- =========================================================
        GOOGLE FONT
    ========================================================== --}}

    <link
        rel="preconnect"
        href="https://fonts.googleapis.com"
    >

    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet"
    >


    {{-- =========================================================
        FONT AWESOME
    ========================================================== --}}

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    >


    {{-- =========================================================
        BOOTSTRAP
    ========================================================== --}}

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >


    {{-- =========================================================
        ADMIN CSS
        Cache busted automatically
    ========================================================== --}}

    @php
        $adminCssPath = public_path('assets/css/admin.css');

        $adminCssVersion = file_exists($adminCssPath)
            ? filemtime($adminCssPath)
            : time();
    @endphp

    <link
        rel="stylesheet"
        href="{{ asset('assets/css/admin.css') }}?v={{ $adminCssVersion }}"
    >

</head>


<body>


<div class="admin-wrapper" id="adminWrapper">


    {{-- =========================================================
        MOBILE SIDEBAR OVERLAY
    ========================================================== --}}

    <div
        class="sidebar-overlay"
        id="sidebarOverlay"
    ></div>


    {{-- =========================================================
        SIDEBAR
    ========================================================== --}}

    <aside class="admin-sidebar" id="adminSidebar">


        {{-- =====================================================
            SIDEBAR BRAND
        ====================================================== --}}

        <div class="sidebar-brand">

            <a href="">

                <div class="brand-icon">

                    <i class="fa-solid fa-gem"></i>

                </div>

                <div class="brand-text">

                    <span class="brand-name">
                        Glass<span>Store</span>
                    </span>

                    <small>
                        Glass & Aluminium
                    </small>

                </div>

            </a>

        </div>


        {{-- =====================================================
            SIDEBAR NAVIGATION
        ====================================================== --}}

        <nav class="sidebar-nav">


            {{-- MAIN --}}

            <div class="nav-section-title">
                MAIN
            </div>


            <a
                href=""
                class="sidebar-link {{ request()->is('admin/dashboard') ? 'active' : '' }}"
            >

                <i class="fa-solid fa-chart-pie"></i>

                <span>
                    Dashboard
                </span>

            </a>


            {{-- CATALOG --}}

            <div class="nav-section-title">
                CATALOG
            </div>


            <a
                href="allcategories"
                class="sidebar-link {{ request()->is('admin/categories*') ? 'active' : '' }}"
            >

                <i class="fa-solid fa-layer-group"></i>

                <span>
                    Categories
                </span>

            </a>


            <a
                href="{{ url('/allusers') }}"
                class="sidebar-link {{ request()->is('admin/products*') ? 'active' : '' }}"
            >

                <i class="fa-solid fa-box-open"></i>

                <span>
                    Users
                </span>

            </a>


            {{-- SALES --}}

            <div class="nav-section-title">
                SALES
            </div>


            <a
                href="{{ url('/alltransactions') }}"
                class="sidebar-link {{ request()->is('admin/orders*') ? 'active' : '' }}"
            >

                <i class="fa-solid fa-cart-shopping"></i>

                <span>
                    Transactions
                </span>

                <span class="sidebar-link-badge">
                    3
                </span>

            </a>


            <a
                href="{{ url('/allusersbudgets') }}"
                class="sidebar-link {{ request()->is('admin/customers*') ? 'active' : '' }}"
            >

                <i class="fa-solid fa-users"></i>

                <span>
                    Customers
                </span>

            </a>


            {{-- MANAGEMENT --}}

            <div class="nav-section-title">
                MANAGEMENT
            </div>


            <a
                href="{{ url('') }}"
                class="sidebar-link {{ request()->is('admin/inventory*') ? 'active' : '' }}"
            >

                <i class="fa-solid fa-warehouse"></i>

                <span>
                    Inventory
                </span>

            </a>


            <a
                href="{{ url('') }}"
                class="sidebar-link {{ request()->is('admin/reports*') ? 'active' : '' }}"
            >

                <i class="fa-solid fa-chart-column"></i>

                <span>
                    Reports
                </span>

            </a>


            {{-- SYSTEM --}}

            <div class="nav-section-title">
                SYSTEM
            </div>


            <a
                href="{{ url('') }}"
                class="sidebar-link {{ request()->is('admin/profile*') ? 'active' : '' }}"
            >

                <i class="fa-solid fa-user"></i>

                <span>
                    My Profile
                </span>

            </a>


            <a
                href="{{ url('') }}"
                class="sidebar-link {{ request()->is('admin/settings*') ? 'active' : '' }}"
            >

                <i class="fa-solid fa-gear"></i>

                <span>
                    Settings
                </span>

            </a>


        </nav>


        {{-- =====================================================
            SIDEBAR USER
        ====================================================== --}}

        <div class="sidebar-bottom">

            <div class="sidebar-user">

                <div class="sidebar-user-avatar">

                    {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}

                </div>


                <div class="user-info">

                    <strong>
                        {{ auth()->user()->name ?? 'Admin' }}
                    </strong>

                    <small>
                        Administrator
                    </small>

                </div>


                <div class="sidebar-user-status"></div>

            </div>


            <form
                action="{{ url('/logout') }}"
                method="POST"
                class="sidebar-logout-form"
            >

                @csrf

                <button
                    type="submit"
                    class="sidebar-logout"
                >

                    <i class="fa-solid fa-right-from-bracket"></i>

                    <span>
                        Logout
                    </span>

                </button>

            </form>

        </div>

    </aside>


    {{-- =========================================================
        MAIN AREA
    ========================================================== --}}

    <div class="admin-main" id="adminMain">


        {{-- =====================================================
            NAVBAR
        ====================================================== --}}

        <header class="admin-navbar">


            {{-- LEFT --}}

            <div class="navbar-left">


                <button
                    type="button"
                    class="sidebar-toggle"
                    id="sidebarToggle"
                    aria-label="Toggle sidebar"
                    title="Toggle sidebar"
                >

                    <i class="fa-solid fa-bars"></i>

                </button>


                <div class="navbar-divider"></div>


                <div class="navbar-page-info">

                    <span class="navbar-eyebrow">
                        GLASS STORE ADMIN
                    </span>

                    <h1>
                        @yield('page-title', 'Admin Dashboard')
                    </h1>

                    <p>
                        @yield(
                            'page-description',
                            'Manage your Glass & Aluminium business'
                        )
                    </p>

                </div>

            </div>


            {{-- RIGHT --}}

            <div class="navbar-right">


                {{-- SEARCH --}}

                <div class="navbar-search">

                    <i class="fa-solid fa-magnifying-glass"></i>

                    <input
                        type="text"
                        placeholder="Search..."
                        id="adminQuickSearch"
                    >

                    <span class="search-shortcut">
                        /
                    </span>

                </div>


                {{-- THEME TOGGLE --}}

                <button
                    type="button"
                    class="navbar-icon-btn theme-toggle"
                    id="themeToggle"
                    title="Toggle theme"
                    aria-label="Toggle theme"
                >

                    <i class="fa-solid fa-sun theme-icon-light"></i>

                    <i class="fa-solid fa-moon theme-icon-dark"></i>

                </button>


                {{-- NOTIFICATIONS --}}

                <div
                    class="admin-dropdown navbar-notif"
                    id="notifDropdown"
                >

                    <button
                        type="button"
                        class="navbar-icon-btn"
                        id="notifBtn"
                        title="Notifications"
                        aria-label="Notifications"
                    >

                        <i class="fa-regular fa-bell"></i>

                        <span class="notification-dot"></span>

                    </button>


                    <div
                        class="admin-dropdown-menu navbar-notif-menu"
                        id="notifMenu"
                    >

                        <div class="notif-menu-header">

                            <div>

                                <strong>
                                    Notifications
                                </strong>

                                <span>
                                    Stay updated with your store
                                </span>

                            </div>

                            <span class="notif-count-badge">
                                3 New
                            </span>

                        </div>


                        <div class="notif-list">


                            <a
                                href="{{ url('/admin/orders') }}"
                                class="notif-item unread"
                            >

                                <div class="notif-item-icon notif-icon-success">

                                    <i class="fa-solid fa-cart-shopping"></i>

                                </div>

                                <div class="notif-item-content">

                                    <p>
                                        <strong>
                                            New order #1042
                                        </strong>
                                        was placed
                                    </p>

                                    <span>
                                        2 minutes ago
                                    </span>

                                </div>

                                <i class="fa-solid fa-chevron-right notif-arrow"></i>

                            </a>


                            <a
                                href="{{ url('/admin/products') }}"
                                class="notif-item unread"
                            >

                                <div class="notif-item-icon notif-icon-warning">

                                    <i class="fa-solid fa-box"></i>

                                </div>

                                <div class="notif-item-content">

                                    <p>
                                        <strong>
                                            Low stock:
                                        </strong>
                                        Tempered Glass 8mm
                                    </p>

                                    <span>
                                        1 hour ago
                                    </span>

                                </div>

                                <i class="fa-solid fa-chevron-right notif-arrow"></i>

                            </a>


                            <a
                                href="{{ url('/admin/customers') }}"
                                class="notif-item unread"
                            >

                                <div class="notif-item-icon notif-icon-info">

                                    <i class="fa-solid fa-user"></i>

                                </div>

                                <div class="notif-item-content">

                                    <p>
                                        <strong>
                                            New customer
                                        </strong>
                                        registered
                                    </p>

                                    <span>
                                        3 hours ago
                                    </span>

                                </div>

                                <i class="fa-solid fa-chevron-right notif-arrow"></i>

                            </a>


                            <a
                                href="{{ url('/admin/orders') }}"
                                class="notif-item"
                            >

                                <div class="notif-item-icon notif-icon-primary">

                                    <i class="fa-solid fa-truck"></i>

                                </div>

                                <div class="notif-item-content">

                                    <p>
                                        Order
                                        <strong>
                                            #1039
                                        </strong>
                                        was shipped
                                    </p>

                                    <span>
                                        Yesterday
                                    </span>

                                </div>

                                <i class="fa-solid fa-chevron-right notif-arrow"></i>

                            </a>


                        </div>


                        <a
                            href="{{ url('/admin/notifications') }}"
                            class="notif-menu-footer"
                        >

                            View all notifications

                            <i class="fa-solid fa-arrow-right"></i>

                        </a>

                    </div>

                </div>


                {{-- MESSAGES --}}

                <button
                    type="button"
                    class="navbar-icon-btn"
                    title="Messages"
                    aria-label="Messages"
                >

                    <i class="fa-regular fa-envelope"></i>

                </button>


                <div class="navbar-divider"></div>


                {{-- USER --}}

                <div
                    class="admin-dropdown navbar-user"
                    id="userDropdown"
                >


                    <button
                        type="button"
                        class="navbar-user-trigger"
                        id="userBtn"
                        aria-label="User menu"
                    >

                        <div class="navbar-user-avatar">

                            {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}

                        </div>


                        <div class="navbar-user-info">

                            <strong>
                                {{ auth()->user()->name ?? 'Admin' }}
                            </strong>

                            <span>
                                Administrator
                            </span>

                        </div>


                        <i class="fa-solid fa-chevron-down navbar-user-arrow"></i>

                    </button>


                    <div
                        class="admin-dropdown-menu navbar-user-menu"
                        id="userMenu"
                    >

                        <div class="user-menu-header">

                            <div class="user-menu-avatar">

                                {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}

                            </div>

                            <div>

                                <strong>
                                    {{ auth()->user()->name ?? 'Admin' }}
                                </strong>

                                <span>
                                    Administrator
                                </span>

                            </div>

                        </div>


                        <div class="user-menu-divider"></div>


                        <a
                            href="{{ url('/admin/profile') }}"
                            class="admin-dropdown-item"
                        >

                            <i class="fa-solid fa-user"></i>

                            <span>
                                My Profile
                            </span>

                        </a>


                        <a
                            href="{{ url('/admin/settings') }}"
                            class="admin-dropdown-item"
                        >

                            <i class="fa-solid fa-gear"></i>

                            <span>
                                Settings
                            </span>

                        </a>


                        <a
                            href="{{ url('/') }}"
                            class="admin-dropdown-item"
                            target="_blank"
                        >

                            <i class="fa-solid fa-arrow-up-right-from-square"></i>

                            <span>
                                View Store
                            </span>

                        </a>


                        <div class="user-menu-divider"></div>


                        <form
                            action="{{ url('/logout') }}"
                            method="POST"
                        >

                            @csrf

                            <button
                                type="submit"
                                class="admin-dropdown-item dropdown-logout"
                            >

                                <i class="fa-solid fa-right-from-bracket"></i>

                                <span>
                                    Logout
                                </span>

                            </button>

                        </form>


                    </div>

                </div>

            </div>

        </header>


        {{-- =====================================================
            PAGE CONTENT
        ====================================================== --}}

        <main class="admin-content">


            {{-- SUCCESS ALERT --}}

            @if(session('success'))

                <div
                    class="admin-alert alert-success"
                    id="successAlert"
                >

                    <div class="alert-icon">

                        <i class="fa-solid fa-check"></i>

                    </div>

                    <div class="alert-content">

                        <strong>
                            Success
                        </strong>

                        <span>
                            {{ session('success') }}
                        </span>

                    </div>

                    <button
                        type="button"
                        class="alert-close"
                        onclick="this.closest('.admin-alert').remove()"
                    >

                        <i class="fa-solid fa-xmark"></i>

                    </button>

                </div>

            @endif


            {{-- ERROR ALERT --}}

            @if(session('error'))

                <div
                    class="admin-alert alert-danger"
                    id="errorAlert"
                >

                    <div class="alert-icon">

                        <i class="fa-solid fa-circle-exclamation"></i>

                    </div>

                    <div class="alert-content">

                        <strong>
                            Error
                        </strong>

                        <span>
                            {{ session('error') }}
                        </span>

                    </div>

                    <button
                        type="button"
                        class="alert-close"
                        onclick="this.closest('.admin-alert').remove()"
                    >

                        <i class="fa-solid fa-xmark"></i>

                    </button>

                </div>

            @endif


            {{-- VALIDATION ERRORS --}}

            @if($errors->any())

                <div class="admin-alert alert-danger">

                    <div class="alert-icon">

                        <i class="fa-solid fa-triangle-exclamation"></i>

                    </div>

                    <div class="alert-content">

                        <strong>
                            Please check the form
                        </strong>

                        <span>
                            {{ $errors->first() }}
                        </span>

                    </div>

                    <button
                        type="button"
                        class="alert-close"
                        onclick="this.closest('.admin-alert').remove()"
                    >

                        <i class="fa-solid fa-xmark"></i>

                    </button>

                </div>

            @endif


            {{-- =================================================
                PAGE CONTENT
            ================================================== --}}

            @yield('content')


        </main>


        {{-- =====================================================
            FOOTER
        ====================================================== --}}

        <footer class="admin-footer">


            <div class="footer-left">

                <div class="footer-brand">

                    <span class="footer-brand-icon">

                        <i class="fa-solid fa-gem"></i>

                    </span>

                    <strong>
                        Glass Store
                    </strong>

                </div>

                <span class="footer-separator">
                    •
                </span>

                <span>
                    Admin Panel
                </span>

                <span class="footer-separator">
                    •
                </span>

                <span class="footer-version">
                    v1.0.0
                </span>

            </div>


            <div class="footer-right">

                <span>
                    © {{ date('Y') }} Glass Store
                </span>

                <span class="footer-made">
                    Crafted with
                    <i class="fa-solid fa-heart"></i>
                    for better management
                </span>


                <button
                    type="button"
                    class="footer-back-to-top"
                    id="footerBackToTop"
                    title="Back to top"
                    aria-label="Back to top"
                >

                    <i class="fa-solid fa-arrow-up"></i>

                </button>

            </div>


        </footer>


    </div>

</div>


{{-- =========================================================
    BOOTSTRAP JS
========================================================= --}}

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>


{{-- =========================================================
    ADMIN JAVASCRIPT
    Everything stays inside this layout
========================================================= --}}

<script>

document.addEventListener('DOMContentLoaded', function () {


    /* =========================================================
       ELEMENTS
    ========================================================== */

    const root = document.documentElement;

    const wrapper = document.getElementById('adminWrapper');

    const sidebar = document.getElementById('adminSidebar');

    const sidebarToggle = document.getElementById('sidebarToggle');

    const sidebarOverlay = document.getElementById('sidebarOverlay');

    const themeToggle = document.getElementById('themeToggle');

    const notifBtn = document.getElementById('notifBtn');

    const notifMenu = document.getElementById('notifMenu');

    const notifDropdown = document.getElementById('notifDropdown');

    const userBtn = document.getElementById('userBtn');

    const userMenu = document.getElementById('userMenu');

    const userDropdown = document.getElementById('userDropdown');

    const backToTop = document.getElementById('footerBackToTop');

    const quickSearch = document.getElementById('adminQuickSearch');


    /* =========================================================
       THEME
    ========================================================== */

    const savedTheme = localStorage.getItem('adminTheme');

    if (savedTheme === 'dark') {

        root.setAttribute('data-theme', 'dark');

    }


    themeToggle?.addEventListener('click', function () {

        const isDark =
            root.getAttribute('data-theme') === 'dark';


        if (isDark) {

            root.removeAttribute('data-theme');

            localStorage.setItem(
                'adminTheme',
                'light'
            );

        } else {

            root.setAttribute(
                'data-theme',
                'dark'
            );

            localStorage.setItem(
                'adminTheme',
                'dark'
            );

        }

    });


    /* =========================================================
       SIDEBAR DESKTOP COLLAPSE
    ========================================================== */

    sidebarToggle?.addEventListener('click', function () {

        if (window.innerWidth <= 992) {

            sidebar?.classList.toggle('mobile-open');

            sidebarOverlay?.classList.toggle('show');

            document.body.classList.toggle(
                'sidebar-open'
            );

        } else {

            wrapper?.classList.toggle(
                'sidebar-collapsed'
            );

            const collapsed =
                wrapper?.classList.contains(
                    'sidebar-collapsed'
                );

            localStorage.setItem(
                'adminSidebarCollapsed',
                collapsed ? 'true' : 'false'
            );

        }

    });


    /* =========================================================
       RESTORE DESKTOP SIDEBAR
    ========================================================== */

    if (
        window.innerWidth > 992 &&
        localStorage.getItem('adminSidebarCollapsed') === 'true'
    ) {

        wrapper?.classList.add(
            'sidebar-collapsed'
        );

    }


    /* =========================================================
       CLOSE MOBILE SIDEBAR
    ========================================================== */

    function closeMobileSidebar() {

        sidebar?.classList.remove(
            'mobile-open'
        );

        sidebarOverlay?.classList.remove(
            'show'
        );

        document.body.classList.remove(
            'sidebar-open'
        );

    }


    sidebarOverlay?.addEventListener(
        'click',
        closeMobileSidebar
    );


    /* =========================================================
       CLOSE SIDEBAR WHEN LINK IS CLICKED ON MOBILE
    ========================================================== */

    document
        .querySelectorAll('.sidebar-link')
        .forEach(function (link) {

            link.addEventListener(
                'click',
                function () {

                    if (window.innerWidth <= 992) {

                        closeMobileSidebar();

                    }

                }
            );

        });


    /* =========================================================
       WINDOW RESIZE
    ========================================================== */

    window.addEventListener(
        'resize',
        function () {

            if (window.innerWidth > 992) {

                closeMobileSidebar();

            }

        }
    );


    /* =========================================================
       NOTIFICATION DROPDOWN
    ========================================================== */

    notifBtn?.addEventListener(
        'click',
        function (event) {

            event.stopPropagation();

            notifMenu?.classList.toggle('show');

            notifDropdown?.classList.toggle(
                'menu-open'
            );

            userMenu?.classList.remove('show');

            userDropdown?.classList.remove(
                'menu-open'
            );

        }
    );


    notifMenu?.addEventListener(
        'click',
        function (event) {

            event.stopPropagation();

        }
    );


    /* =========================================================
       USER DROPDOWN
    ========================================================== */

    userBtn?.addEventListener(
        'click',
        function (event) {

            event.stopPropagation();

            userMenu?.classList.toggle('show');

            userDropdown?.classList.toggle(
                'menu-open'
            );

            notifMenu?.classList.remove('show');

            notifDropdown?.classList.remove(
                'menu-open'
            );

        }
    );


    userMenu?.addEventListener(
        'click',
        function (event) {

            event.stopPropagation();

        }
    );


    /* =========================================================
       CLOSE DROPDOWNS
    ========================================================== */

    document.addEventListener(
        'click',
        function () {

            notifMenu?.classList.remove('show');

            notifDropdown?.classList.remove(
                'menu-open'
            );

            userMenu?.classList.remove('show');

            userDropdown?.classList.remove(
                'menu-open'
            );

        }
    );


    /* =========================================================
       BACK TO TOP
    ========================================================== */

    function toggleBackToTop() {

        if (!backToTop) return;

        if (window.scrollY > 250) {

            backToTop.classList.add('show');

        } else {

            backToTop.classList.remove('show');

        }

    }


    window.addEventListener(
        'scroll',
        toggleBackToTop,
        {
            passive: true
        }
    );


    toggleBackToTop();


    backToTop?.addEventListener(
        'click',
        function () {

            window.scrollTo({

                top: 0,

                behavior: 'smooth'

            });

        }
    );


    /* =========================================================
       KEYBOARD SEARCH
    ========================================================== */

    document.addEventListener(
        'keydown',
        function (event) {

            if (
                event.key === '/' &&
                document.activeElement !== quickSearch
            ) {

                event.preventDefault();

                quickSearch?.focus();

            }

            if (
                event.key === 'Escape'
            ) {

                notifMenu?.classList.remove(
                    'show'
                );

                userMenu?.classList.remove(
                    'show'
                );

                quickSearch?.blur();

            }

        }
    );


    /* =========================================================
       AUTO HIDE ALERTS
    ========================================================== */

    setTimeout(function () {

        document
            .querySelectorAll(
                '.admin-alert'
            )
            .forEach(function (alert) {

                alert.classList.add(
                    'alert-hiding'
                );

                setTimeout(
                    function () {

                        alert.remove();

                    },
                    350
                );

            });

    }, 6000);


});

</script>


</body>

</html>