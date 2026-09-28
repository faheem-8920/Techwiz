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
        @yield('title', 'Admin Dashboard') | CampusCoin
    </title>


    {{-- GOOGLE FONT --}}

    <link
        rel="preconnect"
        href="https://fonts.googleapis.com"
    >

    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet"
    >


    {{-- FONT AWESOME --}}

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    >


    {{-- BOOTSTRAP --}}

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >


    {{-- ADMIN CSS --}}

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


<div
    class="admin-wrapper"
    id="adminWrapper"
>


    {{-- MOBILE SIDEBAR OVERLAY --}}

    <div
        class="sidebar-overlay"
        id="sidebarOverlay"
    ></div>


    {{-- =====================================================
        SIDEBAR
    ====================================================== --}}

    <aside
        class="admin-sidebar"
        id="adminSidebar"
    >


        {{-- BRAND --}}

        <div class="sidebar-brand">

            <a href="{{ url('/admindashboard') }}">

                <div class="brand-icon">

                    <i class="fa-solid fa-coins"></i>

                </div>

                <div class="brand-text">

                    <span class="brand-name">

                        Campus<span>Coin</span>

                    </span>

                    <small>
                        Student Finance
                    </small>

                </div>

            </a>

        </div>


        {{-- SIDEBAR NAVIGATION --}}

        <nav class="sidebar-nav">


            {{-- MAIN --}}

            <div class="nav-section-title">
                MAIN
            </div>


            <a
                href="/admindashboard"
                class="sidebar-link {{ request()->is('admindashboard') ? 'active' : '' }}"
            >

                <i class="fa-solid fa-chart-pie"></i>

                <span>
                    Dashboard
                </span>

            </a>


            {{-- MANAGEMENT --}}

            <div class="nav-section-title">
                MANAGEMENT
            </div>


            {{-- CATEGORIES --}}

            <a
                href="{{ url('/allcategories') }}"
                class="sidebar-link {{ request()->is('allcategories') || request()->is('addcategory') || request()->is('editcategory*') ? 'active' : '' }}"
            >

                <i class="fa-solid fa-layer-group"></i>

                <span>
                    Categories
                </span>

            </a>


            {{-- USERS --}}

            <a
                href="{{ url('/allusers') }}"
                class="sidebar-link {{ request()->is('allusers') || request()->is('deactivateuser*') || request()->is('activateuser*') || request()->is('deleteuser*') ? 'active' : '' }}"
            >

                <i class="fa-solid fa-users"></i>

                <span>
                    Users
                </span>

            </a>


            {{-- TRANSACTIONS --}}

            <a
                href="{{ url('/alltransactions') }}"
                class="sidebar-link {{ request()->is('alltransactions') || request()->is('addtransaction') || request()->is('edittransaction*') ? 'active' : '' }}"
            >

                <i class="fa-solid fa-money-bill-transfer"></i>

                <span>
                    Transactions
                </span>

            </a>


            {{-- BUDGETS --}}

            <a
                href="{{ url('/allusersbudgets') }}"
                class="sidebar-link {{ request()->is('allusersbudgets') || request()->is('deleteuserbudget*') ? 'active' : '' }}"
            >

                <i class="fa-solid fa-wallet"></i>

                <span>
                    User Budgets
                </span>

            </a>


            {{-- ANNOUNCEMENTS --}}

            <a
                href="{{ url('/allannouncements') }}"
                class="sidebar-link {{ request()->is('allannouncements') || request()->is('addannouncement') || request()->is('editannouncement*') || request()->is('deleteannouncement*') || request()->is('activateannouncement*') || request()->is('deactivateannouncement*') ? 'active' : '' }}"
            >

                <i class="fa-solid fa-bullhorn"></i>

                <span>
                    Announcements
                </span>

            </a>


            {{-- REPORTS --}}

            <div class="nav-section-title">
                ANALYTICS
            </div>


            <a
                href="{{ url('/alltransactions') }}"
                class="sidebar-link"
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


            {{-- PROFILE --}}

            <a
                href="{{ url('/admin/profile') }}"
                class="sidebar-link {{ request()->is('admin/profile*') ? 'active' : '' }}"
            >

                <i class="fa-solid fa-user"></i>

                <span>
                    My Profile
                </span>

            </a>


            {{-- SETTINGS --}}

            <a
                href="{{ url('/admin/settings') }}"
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


            {{-- LOGOUT --}}

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


    {{-- =====================================================
        MAIN AREA
    ====================================================== --}}

    <div
        class="admin-main"
        id="adminMain"
    >


        {{-- =================================================
            NAVBAR
        ================================================== --}}

        <header class="admin-navbar">


            {{-- LEFT SIDE --}}

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
                        CAMPUSCOIN ADMIN
                    </span>

                    <h1>
                        @yield('page-title', 'Admin Dashboard')
                    </h1>

                    <p>
                        @yield(
                            'page-description',
                            'Manage your CampusCoin student finance platform'
                        )
                    </p>

                </div>


            </div>


            {{-- RIGHT SIDE --}}

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
                                    CampusCoin Updates
                                </strong>

                                <span>
                                    Recent platform activity
                                </span>

                            </div>

                            <span class="notif-count-badge">
                                3 New
                            </span>

                        </div>


                        <div class="notif-list">


                            {{-- NEW TRANSACTION --}}

                            <a
                                href="{{ url('/alltransactions') }}"
                                class="notif-item unread"
                            >

                                <div class="notif-item-icon notif-icon-success">

                                    <i class="fa-solid fa-money-bill-transfer"></i>

                                </div>

                                <div class="notif-item-content">

                                    <p>

                                        <strong>
                                            New transaction
                                        </strong>

                                        was recorded

                                    </p>

                                    <span>
                                        Recent activity
                                    </span>

                                </div>

                                <i class="fa-solid fa-chevron-right notif-arrow"></i>

                            </a>


                            {{-- BUDGET --}}

                            <a
                                href="{{ url('/allusersbudgets') }}"
                                class="notif-item unread"
                            >

                                <div class="notif-item-icon notif-icon-warning">

                                    <i class="fa-solid fa-wallet"></i>

                                </div>

                                <div class="notif-item-content">

                                    <p>

                                        <strong>
                                            Budget activity
                                        </strong>

                                        requires review

                                    </p>

                                    <span>
                                        Recent activity
                                    </span>

                                </div>

                                <i class="fa-solid fa-chevron-right notif-arrow"></i>

                            </a>


                            {{-- NEW USER --}}

                            <a
                                href="{{ url('/allusers') }}"
                                class="notif-item unread"
                            >

                                <div class="notif-item-icon notif-icon-info">

                                    <i class="fa-solid fa-user-plus"></i>

                                </div>

                                <div class="notif-item-content">

                                    <p>

                                        <strong>
                                            Student account
                                        </strong>

                                        activity detected

                                    </p>

                                    <span>
                                        Recent activity
                                    </span>

                                </div>

                                <i class="fa-solid fa-chevron-right notif-arrow"></i>

                            </a>


                            {{-- CATEGORY --}}

                            <a
                                href="{{ url('/allcategories') }}"
                                class="notif-item"
                            >

                                <div class="notif-item-icon notif-icon-primary">

                                    <i class="fa-solid fa-layer-group"></i>

                                </div>

                                <div class="notif-item-content">

                                    <p>

                                        <strong>
                                            Category
                                        </strong>

                                        management update

                                    </p>

                                    <span>
                                        Recent activity
                                    </span>

                                </div>

                                <i class="fa-solid fa-chevron-right notif-arrow"></i>

                            </a>


                        </div>


                        <a
                            href="{{ url('/allannouncements') }}"
                            class="notif-menu-footer"
                        >

                            View announcements

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


                {{-- USER DROPDOWN --}}

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
                                View Login Page
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


        {{-- =================================================
            PAGE CONTENT
        ================================================== --}}

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


            {{-- PAGE CONTENT --}}

            @yield('content')


        </main>


        {{-- =================================================
            FOOTER
        ================================================== --}}

        <footer class="admin-footer">


            <div class="footer-left">

                <div class="footer-brand">

                    <span class="footer-brand-icon">

                        <i class="fa-solid fa-coins"></i>

                    </span>

                    <strong>
                        CampusCoin
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
                    © {{ date('Y') }} CampusCoin
                </span>


                <span class="footer-made">

                    Crafted for smarter student budgeting

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


