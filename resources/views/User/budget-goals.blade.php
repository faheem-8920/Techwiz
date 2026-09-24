@extends('layouts.user')

@section('content')

<div class="page-heading">

    <div class="page-title">
        <div class="row">

            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Budget Goals</h3>
                <p class="text-subtitle text-muted">
                    Set and track your monthly spending limits.
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
                            Budget Goals
                        </li>
                    </ol>
                </nav>
            </div>

        </div>
    </div>

</div>


<div class="page-content">

    {{-- =========================
         SUMMARY CARDS
    ========================== --}}
    <section class="row">

        {{-- Total Budget --}}
        <div class="col-12 col-md-4">
            <div class="card">
                <div class="card-body px-4 py-4-5">

                    <div class="row">

                        <div class="col-md-4 col-lg-4 col-xl-4 col-xxl-3
                                    d-flex justify-content-start">

                            <div class="stats-icon purple mb-2">
                                <i class="bi bi-wallet2"></i>
                            </div>

                        </div>

                        <div class="col-md-8 col-lg-8 col-xl-8 col-xxl-9">

                            <h6 class="text-muted font-semibold">
                                Total Budget
                            </h6>

                            <h6 class="font-extrabold mb-0">
                                Rs. 31,000
                            </h6>

                        </div>

                    </div>

                </div>
            </div>
        </div>


        {{-- Total Spent --}}
        <div class="col-12 col-md-4">
            <div class="card">
                <div class="card-body px-4 py-4-5">

                    <div class="row">

                        <div class="col-md-4 col-lg-4 col-xl-4 col-xxl-3
                                    d-flex justify-content-start">

                            <div class="stats-icon red mb-2">
                                <i class="bi bi-arrow-up-circle"></i>
                            </div>

                        </div>

                        <div class="col-md-8 col-lg-8 col-xl-8 col-xxl-9">

                            <h6 class="text-muted font-semibold">
                                Total Spent
                            </h6>

                            <h6 class="font-extrabold mb-0">
                                Rs. 19,400
                            </h6>

                        </div>

                    </div>

                </div>
            </div>
        </div>


        {{-- Remaining Budget --}}
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
                                Remaining Budget
                            </h6>

                            <h6 class="font-extrabold mb-0">
                                Rs. 11,600
                            </h6>

                        </div>

                    </div>

                </div>
            </div>
        </div>

    </section>


    {{-- =========================
         PAGE HEADER
    ========================== --}}
    <section class="section">

        <div class="card">

            <div class="card-header">

                <div class="d-flex justify-content-between align-items-center">

                    <div>
                        <h4 class="card-title mb-1">
                            Monthly Budget Goals
                        </h4>

                        <p class="text-muted mb-0">
                            September 2026
                        </p>
                    </div>

                    <button
                        type="button"
                        class="btn btn-primary"
                        data-bs-toggle="modal"
                        data-bs-target="#addBudgetModal">

                        <i class="bi bi-plus-lg me-1"></i>
                        Add Budget Goal

                    </button>

                </div>

            </div>


            <div class="card-body">

                {{-- =========================
                     FOOD
                ========================== --}}
                <div class="budget-item mb-4">

                    <div class="d-flex justify-content-between
                                align-items-center mb-2">

                        <div class="d-flex align-items-center">

                            <div class="avatar avatar-md bg-light-warning me-3">

                                <span class="avatar-content">
                                    <i class="bi bi-egg-fried"></i>
                                </span>

                            </div>

                            <div>
                                <h6 class="mb-1">
                                    Food
                                </h6>

                                <small class="text-muted">
                                    Rs. 7,500 spent of Rs. 10,000
                                </small>
                            </div>

                        </div>


                        <div class="text-end">

                            <h6 class="mb-1 text-warning">
                                75%
                            </h6>

                            <small class="text-muted">
                                Rs. 2,500 left
                            </small>

                        </div>

                    </div>


                    <div class="progress progress-lg">

                        <div
                            class="progress-bar bg-warning"
                            role="progressbar"
                            style="width: 75%;"
                            aria-valuenow="75"
                            aria-valuemin="0"
                            aria-valuemax="100">
                        </div>

                    </div>


                    <div class="d-flex justify-content-between mt-2">

                        <span class="badge bg-light-warning text-warning">
                            Near Limit
                        </span>

                        <div>

                            <button
                                type="button"
                                class="btn btn-sm btn-outline-primary me-1">

                                <i class="bi bi-pencil"></i>
                                Edit

                            </button>

                            <button
                                type="button"
                                class="btn btn-sm btn-outline-danger">

                                <i class="bi bi-trash"></i>
                                Delete

                            </button>

                        </div>

                    </div>

                </div>


                <hr>


                {{-- =========================
                     TRANSPORT
                ========================== --}}
                <div class="budget-item mb-4 mt-4">

                    <div class="d-flex justify-content-between
                                align-items-center mb-2">

                        <div class="d-flex align-items-center">

                            <div class="avatar avatar-md bg-light-info me-3">

                                <span class="avatar-content">
                                    <i class="bi bi-bus-front"></i>
                                </span>

                            </div>

                            <div>
                                <h6 class="mb-1">
                                    Transport
                                </h6>

                                <small class="text-muted">
                                    Rs. 3,200 spent of Rs. 5,000
                                </small>
                            </div>

                        </div>


                        <div class="text-end">

                            <h6 class="mb-1 text-info">
                                64%
                            </h6>

                            <small class="text-muted">
                                Rs. 1,800 left
                            </small>

                        </div>

                    </div>


                    <div class="progress progress-lg">

                        <div
                            class="progress-bar bg-info"
                            role="progressbar"
                            style="width: 64%;"
                            aria-valuenow="64"
                            aria-valuemin="0"
                            aria-valuemax="100">
                        </div>

                    </div>


                    <div class="d-flex justify-content-between mt-2">

                        <span class="badge bg-light-success text-success">
                            Within Budget
                        </span>

                        <div>

                            <button
                                type="button"
                                class="btn btn-sm btn-outline-primary me-1">

                                <i class="bi bi-pencil"></i>
                                Edit

                            </button>

                            <button
                                type="button"
                                class="btn btn-sm btn-outline-danger">

                                <i class="bi bi-trash"></i>
                                Delete

                            </button>

                        </div>

                    </div>

                </div>


                <hr>


                {{-- =========================
                     ACADEMICS
                ========================== --}}
                <div class="budget-item mb-4 mt-4">

                    <div class="d-flex justify-content-between
                                align-items-center mb-2">

                        <div class="d-flex align-items-center">

                            <div class="avatar avatar-md bg-light-primary me-3">

                                <span class="avatar-content">
                                    <i class="bi bi-book"></i>
                                </span>

                            </div>

                            <div>
                                <h6 class="mb-1">
                                    Academics
                                </h6>

                                <small class="text-muted">
                                    Rs. 4,500 spent of Rs. 8,000
                                </small>
                            </div>

                        </div>


                        <div class="text-end">

                            <h6 class="mb-1 text-primary">
                                56%
                            </h6>

                            <small class="text-muted">
                                Rs. 3,500 left
                            </small>

                        </div>

                    </div>


                    <div class="progress progress-lg">

                        <div
                            class="progress-bar bg-primary"
                            role="progressbar"
                            style="width: 56%;"
                            aria-valuenow="56"
                            aria-valuemin="0"
                            aria-valuemax="100">
                        </div>

                    </div>


                    <div class="d-flex justify-content-between mt-2">

                        <span class="badge bg-light-success text-success">
                            Within Budget
                        </span>

                        <div>

                            <button
                                type="button"
                                class="btn btn-sm btn-outline-primary me-1">

                                <i class="bi bi-pencil"></i>
                                Edit

                            </button>

                            <button
                                type="button"
                                class="btn btn-sm btn-outline-danger">

                                <i class="bi bi-trash"></i>
                                Delete

                            </button>

                        </div>

                    </div>

                </div>


                <hr>


                {{-- =========================
                     HOSTEL / RENT
                ========================== --}}
                <div class="budget-item mb-4 mt-4">

                    <div class="d-flex justify-content-between
                                align-items-center mb-2">

                        <div class="d-flex align-items-center">

                            <div class="avatar avatar-md bg-light-secondary me-3">

                                <span class="avatar-content">
                                    <i class="bi bi-house"></i>
                                </span>

                            </div>

                            <div>
                                <h6 class="mb-1">
                                    Hostel / Rent
                                </h6>

                                <small class="text-muted">
                                    Rs. 2,500 spent of Rs. 4,000
                                </small>
                            </div>

                        </div>


                        <div class="text-end">

                            <h6 class="mb-1 text-secondary">
                                63%
                            </h6>

                            <small class="text-muted">
                                Rs. 1,500 left
                            </small>

                        </div>

                    </div>


                    <div class="progress progress-lg">

                        <div
                            class="progress-bar bg-secondary"
                            role="progressbar"
                            style="width: 63%;"
                            aria-valuenow="63"
                            aria-valuemin="0"
                            aria-valuemax="100">
                        </div>

                    </div>


                    <div class="d-flex justify-content-between mt-2">

                        <span class="badge bg-light-success text-success">
                            Within Budget
                        </span>

                        <div>

                            <button
                                type="button"
                                class="btn btn-sm btn-outline-primary me-1">

                                <i class="bi bi-pencil"></i>
                                Edit

                            </button>

                            <button
                                type="button"
                                class="btn btn-sm btn-outline-danger">

                                <i class="bi bi-trash"></i>
                                Delete

                            </button>

                        </div>

                    </div>

                </div>


                <hr>


                {{-- =========================
                     ENTERTAINMENT - OVER BUDGET
                ========================== --}}
                <div class="budget-item mt-4">

                    <div class="d-flex justify-content-between
                                align-items-center mb-2">

                        <div class="d-flex align-items-center">

                            <div class="avatar avatar-md bg-light-danger me-3">

                                <span class="avatar-content">
                                    <i class="bi bi-controller"></i>
                                </span>

                            </div>

                            <div>
                                <h6 class="mb-1">
                                    Entertainment
                                </h6>

                                <small class="text-muted">
                                    Rs. 4,200 spent of Rs. 4,000
                                </small>
                            </div>

                        </div>


                        <div class="text-end">

                            <h6 class="mb-1 text-danger">
                                105%
                            </h6>

                            <small class="text-danger">
                                Rs. 200 over budget
                            </small>

                        </div>

                    </div>


                    <div class="progress progress-lg">

                        <div
                            class="progress-bar bg-danger"
                            role="progressbar"
                            style="width: 100%;"
                            aria-valuenow="100"
                            aria-valuemin="0"
                            aria-valuemax="100">
                        </div>

                    </div>


                    <div class="d-flex justify-content-between mt-2">

                        <span class="badge bg-light-danger text-danger">
                            Over Budget
                        </span>

                        <div>

                            <button
                                type="button"
                                class="btn btn-sm btn-outline-primary me-1">

                                <i class="bi bi-pencil"></i>
                                Edit

                            </button>

                            <button
                                type="button"
                                class="btn btn-sm btn-outline-danger">

                                <i class="bi bi-trash"></i>
                                Delete

                            </button>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- =========================
         BUDGET ALERT
    ========================== --}}
    <section class="section">

        <div class="card">

            <div class="card-body">

                <div class="alert alert-warning mb-0">

                    <div class="d-flex align-items-center">

                        <i class="bi bi-exclamation-triangle-fill fs-4 me-3"></i>

                        <div>

                            <h6 class="alert-heading mb-1">
                                Budget Alert
                            </h6>

                            <p class="mb-0">
                                Your Entertainment spending has exceeded
                                the monthly budget by Rs. 200.
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

