<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Analytics</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

    <style>

        body {
            background: #f4f7fa;
            font-family: Arial, sans-serif;
        }

        .analytics-container {
            margin-top: 60px;
            margin-bottom: 60px;
        }

        .page-title {
            color: #0b3a66;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .page-description {
            color: #6c757d;
            margin-bottom: 35px;
        }

        .analytics-card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            height: 100%;
            transition: 0.3s;
        }

        .analytics-card:hover {
            transform: translateY(-5px);
        }

        .icon-box {
            width: 55px;
            height: 55px;
            border-radius: 12px;
            background: #e8f1f8;
            color: #0b3a66;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            margin-bottom: 20px;
        }

        .card-title {
            color: #6c757d;
            font-size: 15px;
            margin-bottom: 8px;
        }

        .card-value {
            color: #0b3a66;
            font-size: 28px;
            font-weight: bold;
        }

        .summary-box {
            background: white;
            border-radius: 15px;
            padding: 30px;
            margin-top: 30px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        }

        .summary-title {
            color: #0b3a66;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .balance {
            font-size: 30px;
            font-weight: bold;
            color: #0b3a66;
        }

        .back-btn {
            display: inline-block;
            margin-top: 25px;
            background: #0b3a66;
            color: white;
            text-decoration: none;
            padding: 11px 22px;
            border-radius: 8px;
        }

        .back-btn:hover {
            background: #1769aa;
            color: white;
        }

    </style>

</head>

<body>

<div class="container analytics-container">

    <!-- Page Heading -->

    <div class="text-center">

        <h1 class="page-title">
            Dashboard Analytics
        </h1>

        <p class="page-description">
            Track your income, expenses and overall transactions.
        </p>

    </div>


    <!-- Analytics Cards -->

    <div class="row g-4">

        <!-- Total Income -->

        <div class="col-md-4">

            <div class="analytics-card">

                <div class="icon-box">
                    <i class="fa-solid fa-arrow-down"></i>
                </div>

                <div class="card-title">
                    Total Income
                </div>

                <div class="card-value">
                    Rs. {{ number_format($totalIncome, 2) }}
                </div>

            </div>

        </div>


        <!-- Total Expenses -->

        <div class="col-md-4">

            <div class="analytics-card">

                <div class="icon-box">
                    <i class="fa-solid fa-arrow-up"></i>
                </div>

                <div class="card-title">
                    Total Expenses
                </div>

                <div class="card-value">
                    Rs. {{ number_format($totalExpenses, 2) }}
                </div>

            </div>

        </div>


        <!-- Total Transactions -->

        <div class="col-md-4">

            <div class="analytics-card">

                <div class="icon-box">
                    <i class="fa-solid fa-receipt"></i>
                </div>

                <div class="card-title">
                    Total Transactions
                </div>

                <div class="card-value">
                    {{ $totalTransactions }}
                </div>

            </div>

        </div>

    </div>


    <!-- Balance -->

    @php
        $balance = $totalIncome - $totalExpenses;
    @endphp

    <div class="summary-box text-center">

        <h4 class="summary-title">
            Current Balance
        </h4>

        <div class="balance">

            Rs. {{ number_format($balance, 2) }}

        </div>

        <p class="text-muted mt-2 mb-0">
            Total income minus total expenses
        </p>

    </div>


    <!-- Back Button -->

    <div class="text-center">

        <a href="{{ url('/dashboard') }}" class="back-btn">

            <i class="fa-solid fa-arrow-left"></i>

            Back to Dashboard

        </a>

    </div>

</div>

</body>

</html>