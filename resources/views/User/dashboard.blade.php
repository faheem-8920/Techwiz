@extends('layouts.user')

@section('title', 'Dashboard')

@section('content')

<div class="page-heading">

    <div class="row">
        <div class="col-12 col-md-6">
            <h3>Dashboard</h3>
            <p class="text-subtitle text-muted">
                Welcome back! Manage your student budget easily.
            </p>
        </div>
    </div>

</div>

<div class="page-content">

    {{-- SUMMARY CARDS --}}
    <section class="row">

        {{-- TOTAL INCOME --}}
        <div class="col-12 col-md-4">
            <div class="card">
                <div class="card-body">

                    <div class="row">

                        <div class="col-8">
                            <h6 class="text-muted font-semibold">
                                Total Income
                            </h6>

                            <h3 class="font-extrabold mb-0">
                                Rs. 50,000
                            </h3>

                            <small class="text-success">
                                <i class="bi bi-arrow-up"></i>
                                This Month
                            </small>
                        </div>

                        <div class="col-4">
                            <div class="avatar avatar-lg bg-light-success">
                                <div class="avatar-content">
                                    <i class="bi bi-wallet2 text-success font-bold"></i>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>


        {{-- TOTAL EXPENSES --}}
        <div class="col-12 col-md-4">
            <div class="card">
                <div class="card-body">

                    <div class="row">

                        <div class="col-8">
                            <h6 class="text-muted font-semibold">
                                Total Expenses
                            </h6>

                            <h3 class="font-extrabold mb-0">
                                Rs. 20,000
                            </h3>

                            <small class="text-danger">
                                <i class="bi bi-arrow-up"></i>
                                This Month
                            </small>
                        </div>

                        <div class="col-4">
                            <div class="avatar avatar-lg bg-light-danger">
                                <div class="avatar-content">
                                    <i class="bi bi-credit-card text-danger font-bold"></i>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>


        {{-- BALANCE --}}
        <div class="col-12 col-md-4">
            <div class="card">
                <div class="card-body">

                    <div class="row">

                        <div class="col-8">
                            <h6 class="text-muted font-semibold">
                                Current Balance
                            </h6>

                            <h3 class="font-extrabold mb-0">
                                Rs. 30,000
                            </h3>

                            <small class="text-primary">
                                <i class="bi bi-check-circle"></i>
                                Available
                            </small>
                        </div>

                        <div class="col-4">
                            <div class="avatar avatar-lg bg-light-primary">
                                <div class="avatar-content">
                                    <i class="bi bi-cash-stack text-primary font-bold"></i>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>

    </section>


    {{-- QUICK ACTIONS --}}
    <section class="row">

        <div class="col-12">

            <div class="card">

                <div class="card-header">
                    <h4>Quick Actions</h4>
                </div>

                <div class="card-body">

                    <div class="d-flex flex-wrap gap-2">

                        <a href="/income"
                           class="btn btn-primary">

                            <i class="bi bi-plus-circle me-1"></i>

                            Add Income

                        </a>


                        <a href="/expenses"
                           class="btn btn-danger">

                            <i class="bi bi-plus-circle me-1"></i>

                            Add Expense

                        </a>


                        <a href="/reports"
                           class="btn btn-outline-primary">

                            <i class="bi bi-bar-chart me-1"></i>

                            View Reports

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- EXPENSE CATEGORY + BUDGET --}}
    <section class="row">

        {{-- EXPENSE CATEGORIES --}}
        <div class="col-12 col-lg-6">

            <div class="card">

                <div class="card-header">
                    <h4>Expense Categories</h4>
                </div>

                <div class="card-body">

                    {{-- FOOD --}}
                    <div class="mb-4">

                        <div class="d-flex justify-content-between mb-2">

                            <span>
                                <i class="bi bi-cup-hot me-2"></i>
                                Food
                            </span>

                            <strong>
                                Rs. 6,000
                            </strong>

                        </div>

                        <div class="progress">

                            <div class="progress-bar"
                                 role="progressbar"
                                 style="width: 60%">
                            </div>

                        </div>

                    </div>


                    {{-- TRANSPORT --}}
                    <div class="mb-4">

                        <div class="d-flex justify-content-between mb-2">

                            <span>
                                <i class="bi bi-bus-front me-2"></i>
                                Transport
                            </span>

                            <strong>
                                Rs. 4,000
                            </strong>

                        </div>

                        <div class="progress">

                            <div class="progress-bar"
                                 role="progressbar"
                                 style="width: 40%">
                            </div>

                        </div>

                    </div>


                    {{-- ACADEMICS --}}
                    <div class="mb-4">

                        <div class="d-flex justify-content-between mb-2">

                            <span>
                                <i class="bi bi-book me-2"></i>
                                Academics
                            </span>

                            <strong>
                                Rs. 3,500
                            </strong>

                        </div>

                        <div class="progress">

                            <div class="progress-bar"
                                 role="progressbar"
                                 style="width: 35%">
                            </div>

                        </div>

                    </div>


                    {{-- ENTERTAINMENT --}}
                    <div>

                        <div class="d-flex justify-content-between mb-2">

                            <span>
                                <i class="bi bi-controller me-2"></i>
                                Entertainment
                            </span>

                            <strong>
                                Rs. 2,500
                            </strong>

                        </div>

                        <div class="progress">

                            <div class="progress-bar"
                                 role="progressbar"
                                 style="width: 25%">
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- BUDGET VS ACTUAL --}}
        <div class="col-12 col-lg-6">

            <div class="card">

                <div class="card-header">
                    <h4>Budget vs Actual</h4>
                </div>

                <div class="card-body">

                    {{-- FOOD --}}
                    <div class="mb-4">

                        <div class="d-flex justify-content-between">

                            <span>Food</span>

                            <span>
                                Rs. 6,000 / Rs. 10,000
                            </span>

                        </div>

                        <div class="progress mt-2">

                            <div class="progress-bar bg-success"
                                 style="width: 60%">
                            </div>

                        </div>

                    </div>


                    {{-- TRANSPORT --}}
                    <div class="mb-4">

                        <div class="d-flex justify-content-between">

                            <span>Transport</span>

                            <span>
                                Rs. 4,000 / Rs. 8,000
                            </span>

                        </div>

                        <div class="progress mt-2">

                            <div class="progress-bar bg-primary"
                                 style="width: 50%">
                            </div>

                        </div>

                    </div>


                    {{-- ACADEMICS --}}
                    <div class="mb-4">

                        <div class="d-flex justify-content-between">

                            <span>Academics</span>

                            <span>
                                Rs. 3,500 / Rs. 5,000
                            </span>

                        </div>

                        <div class="progress mt-2">

                            <div class="progress-bar bg-warning"
                                 style="width: 70%">
                            </div>

                        </div>

                    </div>


                    {{-- ENTERTAINMENT --}}
                    <div>

                        <div class="d-flex justify-content-between">

                            <span>Entertainment</span>

                            <span>
                                Rs. 2,500 / Rs. 3,000
                            </span>

                        </div>

                        <div class="progress mt-2">

                            <div class="progress-bar bg-danger"
                                 style="width: 83%">
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- TOP CATEGORY + SAVING TIP --}}
    <section class="row">

        {{-- TOP CATEGORY --}}
        <div class="col-12 col-lg-6">

            <div class="card">

                <div class="card-header">
                    <h4>This Month's Top Category</h4>
                </div>

                <div class="card-body">

                    <div class="d-flex align-items-center">

                        <div class="avatar avatar-xl bg-light-warning">

                            <div class="avatar-content">

                                <i class="bi bi-cup-hot-fill text-warning fs-3"></i>

                            </div>

                        </div>

                        <div class="ms-3">

                            <h5 class="mb-1">
                                Food
                            </h5>

                            <p class="text-muted mb-0">
                                Rs. 6,000 spent this month
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- SAVING TIP --}}
        <div class="col-12 col-lg-6">

            <div class="card">

                <div class="card-header">

                    <h4>
                        <i class="bi bi-lightbulb-fill text-warning me-2"></i>
                        Saving Tip
                    </h4>

                </div>

                <div class="card-body">

                    <h5>
                        Track small daily expenses
                    </h5>

                    <p class="text-muted mb-0">

                        Small daily expenses can add up quickly.
                        Try setting a weekly spending limit
                        and review your expenses regularly.

                    </p>

                </div>

            </div>

        </div>

    </section>

</div>


@endsection