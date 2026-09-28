<<<<<<< HEAD
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

            <a href="{{ url('/admin/dashboard') }}">

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
=======
@extends('admin.layouts.app')

@section('content')

<style>
    .admin-dashboard {
        padding: 28px;
        background: #f4f7fa;
        min-height: calc(100vh - 78px);
        font-family: 'Poppins', sans-serif;
    }

    .dashboard-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 28px;
    }

    .dashboard-header-left h2 {
        margin: 0 0 6px;
        color: #062b4a;
        font-size: 28px;
        font-weight: 800;
    }

    .dashboard-header-left p {
        margin: 0;
        color: #64748b;
        font-size: 14px;
    }

    .dashboard-admin-badge {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 10px 16px;
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        color: #0b3a66;
        font-size: 13px;
        font-weight: 600;
        box-shadow: 0 5px 20px rgba(15, 23, 42, 0.05);
    }

    .dashboard-admin-badge i {
        width: 34px;
        height: 34px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 9px;
        background: #eff6ff;
        color: #1769aa;
    }

    /* Main Stats */

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 18px;
        margin-bottom: 25px;
    }

    .stat-card {
        position: relative;
        overflow: hidden;
        background: #ffffff;
        border: 1px solid #e5eaf0;
        border-radius: 16px;
        padding: 21px;
        box-shadow: 0 8px 28px rgba(15, 23, 42, 0.06);
        transition: all 0.25s ease;
    }

    .stat-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 14px 35px rgba(15, 23, 42, 0.10);
    }

    .stat-card::after {
        content: "";
        position: absolute;
        width: 80px;
        height: 80px;
        right: -30px;
        bottom: -30px;
        border-radius: 50%;
        background: rgba(23, 105, 170, 0.05);
    }

    .stat-top {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 17px;
    }

    .stat-icon {
        width: 48px;
        height: 48px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 13px;
        font-size: 19px;
    }

    .stat-icon.blue {
        background: #eff6ff;
        color: #1769aa;
    }

    .stat-icon.green {
        background: #ecfdf5;
        color: #059669;
    }

    .stat-icon.red {
        background: #fff1f2;
        color: #e11d48;
    }

    .stat-icon.orange {
        background: #fff7ed;
        color: #ea580c;
    }

    .stat-icon.purple {
        background: #f5f3ff;
        color: #7c3aed;
    }

    .stat-icon.cyan {
        background: #ecfeff;
        color: #0891b2;
    }

    .stat-label {
        color: #64748b;
        font-size: 13px;
        font-weight: 600;
        margin-bottom: 5px;
    }

    .stat-value {
        color: #172033;
        font-size: 25px;
        font-weight: 800;
        line-height: 1.2;
    }

    .stat-description {
        margin-top: 9px;
        color: #94a3b8;
        font-size: 11px;
    }

    /* Section */

    .dashboard-section {
        margin-bottom: 25px;
    }

    .section-heading {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 15px;
    }

    .section-heading h4 {
        margin: 0;
        color: #172033;
        font-size: 17px;
        font-weight: 750;
    }

    .section-heading span {
        color: #94a3b8;
        font-size: 12px;
    }

    /* Management Cards */

    .management-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 18px;
    }

    .management-card {
        background: #ffffff;
        border: 1px solid #e5eaf0;
        border-radius: 15px;
        padding: 20px;
        box-shadow: 0 7px 25px rgba(15, 23, 42, 0.05);
    }

    .management-header {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 18px;
    }

    .management-icon {
        width: 43px;
        height: 43px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 11px;
        background: #eff6ff;
        color: #1769aa;
    }

    .management-header h5 {
        margin: 0 0 3px;
        color: #172033;
        font-size: 14px;
        font-weight: 750;
    }

    .management-header span {
        color: #94a3b8;
        font-size: 11px;
    }

    .management-stats {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 10px;
    }

    .mini-stat {
        padding: 13px;
        border-radius: 11px;
        background: #f8fafc;
        border: 1px solid #edf1f5;
    }

    .mini-stat-label {
        display: block;
        margin-bottom: 5px;
        color: #64748b;
        font-size: 11px;
    }

    .mini-stat-value {
        color: #172033;
        font-size: 18px;
        font-weight: 800;
    }

    .mini-stat-value.active {
        color: #059669;
    }

    .mini-stat-value.inactive {
        color: #e11d48;
    }

    /* Financial Overview */

    .financial-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 18px;
    }

    .financial-card {
        display: flex;
        align-items: center;
        gap: 17px;
        background: #ffffff;
        border: 1px solid #e5eaf0;
        border-radius: 15px;
        padding: 20px;
        box-shadow: 0 7px 25px rgba(15, 23, 42, 0.05);
    }

    .financial-icon {
        width: 52px;
        height: 52px;
        flex: 0 0 52px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 13px;
        font-size: 20px;
    }

    .income-icon {
        background: #ecfdf5;
        color: #059669;
    }

    .expense-icon {
        background: #fff1f2;
        color: #e11d48;
    }

    .financial-info span {
        display: block;
        color: #64748b;
        font-size: 12px;
        margin-bottom: 5px;
    }

    .financial-info strong {
        display: block;
        color: #172033;
        font-size: 22px;
        font-weight: 800;
    }

    /* Quick Overview */

    .overview-card {
        background: #ffffff;
        border: 1px solid #e5eaf0;
        border-radius: 15px;
        padding: 21px;
        box-shadow: 0 7px 25px rgba(15, 23, 42, 0.05);
    }

    .overview-list {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 12px;
    }

    .overview-item {
        padding: 15px;
        border-radius: 11px;
        background: #f8fafc;
        border: 1px solid #edf1f5;
    }

    .overview-item i {
        margin-bottom: 9px;
        color: #1769aa;
        font-size: 17px;
    }

    .overview-item span {
        display: block;
        color: #64748b;
        font-size: 11px;
        margin-bottom: 4px;
    }

    .overview-item strong {
        color: #172033;
        font-size: 17px;
        font-weight: 800;
    }

    /* Responsive */

    @media (max-width: 1200px) {

        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .management-grid {
            grid-template-columns: 1fr 1fr;
        }

        .overview-list {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 768px) {

        .admin-dashboard {
            padding: 20px 15px;
        }

        .dashboard-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .dashboard-admin-badge {
            width: 100%;
        }

        .stats-grid,
        .management-grid,
        .financial-grid {
            grid-template-columns: 1fr;
        }

        .overview-list {
            grid-template-columns: 1fr 1fr;
        }

        .dashboard-header-left h2 {
            font-size: 24px;
        }
    }

    @media (max-width: 480px) {

        .overview-list {
            grid-template-columns: 1fr;
        }

        .stat-value {
            font-size: 22px;
        }

        .financial-card {
            padding: 16px;
        }

        .financial-info strong {
            font-size: 19px;
        }
    }
</style>

<div class="admin-dashboard">

<!-- Header -->

<div class="dashboard-header">

    <div class="dashboard-header-left">

        <h2>
            Admin Dashboard
        </h2>

        <p>
            Monitor CampusCoin users, transactions, budgets and announcements.
        </p>

    </div>

    <div class="dashboard-admin-badge">

        <i class="fa-solid fa-user-shield"></i>

        <span>
            Administrator
        </span>

    </div>

</div>


<!-- Main Statistics -->

<div class="stats-grid">

    <!-- Users -->

    <div class="stat-card">

        <div class="stat-top">

            <div>
                <div class="stat-label">
                    Total Users
                </div>

                <div class="stat-value">
                    {{ $totalUsers }}
                </div>
            </div>

            <div class="stat-icon blue">
                <i class="fa-solid fa-users"></i>
            </div>

        </div>

        <div class="stat-description">
            Registered CampusCoin users
        </div>

    </div>


    <!-- Transactions -->

    <div class="stat-card">

        <div class="stat-top">

            <div>
                <div class="stat-label">
                    Transactions
                </div>

                <div class="stat-value">
                    {{ $totalTransactions }}
                </div>
            </div>

            <div class="stat-icon cyan">
                <i class="fa-solid fa-arrow-right-arrow-left"></i>
            </div>

        </div>

        <div class="stat-description">
            Total recorded transactions
        </div>

    </div>


    <!-- Budgets -->

    <div class="stat-card">

        <div class="stat-top">

            <div>
                <div class="stat-label">
                    Total Budgets
                </div>

                <div class="stat-value">
                    {{ $totalBudgets }}
                </div>
            </div>

            <div class="stat-icon purple">
                <i class="fa-solid fa-wallet"></i>
            </div>

        </div>

        <div class="stat-description">
            Budgets created by users
        </div>

    </div>


    <!-- Categories -->

    <div class="stat-card">

        <div class="stat-top">

            <div>
                <div class="stat-label">
                    Total Categories
                </div>

                <div class="stat-value">
                    {{ $totalcategories }}
                </div>
            </div>

            <div class="stat-icon orange">
                <i class="fa-solid fa-layer-group"></i>
            </div>

        </div>

        <div class="stat-description">
            Income and expense categories
        </div>

    </div>

</div>


<!-- Financial Overview -->

<div class="dashboard-section">

    <div class="section-heading">

        <h4>
            Financial Overview
        </h4>

        <span>
            Transaction summary
        </span>

    </div>


    <div class="financial-grid">

        <div class="financial-card">

            <div class="financial-icon income-icon">
                <i class="fa-solid fa-arrow-trend-up"></i>
            </div>

            <div class="financial-info">

                <span>
                    Total Income
                </span>

                <strong>
                    PKR {{ number_format($totalIncome, 2) }}
                </strong>

            </div>
>>>>>>> 6ffaa5c67431164cbfb442976b8ded0148e2ce52

        </div>


<<<<<<< HEAD
        {{-- SIDEBAR NAVIGATION --}}

        <nav class="sidebar-nav">


            {{-- MAIN --}}

            <div class="nav-section-title">
                MAIN
            </div>


            <a
                href="{{ url('/admin/dashboard') }}"
                class="sidebar-link {{ request()->is('admin/dashboard') ? 'active' : '' }}"
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
=======
        <div class="financial-card">

            <div class="financial-icon expense-icon">
                <i class="fa-solid fa-arrow-trend-down"></i>
            </div>

            <div class="financial-info">

                <span>
                    Total Expenses
                </span>

                <strong>
                    PKR {{ number_format(abs($totalExpenses), 2) }}
                </strong>

            </div>

        </div>

    </div>

</div>


<!-- Management Overview -->

<div class="dashboard-section">

    <div class="section-heading">

        <h4>
            Management Overview
        </h4>

        <span>
            Current system status
        </span>

    </div>


    <div class="management-grid">

        <!-- Users -->

        <div class="management-card">

            <div class="management-header">

                <div class="management-icon">
                    <i class="fa-solid fa-users"></i>
                </div>

                <div>

                    <h5>
                        User Management
                    </h5>

                    <span>
                        Account status
                    </span>

                </div>

            </div>


            <div class="management-stats">

                <div class="mini-stat">

                    <span class="mini-stat-label">
                        Active
                    </span>

                    <strong class="mini-stat-value active">
                        {{ $totalActiveUsers }}
                    </strong>

                </div>

                <div class="mini-stat">

                    <span class="mini-stat-label">
                        Inactive
                    </span>

                    <strong class="mini-stat-value inactive">
                        {{ $totalInactiveUsers }}
                    </strong>

                </div>

            </div>

        </div>


        <!-- Categories -->

        <div class="management-card">

            <div class="management-header">

                <div class="management-icon">
                    <i class="fa-solid fa-tags"></i>
                </div>

                <div>

                    <h5>
                        Category Management
                    </h5>

                    <span>
                        Category breakdown
                    </span>

                </div>

            </div>


            <div class="management-stats">

                <div class="mini-stat">

                    <span class="mini-stat-label">
                        Income
                    </span>

                    <strong class="mini-stat-value active">
                        {{ $totalincomecategories }}
                    </strong>

                </div>

                <div class="mini-stat">

                    <span class="mini-stat-label">
                        Expense
                    </span>

                    <strong class="mini-stat-value inactive">
                        {{ $totalexpensecategories }}
                    </strong>

                </div>

            </div>

        </div>


        <!-- Announcements -->

        <div class="management-card">

            <div class="management-header">

                <div class="management-icon">
                    <i class="fa-solid fa-bullhorn"></i>
                </div>

                <div>

                    <h5>
                        Announcements
                    </h5>

                    <span>
                        Announcement status
                    </span>

                </div>

            </div>


            <div class="management-stats">

                <div class="mini-stat">

                    <span class="mini-stat-label">
                        Active
                    </span>

                    <strong class="mini-stat-value active">
                        {{ $totalActiveAnnouncements }}
                    </strong>

                </div>

                <div class="mini-stat">

                    <span class="mini-stat-label">
                        Inactive
                    </span>

                    <strong class="mini-stat-value inactive">
                        {{ $totalInactiveAnnouncements }}
                    </strong>

                </div>

            </div>

        </div>

    </div>

</div>


<!-- System Overview -->

<div class="dashboard-section">

    <div class="section-heading">

        <h4>
            System Overview
        </h4>

        <span>
            CampusCoin summary
        </span>

    </div>


    <div class="overview-card">

        <div class="overview-list">

            <div class="overview-item">
>>>>>>> 6ffaa5c67431164cbfb442976b8ded0148e2ce52

                <i class="fa-solid fa-users"></i>

                <span>
                    Users
                </span>

<<<<<<< HEAD
            </a>


            {{-- TRANSACTIONS --}}

            <a
                href="{{ url('/alltransactions') }}"
                class="sidebar-link {{ request()->is('alltransactions') || request()->is('addtransaction') || request()->is('edittransaction*') ? 'active' : '' }}"
            >

                <i class="fa-solid fa-money-bill-transfer"></i>
=======
                <strong>
                    {{ $totalUsers }}
                </strong>

            </div>


            <div class="overview-item">

                <i class="fa-solid fa-receipt"></i>
>>>>>>> 6ffaa5c67431164cbfb442976b8ded0148e2ce52

                <span>
                    Transactions
                </span>

<<<<<<< HEAD
            </a>


            {{-- BUDGETS --}}

            <a
                href="{{ url('/allusersbudgets') }}"
                class="sidebar-link {{ request()->is('allusersbudgets') || request()->is('deleteuserbudget*') ? 'active' : '' }}"
            >
=======
                <strong>
                    {{ $totalTransactions }}
                </strong>

            </div>


            <div class="overview-item">
>>>>>>> 6ffaa5c67431164cbfb442976b8ded0148e2ce52

                <i class="fa-solid fa-wallet"></i>

                <span>
<<<<<<< HEAD
                    User Budgets
                </span>

            </a>


            {{-- ANNOUNCEMENTS --}}

            <a
                href="{{ url('/allannouncements') }}"
                class="sidebar-link {{ request()->is('allannouncements') || request()->is('addannouncement') || request()->is('editannouncement*') || request()->is('deleteannouncement*') || request()->is('activateannouncement*') || request()->is('deactivateannouncement*') ? 'active' : '' }}"
            >
=======
                    Budgets
                </span>

                <strong>
                    {{ $totalBudgets }}
                </strong>

            </div>


            <div class="overview-item">
>>>>>>> 6ffaa5c67431164cbfb442976b8ded0148e2ce52

                <i class="fa-solid fa-bullhorn"></i>

                <span>
                    Announcements
                </span>

<<<<<<< HEAD
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
=======
                <strong>
                    {{ $totalAnnouncements }}
                </strong>

            </div>

        </div>

    </div>

</div>

</div>

@endsection
>>>>>>> 6ffaa5c67431164cbfb442976b8ded0148e2ce52
