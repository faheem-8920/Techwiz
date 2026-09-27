<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Campus Coin - Reports</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>

        body {
            background: #f4f7fa;
            font-family: Arial, sans-serif;
        }

        .header {
            background: #0B3A66;
            color: white;
            padding: 30px;
            border-radius: 15px;
            margin-bottom: 25px;
        }

        .header h2 {
            margin: 0;
        }

        .filter-card,
        .summary-card,
        .report-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.07);
        }

        .filter-card {
            padding: 20px;
            margin-bottom: 25px;
        }

        .summary-card {
            padding: 25px;
            height: 100%;
        }

        .icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            margin-bottom: 15px;
        }

        .income-icon {
            background: #d1e7dd;
            color: #198754;
        }

        .expense-icon {
            background: #f8d7da;
            color: #dc3545;
        }

        .balance-icon {
            background: #cfe2ff;
            color: #0d6efd;
        }

        .title {
            color: #777;
            font-size: 14px;
        }

        .amount {
            font-size: 25px;
            font-weight: bold;
        }

        .income {
            color: #198754;
        }

        .expense {
            color: #dc3545;
        }

        .balance {
            color: #0d6efd;
        }

        .report-card {
            overflow: hidden;
            margin-top: 25px;
        }

        .report-card-header {
            padding: 20px;
            border-bottom: 1px solid #eee;
            font-size: 18px;
            font-weight: bold;
        }

        .table th {
            background: #0B3A66;
            color: white;
            white-space: nowrap;
        }

        .table td {
            vertical-align: middle;
        }

        .empty {
            padding: 50px;
            text-align: center;
            color: #777;
        }

    </style>

</head>


<body>