</div>


{{-- =========================
     ADD BUDGET MODAL
========================== --}}
<div class="modal fade"
     id="addBudgetModal"
     tabindex="-1"
     aria-labelledby="addBudgetModalLabel"
     aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="addBudgetModalLabel">
                    Add Budget Goal
                </h5>

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close">
                </button>

            </div>


            <div class="modal-body">

                <form>

                    {{-- Category --}}
                    <div class="form-group mb-3">

                        <label for="budgetCategory" class="form-label">
                            Category
                        </label>

                        <select
                            id="budgetCategory"
                            class="form-select">

                            <option selected disabled>
                                Select Category
                            </option>

                            <option>Food</option>
                            <option>Transport</option>
                            <option>Hostel / Rent</option>
                            <option>Academics</option>
                            <option>Subscriptions</option>
                            <option>Entertainment</option>
                            <option>Miscellaneous</option>

                        </select>

                    </div>


                    {{-- Budget Amount --}}
                    <div class="form-group mb-3">

                        <label for="budgetAmount" class="form-label">
                            Monthly Budget Amount
                        </label>

                        <div class="input-group">

                            <span class="input-group-text">
                                Rs.
                            </span>

                            <input
                                type="number"
                                id="budgetAmount"
                                class="form-control"
                                placeholder="Enter budget amount">

                        </div>

                    </div>


                    {{-- Month --}}
                    <div class="form-group mb-3">

                        <label for="budgetMonth" class="form-label">
                            Month
                        </label>

                        <input
                            type="month"
                            id="budgetMonth"
                            class="form-control"
                            value="2026-09">

                    </div>


                    {{-- Alert --}}
                    <div class="form-group mb-3">

                        <label for="alertLimit" class="form-label">
                            Alert At
                        </label>

                        <select
                            id="alertLimit"
                            class="form-select">

                            <option>50% of budget</option>
                            <option selected>80% of budget</option>
                            <option>90% of budget</option>
                            <option>100% of budget</option>

                        </select>

                        <small class="text-muted">
                            You can set when you want to receive a
                            budget warning.
                        </small>

                    </div>

                </form>

            </div>


            <div class="modal-footer">

                <button
                    type="button"
                    class="btn btn-light-secondary"
                    data-bs-dismiss="modal">

                    Cancel

                </button>

                <button
                    type="button"
                    class="btn btn-primary"
                    data-bs-dismiss="modal">

                    <i class="bi bi-check-lg me-1"></i>
                    Save Budget Goal

                </button>

            </div>

        </div>

    </div>

</div>

@endsection