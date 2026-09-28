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

        </div>


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

                <i class="fa-solid fa-users"></i>

                <span>
                    Users
                </span>

                <strong>
                    {{ $totalUsers }}
                </strong>

            </div>


            <div class="overview-item">

                <i class="fa-solid fa-receipt"></i>

                <span>
                    Transactions
                </span>

                <strong>
                    {{ $totalTransactions }}
                </strong>

            </div>


            <div class="overview-item">

                <i class="fa-solid fa-wallet"></i>

                <span>
                    Budgets
                </span>

                <strong>
                    {{ $totalBudgets }}
                </strong>

            </div>


            <div class="overview-item">

                <i class="fa-solid fa-bullhorn"></i>

                <span>
                    Announcements
                </span>

                <strong>
                    {{ $totalAnnouncements }}
                </strong>

            </div>

        </div>

    </div>

</div>

</div>

@endsection
