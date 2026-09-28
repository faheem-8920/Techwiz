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

    <style>
        :root {
            --sb-top: #e6f2ff;
            --sb-bottom: #c9e2fb;
            --sb-line: #b5d3f2;
            --sb-ink: #14365a;
            --sb-soft: #4d6d8e;
            --sb-mute: #86a3c0;
            --brand: #2575fc;
            --brand-2: #4facfe;
        }

        /* ---------- SIDEBAR CONTAINER ---------- */
        .admin-wrapper .admin-sidebar {
            background: linear-gradient(180deg, var(--sb-top) 0%, var(--sb-bottom) 100%) !important;
            border-right: 1px solid var(--sb-line) !important;
            box-shadow: 6px 0 30px rgba(37, 117, 252, 0.12) !important;
            font-family: 'Poppins', sans-serif;
        }

        /* ---------- BRAND ---------- */
        .admin-wrapper .sidebar-brand {
            border-bottom: 1px solid var(--sb-line) !important;
        }

        .admin-wrapper .sidebar-brand a {
            text-decoration: none;
        }

        .admin-wrapper .brand-icon {
            background: linear-gradient(135deg, var(--brand), var(--brand-2)) !important;
            color: #fff !important;
            border-radius: 14px;
            box-shadow: 0 8px 18px rgba(37, 117, 252, 0.35);
        }

        .admin-wrapper .brand-name {
            color: var(--sb-ink) !important;
            font-weight: 700;
        }

        .admin-wrapper .brand-name span {
            color: var(--brand) !important;
        }

        .admin-wrapper .brand-text small {
            color: var(--sb-mute) !important;
        }

        /* ---------- SECTION TITLES ---------- */
        .admin-wrapper .nav-section-title {
            color: var(--sb-mute) !important;
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 1.3px;
            padding: 0 18px;
            margin: 20px 0 6px;
        }

        /* ---------- LINKS ---------- */
        .admin-wrapper .sidebar-link {
            color: var(--sb-soft) !important;
            font-weight: 500;
            text-decoration: none;
            border-radius: 12px;
            margin: 3px 10px;
            padding: 10px 14px;
            transition: all 0.25s ease;
        }

        .admin-wrapper .sidebar-link i {
            color: var(--brand) !important;
            width: 22px;
            text-align: center;
            transition: transform 0.25s ease;
        }

        .admin-wrapper .sidebar-link:hover {
            background: rgba(255, 255, 255, 0.7) !important;
            color: var(--sb-ink) !important;
            transform: translateX(4px);
            box-shadow: 0 4px 14px rgba(37, 117, 252, 0.12);
        }

        .admin-wrapper .sidebar-link:hover i {
            transform: scale(1.15);
        }

        .admin-wrapper .sidebar-link.active {
            background: linear-gradient(135deg, var(--brand), var(--brand-2)) !important;
            color: #fff !important;
            box-shadow: 0 8px 20px rgba(37, 117, 252, 0.33);
        }

        .admin-wrapper .sidebar-link.active i {
            color: #fff !important;
        }

        /* ---------- BOTTOM USER CARD ---------- */
        .admin-wrapper .sidebar-bottom {
            border-top: 1px solid var(--sb-line) !important;
            padding: 14px;
        }

        .admin-wrapper .sidebar-user {
            background: rgba(255, 255, 255, 0.7) !important;
            border: 1px solid var(--sb-line);
            border-radius: 14px;
            padding: 10px 12px;
        }

        .admin-wrapper .sidebar-user-avatar {
            background: linear-gradient(135deg, var(--brand), var(--brand-2)) !important;
            color: #fff !important;
            font-weight: 600;
        }

        .admin-wrapper .sidebar-user .user-info strong {
            color: var(--sb-ink) !important;
        }

        .admin-wrapper .sidebar-user .user-info small {
            color: var(--sb-mute) !important;
        }

        .admin-wrapper .sidebar-user-status {
            background: #22c55e !important;
            box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.25);
        }

        /* ---------- LOGOUT ---------- */
        .admin-wrapper .sidebar-logout {
            background: rgba(239, 68, 68, 0.08) !important;
            color: #dc2626 !important;
            border: 1px solid rgba(239, 68, 68, 0.25) !important;
            border-radius: 12px;
            font-weight: 500;
            transition: all 0.25s ease;
        }

        .admin-wrapper .sidebar-logout:hover {
            background: #ef4444 !important;
            color: #fff !important;
        }

        /* ---------- SCROLLBAR ---------- */
        .admin-wrapper .sidebar-nav {
            scrollbar-width: thin;
            scrollbar-color: #9cc4ef transparent;
        }

        .admin-wrapper .sidebar-nav::-webkit-scrollbar {
            width: 6px;
        }

        .admin-wrapper .sidebar-nav::-webkit-scrollbar-thumb {
            background: #9cc4ef;
            border-radius: 10px;
        }

        /* ---------- MATCHING PAGE POLISH ---------- */
        body {
            background: linear-gradient(160deg, #f2f8ff 0%, #e4f0ff 100%) fixed;
            font-family: 'Poppins', sans-serif;
        }

        .admin-wrapper .admin-navbar {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid #d4e6f8;
            box-shadow: 0 4px 20px rgba(37, 117, 252, 0.07);
        }

        .admin-wrapper .navbar-eyebrow {
            color: var(--brand);
            font-weight: 600;
            letter-spacing: 1.2px;
        }

        .admin-wrapper .navbar-icon-btn,
        .admin-wrapper .sidebar-toggle {
            background: #eaf4ff;
            color: var(--brand);
            border: 1px solid #d4e6f8;
            border-radius: 12px;
            transition: all 0.2s ease;
        }

        .admin-wrapper .navbar-icon-btn:hover,
        .admin-wrapper .sidebar-toggle:hover {
            background: var(--brand);
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 6px 14px rgba(37, 117, 252, 0.3);
        }

        .admin-wrapper .navbar-search {
            background: #eaf4ff;
            border: 1px solid #d4e6f8;
            border-radius: 12px;
        }

        .admin-wrapper .navbar-search:focus-within {
            border-color: var(--brand);
            box-shadow: 0 0 0 4px rgba(37, 117, 252, 0.15);
        }

        .admin-wrapper .navbar-user-avatar,
        .admin-wrapper .user-menu-avatar {
            background: linear-gradient(135deg, var(--brand), var(--brand-2));
            color: #fff;
        }

        .admin-wrapper .admin-dropdown-menu {
            border: 1px solid #d4e6f8;
            border-radius: 16px;
            box-shadow: 0 20px 45px rgba(37, 117, 252, 0.18);
        }

        .admin-wrapper .admin-dropdown-item:hover {
            background: #eaf4ff;
            color: var(--brand);
        }

        .admin-wrapper .admin-footer {
            background: rgba(255, 255, 255, 0.8);
            border-top: 1px solid #d4e6f8;
        }

        /* ---------- DARK MODE (your existing toggle) ---------- */
        :root[data-theme="dark"] {
            --sb-top: #16294a;
            --sb-bottom: #0f1d33;
            --sb-line: #24406a;
            --sb-ink: #eaf3ff;
            --sb-soft: #b8cfe8;
            --sb-mute: #6f8bab;
        }

        :root[data-theme="dark"] body {
            background: linear-gradient(160deg, #0b1626 0%, #0f2038 100%) fixed;
        }

        :root[data-theme="dark"] .admin-wrapper .sidebar-user {
            background: rgba(255, 255, 255, 0.06) !important;
        }

        :root[data-theme="dark"] .admin-wrapper .sidebar-link:hover {
            background: rgba(79, 172, 254, 0.15) !important;
        }

        :root[data-theme="dark"] .admin-wrapper .admin-navbar,
        :root[data-theme="dark"] .admin-wrapper .admin-footer {
            background: rgba(15, 29, 48, 0.92);
            border-color: #24406a;
        }

        :root[data-theme="dark"] .admin-wrapper .navbar-icon-btn,
        :root[data-theme="dark"] .admin-wrapper .sidebar-toggle,
        :root[data-theme="dark"] .admin-wrapper .navbar-search {
            background: #182c47;
            border-color: #24406a;
        }
    </style>

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



    window.addEventListener(
        'resize',
        function () {

            if (window.innerWidth > 992) {

                closeMobileSidebar();

            }

        }
    );



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
