@extends('layouts.user')

@section('content')

<div class="page-heading">

    <div class="page-title">
        <div class="row">

            <div class="col-12 col-md-6 order-md-1 order-last">

                <h3>Saving Tips</h3>

                <p class="text-subtitle text-muted">
                    Simple tips to help you save money and manage your expenses.
                </p>

            </div>

            <div class="col-12 col-md-6 order-md-2 order-first">

                <nav aria-label="breadcrumb"
                     class="breadcrumb-header float-start float-lg-end">

                    <ol class="breadcrumb">

                        <li class="breadcrumb-item">
                            <a href="/dashboard">Dashboard</a>
                        </li>

                        <li class="breadcrumb-item active"
                            aria-current="page">
                            Saving Tips
                        </li>

                    </ol>

                </nav>

            </div>

        </div>
    </div>

</div>


<div class="page-content">

    {{-- =========================
         SAVING SUMMARY
    ========================== --}}
    <section class="row">

        {{-- Monthly Saving Goal --}}
        <div class="col-12 col-md-4">

            <div class="card">

                <div class="card-body px-4 py-4-5">

                    <div class="row">

                        <div class="col-md-4 col-lg-4 col-xl-4 col-xxl-3
                                    d-flex justify-content-start">

                            <div class="stats-icon green mb-2">
                                <i class="bi bi-piggy-bank"></i>
                            </div>

                        </div>

                        <div class="col-md-8 col-lg-8 col-xl-8 col-xxl-9">

                            <h6 class="text-muted font-semibold">
                                Monthly Saving Goal
                            </h6>

                            <h6 class="font-extrabold mb-0">
                                Rs. 10,000
                            </h6>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- Saved This Month --}}
        <div class="col-12 col-md-4">

            <div class="card">

                <div class="card-body px-4 py-4-5">

                    <div class="row">

                        <div class="col-md-4 col-lg-4 col-xl-4 col-xxl-3
                                    d-flex justify-content-start">

                            <div class="stats-icon purple mb-2">
                                <i class="bi bi-graph-up-arrow"></i>
                            </div>

                        </div>

                        <div class="col-md-8 col-lg-8 col-xl-8 col-xxl-9">

                            <h6 class="text-muted font-semibold">
                                Saved This Month
                            </h6>

                            <h6 class="font-extrabold mb-0">
                                Rs. 6,500
                            </h6>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- Saving Progress --}}
        <div class="col-12 col-md-4">

            <div class="card">

                <div class="card-body px-4 py-4-5">

                    <div class="row">

                        <div class="col-md-4 col-lg-4 col-xl-4 col-xxl-3
                                    d-flex justify-content-start">

                            <div class="stats-icon blue mb-2">
                                <i class="bi bi-bullseye"></i>
                            </div>

                        </div>

                        <div class="col-md-8 col-lg-8 col-xl-8 col-xxl-9">

                            <h6 class="text-muted font-semibold">
                                Saving Progress
                            </h6>

                            <h6 class="font-extrabold mb-0">
                                65%
                            </h6>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- =========================
         TODAY'S TIP
    ========================== --}}
    <section class="section">

        <div class="card">

            <div class="card-body">

                <div class="alert alert-primary mb-0">

                    <div class="d-flex align-items-start">

                        <i class="bi bi-lightbulb-fill fs-3 me-3"></i>

                        <div>

                            <h5 class="alert-heading">
                                Today's Saving Tip
                            </h5>

                            <p class="mb-0">
                                Try to plan your meals before spending money
                                on food. This can help reduce unnecessary
                                daily expenses.
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- =========================
         SAVING TIPS
    ========================== --}}
    <section class="section">

        <div class="row">

            {{-- Tip 1 --}}
            <div class="col-12 col-md-6 col-xl-4">

                <div class="card h-100">

                    <div class="card-body">

                        <div class="avatar avatar-lg bg-light-primary mb-3">

                            <span class="avatar-content">
                                <i class="bi bi-cup-hot fs-4"></i>
                            </span>

                        </div>

                        <h5 class="card-title">
                            Reduce Daily Food Expenses
                        </h5>

                        <p class="card-text text-muted">
                            Prepare meals at home when possible and
                            keep track of your daily food spending.
                        </p>

                        <span class="badge bg-light-primary text-primary">
                            Food
                        </span>

                    </div>

                </div>

            </div>


            {{-- Tip 2 --}}
            <div class="col-12 col-md-6 col-xl-4">

                <div class="card h-100">

                    <div class="card-body">

                        <div class="avatar avatar-lg bg-light-success mb-3">

                            <span class="avatar-content">
                                <i class="bi bi-bus-front fs-4"></i>
                            </span>

                        </div>

                        <h5 class="card-title">
                            Save on Transport
                        </h5>

                        <p class="card-text text-muted">
                            Compare your daily transport expenses and
                            consider affordable travel options when available.
                        </p>

                        <span class="badge bg-light-success text-success">
                            Transport
                        </span>

                    </div>

                </div>

            </div>


            {{-- Tip 3 --}}
            <div class="col-12 col-md-6 col-xl-4">

                <div class="card h-100">

                    <div class="card-body">

                        <div class="avatar avatar-lg bg-light-warning mb-3">

                            <span class="avatar-content">
                                <i class="bi bi-cart3 fs-4"></i>
                            </span>

                        </div>

                        <h5 class="card-title">
                            Avoid Unplanned Purchases
                        </h5>

                        <p class="card-text text-muted">
                            Before buying something, ask yourself whether
                            it is necessary or simply an impulse purchase.
                        </p>

                        <span class="badge bg-light-warning text-warning">
                            Shopping
                        </span>

                    </div>

                </div>

            </div>


            {{-- Tip 4 --}}
            <div class="col-12 col-md-6 col-xl-4">

                <div class="card h-100">

                    <div class="card-body">

                        <div class="avatar avatar-lg bg-light-info mb-3">

                            <span class="avatar-content">
                                <i class="bi bi-credit-card fs-4"></i>
                            </span>

                        </div>

                        <h5 class="card-title">
                            Review Subscriptions
                        </h5>

                        <p class="card-text text-muted">
                            Check your recurring subscriptions and remove
                            services that you no longer use.
                        </p>

                        <span class="badge bg-light-info text-info">
                            Subscriptions
                        </span>

                    </div>

                </div>

            </div>


            {{-- Tip 5 --}}
            <div class="col-12 col-md-6 col-xl-4">

                <div class="card h-100">

                    <div class="card-body">

                        <div class="avatar avatar-lg bg-light-danger mb-3">

                            <span class="avatar-content">
                                <i class="bi bi-controller fs-4"></i>
                            </span>

                        </div>

                        <h5 class="card-title">
                            Control Entertainment Spending
                        </h5>

                        <p class="card-text text-muted">
                            Set a monthly limit for entertainment and
                            try to stay within your budget.
                        </p>

                        <span class="badge bg-light-danger text-danger">
                            Entertainment
                        </span>

                    </div>

                </div>

            </div>


            {{-- Tip 6 --}}
            <div class="col-12 col-md-6 col-xl-4">

                <div class="card h-100">

                    <div class="card-body">

                        <div class="avatar avatar-lg bg-light-secondary mb-3">

                            <span class="avatar-content">
                                <i class="bi bi-wallet2 fs-4"></i>
                            </span>

                        </div>

                        <h5 class="card-title">
                            Set a Monthly Saving Target
                        </h5>

                        <p class="card-text text-muted">
                            Decide how much you want to save each month
                            and track your progress regularly.
                        </p>

                        <span class="badge bg-light-secondary text-secondary">
                            Savings
                        </span>

                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- =========================
         SAVING CHALLENGE
    ========================== --}}
    <section class="section">

        <div class="card">

            <div class="card-header">

                <h4 class="card-title">
                    Monthly Saving Challenge
                </h4>

            </div>

            <div class="card-body">

                <div class="row align-items-center">

                    <div class="col-md-8">

                        <h6>
                            Save Rs. 10,000 this month
                        </h6>

                        <p class="text-muted">
                            You have already saved Rs. 6,500.
                            Keep going to reach your monthly goal.
                        </p>

                        <div class="progress progress-lg">

                            <div
                                class="progress-bar bg-success"
                                role="progressbar"
                                style="width: 65%;"
                                aria-valuenow="65"
                                aria-valuemin="0"
                                aria-valuemax="100">

                                65%

                            </div>

                        </div>

                    </div>


                    <div class="col-md-4 text-md-end mt-3 mt-md-0">

                        <h5 class="text-success">
                            Rs. 3,500 remaining
                        </h5>

                        <button
                            type="button"
                            class="btn btn-success">

                            <i class="bi bi-check-circle me-1"></i>
                            Keep Saving

                        </button>

                    </div>

                </div>

            </div>

        </div>

    </section>

</div>

@endsection