<div class="container-fluid px-4 py-5">


    <!-- Header -->

    <div class="header">

        <h2>

            <i class="fa-solid fa-chart-pie me-2"></i>

            Financial Reports

        </h2>

        <p class="mb-0 mt-2">

            Check your income, expenses and financial activity.

        </p>

    </div>


    <!-- Filter -->

    <div class="filter-card">

        <form action="{{ url('/userreports') }}" method="GET">

            <div class="row align-items-end">


                <div class="col-md-3">

                    <label class="form-label fw-bold">

                        Report Type

                    </label>

                    <select name="filter"
                            id="filter"
                            class="form-select">

                        <option value="daily">

                            Daily

                        </option>

                        <option value="weekly">

                            Weekly

                        </option>

                        <option value="monthly" selected>

                            Monthly

                        </option>

                    </select>

                </div>


                <!-- Daily Date -->

                <div class="col-md-3" id="dailyBox">

                    <label class="form-label fw-bold">

                        Select Date

                    </label>

                    <input type="date"
                           name="date"
                           class="form-control"
                           value="{{ date('Y-m-d') }}">

                </div>


                <!-- Monthly -->

                <div class="col-md-3" id="monthlyBox">

                    <label class="form-label fw-bold">

                        Select Month

                    </label>

                    <input type="month"
                           name="month"
                           class="form-control"
                           value="{{ date('Y-m') }}">

                </div>


                <div class="col-md-3">

                    <button type="submit"
                            class="btn btn-primary w-100">

                        <i class="fa-solid fa-filter me-1"></i>

                        Generate Report

                    </button>

                </div>


            </div>

        </form>


        <!-- PDF Button -->

        <form action="{{ url('/userreportpdf') }}"
              method="GET"
              class="mt-3">

            <input type="hidden"
                   name="filter"
                   id="pdfFilter"
                   value="monthly">

            <input type="hidden"
                   name="date"
                   id="pdfDate">

            <input type="hidden"
                   name="month"
                   id="pdfMonth"
                   value="{{ date('Y-m') }}">


            <button type="submit"
                    class="btn btn-danger">

                <i class="fa-solid fa-file-pdf me-1"></i>

                Export PDF

            </button>

        </form>

    </div>


    <!-- Summary -->

    <div class="row g-4">


        <!-- Income -->

        <div class="col-md-4">

            <div class="summary-card">

                <div class="icon income-icon">

                    <i class="fa-solid fa-arrow-trend-up"></i>

                </div>

                <div class="title">

                    Total Income

                </div>

                <div class="amount income">

                    PKR {{ number_format($income, 2) }}

                </div>

            </div>

        </div>


        <!-- Expense -->

        <div class="col-md-4">

            <div class="summary-card">

                <div class="icon expense-icon">

                    <i class="fa-solid fa-arrow-trend-down"></i>

                </div>

                <div class="title">

                    Total Expenses

                </div>

                <div class="amount expense">

                    PKR {{ number_format($expense, 2) }}

                </div>

            </div>

        </div>


        <!-- Balance -->

        <div class="col-md-4">

            <div class="summary-card">

                <div class="icon balance-icon">

                    <i class="fa-solid fa-wallet"></i>

                </div>

                <div class="title">

                    Remaining Balance

                </div>

                <div class="amount balance">

                    PKR {{ number_format($balance, 2) }}

                </div>

            </div>

        </div>

    </div>


    <!-- Transactions -->

    <div class="report-card">

        <div class="report-card-header">

            <i class="fa-solid fa-list me-2"></i>

            Transactions

        </div>


        @if($transactions->count() > 0)

            <div class="table-responsive">

                <table class="table table-hover mb-0">

                    <thead>

                        <tr>

                            <th>#</th>

                            <th>Date</th>

                            <th>Category</th>

                            <th>Description</th>

                            <th>Amount</th>

                        </tr>

                    </thead>


                    <tbody>

                        @foreach($transactions as $transaction)

                            @php

                                $category = \App\Models\Category::find($transaction->category_id);

                            @endphp


                            <tr>

                                <td>

                                    {{ $loop->iteration }}

                                </td>

                                <td>

                                    {{ $transaction->Date }}

                                </td>

                                <td>

                                    @if($category)

                                        {{ $category->Name }}

                                    @else

                                        Unknown

                                    @endif

                                </td>

                                <td>

                                    {{ $transaction->Description }}

                                </td>

                                <td>

                                    <strong>

                                        PKR {{ number_format($transaction->Amount, 2) }}

                                    </strong>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        @else

            <div class="empty">

                <i class="fa-solid fa-file-circle-xmark fa-3x mb-3"></i>

                <h5>No Transactions Found</h5>

                <p>

                    No transactions were found for this period.

                </p>

            </div>

        @endif

    </div>


    <!-- Back -->

    <div class="mt-4">

        <a href="{{ url('/dashboard') }}"
           class="btn btn-outline-secondary">

            <i class="fa-solid fa-arrow-left me-1"></i>

            Back to Dashboard

        </a>

    </div>


</div>


<script>

    var filter = document.getElementById('filter');

    var dailyBox = document.getElementById('dailyBox');

    var monthlyBox = document.getElementById('monthlyBox');

    var pdfFilter = document.getElementById('pdfFilter');

    var pdfDate = document.getElementById('pdfDate');

    var pdfMonth = document.getElementById('pdfMonth');

    var dateInput = document.querySelector('input[name="date"]');

    var monthInput = document.querySelector('input[name="month"]');


    function changeFilter()
    {
        pdfFilter.value = filter.value;

        pdfDate.value = dateInput.value;

        pdfMonth.value = monthInput.value;


        if (filter.value == 'daily') {

            dailyBox.style.display = 'block';

            monthlyBox.style.display = 'none';

        }

        else if (filter.value == 'weekly') {

            dailyBox.style.display = 'none';

            monthlyBox.style.display = 'none';

        }

        else {

            dailyBox.style.display = 'none';

            monthlyBox.style.display = 'block';

        }
    }


    filter.addEventListener('change', changeFilter);

    dateInput.addEventListener('change', changeFilter);

    monthInput.addEventListener('change', changeFilter);

    changeFilter();

</script>


</body>

</html>