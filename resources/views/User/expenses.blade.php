@extends('layouts.user')

@section('content')

<div class="page-heading">

    <div class="row">

        <div class="col-12 col-md-6">

            <h3>Expenses</h3>

            <p class="text-subtitle text-muted">
                Track and manage where your money goes
            </p>

        </div>


        <div class="col-12 col-md-6 text-md-end">

            <a href="#" class="btn btn-danger">

                <i class="bi bi-plus-circle me-1"></i>

                Add Expense

            </a>

        </div>

    </div>

</div>


<div class="page-content">


    {{-- ================= SUMMARY CARDS ================= --}}

    <section class="row">


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

                                <i class="bi bi-arrow-down"></i>

                                All Time

                            </small>

                        </div>


                        <div class="col-4">

                            <div class="avatar avatar-lg bg-light-danger">

                                <div class="avatar-content">

                                    <i class="bi bi-wallet2 text-danger font-bold"></i>

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
                                Rs. 12,000
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
                                Expense Entries
                            </h6>

                            <h3 class="font-extrabold mb-0">
                                15
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



    {{-- ================= ADD EXPENSE FORM ================= --}}

    <section class="row">

        <div class="col-12">

            <div class="card">

                <div class="card-header">

                    <h4>Add Expense</h4>

                </div>


                <div class="card-body">

                    <form>

                        <div class="row">


                            {{-- EXPENSE TITLE --}}

                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Expense Title
                                </label>

                                <input type="text"
                                       class="form-control"
                                       placeholder="e.g. Lunch">

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
                                        Food
                                    </option>

                                    <option>
                                        Transport
                                    </option>

                                    <option>
                                        Hostel/Rent
                                    </option>

                                    <option>
                                        Academics
                                    </option>

                                    <option>
                                        Subscriptions
                                    </option>

                                    <option>
                                        Entertainment
                                    </option>

                                    <option>
                                        Miscellaneous
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
                                           id="recurringExpense">

                                    <label class="form-check-label"
                                           for="recurringExpense">

                                        Recurring Expense

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
                                        class="btn btn-danger">

                                    <i class="bi bi-check-circle me-1"></i>

                                    Save Expense

                                </button>

                            </div>


                        </div>

                    </form>

                </div>

            </div>

        </div>

    </section>



    {{-- ================= EXPENSE HISTORY ================= --}}

    <section class="row">

        <div class="col-12">

            <div class="card">


                <div class="card-header">

                    <div class="row align-items-center">


                        <div class="col-md-6">

                            <h4>Expense History</h4>

                        </div>


                        <div class="col-md-6">

                            <input type="text"
                                   class="form-control"
                                   placeholder="Search expenses...">

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


                                {{-- EXPENSE 1 --}}

                                <tr>

                                    <td>
                                        24 Sep 2026
                                    </td>


                                    <td>
                                        Lunch
                                    </td>


                                    <td>

                                        <span class="badge bg-light-danger">
                                            Food
                                        </span>

                                    </td>


                                    <td class="text-danger fw-bold">

                                        - Rs. 500

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



                                {{-- EXPENSE 2 --}}

                                <tr>

                                    <td>
                                        23 Sep 2026
                                    </td>


                                    <td>
                                        Bus Fare
                                    </td>


                                    <td>

                                        <span class="badge bg-light-primary">
                                            Transport
                                        </span>

                                    </td>


                                    <td class="text-danger fw-bold">

                                        - Rs. 300

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



                                {{-- EXPENSE 3 --}}

                                <tr>

                                    <td>
                                        22 Sep 2026
                                    </td>


                                    <td>
                                        Netflix Subscription
                                    </td>


                                    <td>

                                        <span class="badge bg-light-warning">
                                            Subscriptions
                                        </span>

                                    </td>


                                    <td class="text-danger fw-bold">

                                        - Rs. 800

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



                                {{-- EXPENSE 4 --}}

                                <tr>

                                    <td>
                                        20 Sep 2026
                                    </td>


                                    <td>
                                        Books
                                    </td>


                                    <td>

                                        <span class="badge bg-light-info">
                                            Academics
                                        </span>

                                    </td>


                                    <td class="text-danger fw-bold">

                                        - Rs. 1,500

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