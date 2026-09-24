@extends('layouts.user')

@section('content')

<div class="page-heading">

    <div class="row">

        <div class="col-12 col-md-6">
            <h3>Income</h3>

            <p class="text-subtitle text-muted">
                Track and manage your incoming money
            </p>
        </div>

        <div class="col-12 col-md-6 text-md-end">

            <a href="#" class="btn btn-primary">
                <i class="bi bi-plus-circle me-1"></i>
                Add Income
            </a>

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
                                All Time
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


        {{-- THIS MONTH --}}
        <div class="col-12 col-md-4">

            <div class="card">

                <div class="card-body">

                    <div class="row">

                        <div class="col-8">

                            <h6 class="text-muted font-semibold">
                                This Month
                            </h6>

                            <h3 class="font-extrabold mb-0">
                                Rs. 25,000
                            </h3>

                            <small class="text-primary">
                                <i class="bi bi-calendar3"></i>
                                September
                            </small>

                        </div>

                        <div class="col-4">

                            <div class="avatar avatar-lg bg-light-primary">

                                <div class="avatar-content">

                                    <i class="bi bi-calendar-check text-primary font-bold"></i>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- NUMBER OF ENTRIES --}}
        <div class="col-12 col-md-4">

            <div class="card">

                <div class="card-body">

                    <div class="row">

                        <div class="col-8">

                            <h6 class="text-muted font-semibold">
                                Income Entries
                            </h6>

                            <h3 class="font-extrabold mb-0">
                                8
                            </h3>

                            <small class="text-muted">
                                Total records
                            </small>

                        </div>

                        <div class="col-4">

                            <div class="avatar avatar-lg bg-light-warning">

                                <div class="avatar-content">

                                    <i class="bi bi-list-ul text-warning font-bold"></i>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- ADD INCOME FORM --}}
    <section class="row">

        <div class="col-12">

            <div class="card">

                <div class="card-header">

                    <h4>Add Income</h4>

                </div>

                <div class="card-body">

                    <form>

                        <div class="row">

                            {{-- TITLE --}}
                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Income Title
                                </label>

                                <input type="text"
                                       class="form-control"
                                       placeholder="e.g. Monthly Allowance">

                            </div>


                            {{-- AMOUNT --}}
                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Amount
                                </label>

                                <input type="number"
                                       class="form-control"
                                       placeholder="Enter amount">

                            </div>


                            {{-- CATEGORY --}}
                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Category
                                </label>

                                <select class="form-select">

                                    <option selected>
                                        Select Category
                                    </option>

                                    <option>
                                        Allowance
                                    </option>

                                    <option>
                                        Part-time Job
                                    </option>

                                    <option>
                                        Scholarship
                                    </option>

                                    <option>
                                        Gift
                                    </option>

                                    <option>
                                        Other Income
                                    </option>

                                </select>

                            </div>


                            {{-- DATE --}}
                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Date
                                </label>

                                <input type="date"
                                       class="form-control">

                            </div>


                            {{-- RECURRING --}}
                            <div class="col-md-6 mb-3">

                                <div class="form-check">

                                    <input class="form-check-input"
                                           type="checkbox"
                                           id="recurringIncome">

                                    <label class="form-check-label"
                                           for="recurringIncome">

                                        Recurring Income

                                    </label>

                                </div>

                            </div>


                            {{-- FREQUENCY --}}
                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Frequency
                                </label>

                                <select class="form-select">

                                    <option selected>
                                        Select Frequency
                                    </option>

                                    <option>
                                        Daily
                                    </option>

                                    <option>
                                        Weekly
                                    </option>

                                    <option>
                                        Monthly
                                    </option>

                                    <option>
                                        Yearly
                                    </option>

                                </select>

                            </div>


                            {{-- DESCRIPTION --}}
                            <div class="col-12 mb-3">

                                <label class="form-label">
                                    Description
                                </label>

                                <textarea class="form-control"
                                          rows="3"
                                          placeholder="Add a short description"></textarea>

                            </div>


                            {{-- BUTTONS --}}
                            <div class="col-12">

                                <button type="reset"
                                        class="btn btn-light-secondary">

                                    Cancel

                                </button>

                                <button type="button"
                                        class="btn btn-primary">

                                    <i class="bi bi-check-circle me-1"></i>

                                    Save Income

                                </button>

                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </section>


    {{-- INCOME HISTORY --}}
    <section class="row">

        <div class="col-12">

            <div class="card">

                <div class="card-header">

                    <div class="row align-items-center">

                        <div class="col-md-6">

                            <h4>Income History</h4>

                        </div>

                        <div class="col-md-6">

                            <input type="text"
                                   class="form-control"
                                   placeholder="Search income...">

                        </div>

                    </div>

                </div>


                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-hover">

                            <thead>

                                <tr>

                                    <th>Date</th>

                                    <th>Title</th>

                                    <th>Category</th>

                                    <th>Amount</th>

                                    <th>Recurring</th>

                                    <th>Action</th>

                                </tr>

                            </thead>


                            <tbody>

                                <tr>

                                    <td>
                                        24 Sep 2026
                                    </td>

                                    <td>
                                        Monthly Allowance
                                    </td>

                                    <td>
                                        <span class="badge bg-light-primary">
                                            Allowance
                                        </span>
                                    </td>

                                    <td class="text-success fw-bold">
                                        + Rs. 20,000
                                    </td>

                                    <td>
                                        <span class="badge bg-light-success">
                                            Yes
                                        </span>
                                    </td>

                                    <td>

                                        <button class="btn btn-sm btn-outline-primary">
                                            <i class="bi bi-pencil"></i>
                                        </button>

                                        <button class="btn btn-sm btn-outline-danger">
                                            <i class="bi bi-trash"></i>
                                        </button>

                                    </td>

                                </tr>


                                <tr>

                                    <td>
                                        20 Sep 2026
                                    </td>

                                    <td>
                                        Freelance Work
                                    </td>

                                    <td>
                                        <span class="badge bg-light-warning">
                                            Part-time Job
                                        </span>
                                    </td>

                                    <td class="text-success fw-bold">
                                        + Rs. 5,000
                                    </td>

                                    <td>
                                        <span class="badge bg-light-secondary">
                                            No
                                        </span>
                                    </td>

                                    <td>

                                        <button class="btn btn-sm btn-outline-primary">
                                            <i class="bi bi-pencil"></i>
                                        </button>

                                        <button class="btn btn-sm btn-outline-danger">
                                            <i class="bi bi-trash"></i>
                                        </button>

                                    </td>

                                </tr>


                                <tr>

                                    <td>
                                        10 Sep 2026
                                    </td>

                                    <td>
                                        Scholarship
                                    </td>

                                    <td>
                                        <span class="badge bg-light-info">
                                            Scholarship
                                        </span>
                                    </td>

                                    <td class="text-success fw-bold">
                                        + Rs. 10,000
                                    </td>

                                    <td>
                                        <span class="badge bg-light-secondary">
                                            No
                                        </span>
                                    </td>

                                    <td>

                                        <button class="btn btn-sm btn-outline-primary">
                                            <i class="bi bi-pencil"></i>
                                        </button>

                                        <button class="btn btn-sm btn-outline-danger">
                                            <i class="bi bi-trash"></i>
                                        </button>

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