{{-- BOOTSTRAP JS --}}

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
></script>


{{-- ADMIN JAVASCRIPT --}}

<script>

document.addEventListener('DOMContentLoaded', function () {


    /* =========================================================
       ELEMENTS
    ========================================================== */

    const root = document.documentElement;

    const wrapper =
        document.getElementById('adminWrapper');

    const sidebar =
        document.getElementById('adminSidebar');

    const sidebarToggle =
        document.getElementById('sidebarToggle');

    const sidebarOverlay =
        document.getElementById('sidebarOverlay');

    const themeToggle =
        document.getElementById('themeToggle');

    const notifBtn =
        document.getElementById('notifBtn');

    const notifMenu =
        document.getElementById('notifMenu');

    const notifDropdown =
        document.getElementById('notifDropdown');

    const userBtn =
        document.getElementById('userBtn');

    const userMenu =
        document.getElementById('userMenu');

    const userDropdown =
        document.getElementById('userDropdown');

    const backToTop =
        document.getElementById('footerBackToTop');

    const quickSearch =
        document.getElementById('adminQuickSearch');


    /* =========================================================
       THEME
    ========================================================== */

    const savedTheme =
        localStorage.getItem('adminTheme');


    if (savedTheme === 'dark') {

        root.setAttribute(
            'data-theme',
            'dark'
        );

    }


    themeToggle?.addEventListener(
        'click',
        function () {

            const isDark =
                root.getAttribute('data-theme') === 'dark';


            if (isDark) {

                root.removeAttribute(
                    'data-theme'
                );

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

        }
    );


    /* =========================================================
       SIDEBAR
    ========================================================== */

    sidebarToggle?.addEventListener(
        'click',
        function () {

            if (window.innerWidth <= 992) {

                sidebar?.classList.toggle(
                    'mobile-open'
                );

                sidebarOverlay?.classList.toggle(
                    'show'
                );

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

        }
    );


    /* =========================================================
       RESTORE SIDEBAR
    ========================================================== */

    if (
        window.innerWidth > 992 &&
        localStorage.getItem(
            'adminSidebarCollapsed'
        ) === 'true'
    ) {

        wrapper?.classList.add(
            'sidebar-collapsed'
        );

    }


    /* =========================================================
       MOBILE SIDEBAR CLOSE
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
       NOTIFICATIONS
    ========================================================== */

    notifBtn?.addEventListener(
        'click',
        function (event) {

            event.stopPropagation();


            notifMenu?.classList.toggle(
                'show'
            );


            notifDropdown?.classList.toggle(
                'menu-open'
            );


            userMenu?.classList.remove(
                'show'
            );


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


            userMenu?.classList.toggle(
                'show'
            );


            userDropdown?.classList.toggle(
                'menu-open'
            );


            notifMenu?.classList.remove(
                'show'
            );


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

            notifMenu?.classList.remove(
                'show'
            );

            notifDropdown?.classList.remove(
                'menu-open'
            );

            userMenu?.classList.remove(
                'show'
            );

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

            backToTop.classList.add(
                'show'
            );

        } else {

            backToTop.classList.remove(
                'show'
            );

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

    setTimeout(
        function () {

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

        },
        6000
    );


});

</script>


</body>

</html>
