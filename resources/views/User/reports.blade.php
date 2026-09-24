@extends('layouts.user')

@section('content')

<div class="page-heading">

    <div class="row">

        <div class="col-12 col-md-6">

            <h3>Reports</h3>

            <p class="text-subtitle text-muted">
                View and analyze your income and expenses
            </p>

        </div>

        <div class="col-12 col-md-6 text-md-end">

            <button type="button" class="btn btn-primary">
                <i class="bi bi-download me-1"></i>
                Export Report
            </button>

        </div>

    </div>

</div>


<div class="page-content">

    {{-- ================= FILTERS ================= --}}

    <section class="row">

        <div class="col-12">

            <div class="card">

                <div class="card-header">

                    <h4>Report Filters</h4>

                </div>

                <div class="card-body">

                    <div class="row">

                        {{-- MONTH --}}

                        <div class="col-md-4 mb-3">

                            <label class="form-label">
                                Month
                            </label>

                            <select class="form-select">

                                <option>September 2026</option>
                                <option>August 2026</option>
                                <option>July 2026</option>
                                <option>June 2026</option>

                            </select>

                        </div>


                        {{-- REPORT TYPE --}}

                        <div class="col-md-4 mb-3">

                            <label class="form-label">
                                Report Type
                            </label>

                            <select class="form-select">

                                <option>Monthly Summary</option>
                                <option>Category-wise</option>
                                <option>Income vs Expense</option>
                                <option>Daily Breakdown</option>
                                <option>Weekly Breakdown</option>

                            </select>

                        </div>


                        {{-- CATEGORY --}}

                        <div class="col-md-4 mb-3">

                            <label class="form-label">
                                Category
                            </label>

                            <select class="form-select">

                                <option>All Categories</option>

                                <option>Food</option>
                                <option>Transport</option>
                                <option>Hostel/Rent</option>
                                <option>Academics</option>
                                <option>Subscriptions</option>
                                <option>Entertainment</option>
                                <option>Miscellaneous</option>

                            </select>

                        </div>

                    </div>


                    <div class="text-end">

                        <button type="button"
                                class="btn btn-primary">

                            <i class="bi bi-funnel me-1"></i>
                            Apply Filters

                        </button>

                    </div>

                </div>

            </div>

        </div>

    </section>



    {{-- ================= SUMMARY ================= --}}

    <section class="row">

        {{-- INCOME --}}

        <div class="col-12 col-md-4">

            <div class="card">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>

                            <h6 class="text-muted">
                                Total Income
                            </h6>

                            <h3 class="text-success">
                                Rs. 50,000
                            </h3>

                        </div>

                        <div class="avatar avatar-lg bg-light-success">

                            <div class="avatar-content">

                                <i class="bi bi-arrow-down-circle text-success"></i>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- EXPENSE --}}

        <div class="col-12 col-md-4">

            <div class="card">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>

                            <h6 class="text-muted">
                                Total Expenses
                            </h6>

                            <h3 class="text-danger">
                                Rs. 32,000
                            </h3>

                        </div>

                        <div class="avatar avatar-lg bg-light-danger">

                            <div class="avatar-content">

                                <i class="bi bi-arrow-up-circle text-danger"></i>

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

                    <div class="d-flex justify-content-between">

                        <div>

                            <h6 class="text-muted">
                                Remaining Balance
                            </h6>

                            <h3 class="text-primary">
                                Rs. 18,000
                            </h3>

                        </div>

                        <div class="avatar avatar-lg bg-light-primary">

                            <div class="avatar-content">

                                <i class="bi bi-wallet2 text-primary"></i>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>



    {{-- ================= INCOME VS EXPENSE ================= --}}

    <section class="row">

        <div class="col-12 col-lg-6">

            <div class="card">

                <div class="card-header">

                    <h4>Income vs Expense</h4>

                </div>

                <div class="card-body">

                    <div class="row text-center">

                        <div class="col-6">

                            <h5 class="text-success">
                                Income
                            </h5>

                            <h3>
                                Rs. 50,000
                            </h3>

                        </div>

                        <div class="col-6">

                            <h5 class="text-danger">
                                Expense
                            </h5>

                            <h3>
                                Rs. 32,000
                            </h3>

                        </div>

                    </div>


                    <hr>


                    <div class="progress"
                         style="height: 20px;">

                        <div class="progress-bar bg-success"
                             style="width: 61%;">

                            Income

                        </div>

                        <div class="progress-bar bg-danger"
                             style="width: 39%;">

                            Expense

                        </div>

                    </div>

                </div>

            </div>

        </div>



        {{-- TOP CATEGORY --}}

        <div class="col-12 col-lg-6">

            <div class="card">

                <div class="card-header">

                    <h4>Top Spending Category</h4>

                </div>

                <div class="card-body">

                    <div class="text-center">

                        <div class="avatar avatar-xl bg-light-danger mx-auto mb-3">

                            <div class="avatar-content">

                                <i class="bi bi-cup-hot text-danger fs-2"></i>

                            </div>

                        </div>

                        <h4>Food</h4>

                        <p class="text-muted">
                            Highest spending category
                        </p>

                        <h3 class="text-danger">
                            Rs. 12,000
                        </h3>

                    </div>

                </div>

            </div>

        </div>

    </section>



    {{-- ================= CATEGORY-WISE EXPENSE ================= --}}

    <section class="row">

        <div class="col-12">

            <div class="card">

                <div class="card-header">

                    <h4>Category-wise Expenses</h4>

                </div>

                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-hover">

                            <thead>

                                <tr>

                                    <th>Category</th>
                                    <th>Amount</th>
                                    <th>Percentage</th>
                                    <th>Progress</th>

                                </tr>

                            </thead>

                            <tbody>


                                <tr>

                                    <td>
                                        Food
                                    </td>

                                    <td class="text-danger fw-bold">
                                        Rs. 12,000
                                    </td>

                                    <td>
                                        37.5%
                                    </td>

                                    <td>

                                        <div class="progress">

                                            <div class="progress-bar bg-danger"
                                                 style="width: 75%;">

                                            </div>

                                        </div>

                                    </td>

                                </tr>


                                <tr>

                                    <td>
                                        Transport
                                    </td>

                                    <td class="text-danger fw-bold">
                                        Rs. 6,000
                                    </td>

                                    <td>
                                        18.75%
                                    </td>

                                    <td>

                                        <div class="progress">

                                            <div class="progress-bar bg-warning"
                                                 style="width: 45%;">

                                            </div>

                                        </div>

                                    </td>

                                </tr>


                                <tr>

                                    <td>
                                        Academics
                                    </td>

                                    <td class="text-danger fw-bold">
                                        Rs. 5,000
                                    </td>

                                    <td>
                                        15.6%
                                    </td>

                                    <td>

                                        <div class="progress">

                                            <div class="progress-bar bg-primary"
                                                 style="width: 38%;">

                                            </div>

                                        </div>

                                    </td>

                                </tr>


                                <tr>

                                    <td>
                                        Hostel/Rent
                                    </td>

                                    <td class="text-danger fw-bold">
                                        Rs. 4,000
                                    </td>

                                    <td>
                                        12.5%
                                    </td>

                                    <td>

                                        <div class="progress">

                                            <div class="progress-bar bg-info"
                                                 style="width: 30%;">

                                            </div>

                                        </div>

                                    </td>

                                </tr>


                                <tr>

                                    <td>
                                        Entertainment
                                    </td>

                                    <td class="text-danger fw-bold">
                                        Rs. 3,000
                                    </td>

                                    <td>
                                        9.4%
                                    </td>

                                    <td>

                                        <div class="progress">

                                            <div class="progress-bar bg-success"
                                                 style="width: 22%;">

                                            </div>

                                        </div>

                                    </td>

                                </tr>


                                <tr>

                                    <td>
                                        Miscellaneous
                                    </td>

                                    <td class="text-danger fw-bold">
                                        Rs. 2,000
                                    </td>

                                    <td>
                                        6.25%
                                    </td>

                                    <td>

                                        <div class="progress">

                                            <div class="progress-bar bg-secondary"
                                                 style="width: 15%;">

                                            </div>

                                        </div>

                                    </td>

                                </tr>


                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </section>



    {{-- ================= DAILY / WEEKLY BREAKDOWN ================= --}}

    <section class="row">

        <div class="col-12">

            <div class="card">

                <div class="card-header">

                    <h4>Daily / Weekly Spending</h4>

                </div>

                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-striped">

                            <thead>

                                <tr>

                                    <th>Period</th>
                                    <th>Income</th>
                                    <th>Expenses</th>
                                    <th>Balance</th>

                                </tr>

                            </thead>

                            <tbody>

                                <tr>

                                    <td>Week 1</td>

                                    <td class="text-success">
                                        Rs. 15,000
                                    </td>

                                    <td class="text-danger">
                                        Rs. 7,000
                                    </td>

                                    <td class="fw-bold">
                                        Rs. 8,000
                                    </td>

                                </tr>


                                <tr>

                                    <td>Week 2</td>

                                    <td class="text-success">
                                        Rs. 10,000
                                    </td>

                                    <td class="text-danger">
                                        Rs. 8,000
                                    </td>

                                    <td class="fw-bold">
                                        Rs. 2,000
                                    </td>

                                </tr>


                                <tr>

                                    <td>Week 3</td>

                                    <td class="text-success">
                                        Rs. 15,000
                                    </td>

                                    <td class="text-danger">
                                        Rs. 9,000
                                    </td>

                                    <td class="fw-bold">
                                        Rs. 6,000
                                    </td>

                                </tr>


                                <tr>

                                    <td>Week 4</td>

                                    <td class="text-success">
                                        Rs. 10,000
                                    </td>

                                    <td class="text-danger">
                                        Rs. 8,000
                                    </td>

                                    <td class="fw-bold">
                                        Rs. 2,000
                                    </td>

                                </tr>

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </section>

</div>

@endsection