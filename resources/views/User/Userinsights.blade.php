<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Campus Coin - Insights</title>

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

        .card-box {
            background: white;
            border-radius: 15px;
            padding: 25px;
            height: 100%;
            box-shadow: 0 4px 15px rgba(0,0,0,0.07);
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

        .goal-icon {
            background: #fff3cd;
            color: #997404;
        }

        .card-title {
            color: #777;
            font-size: 14px;
        }

        .amount {
            font-size: 24px;
            font-weight: bold;
            margin-top: 5px;
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

        .goal {
            color: #997404;
        }

        .insight-box {
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.07);
            margin-top: 25px;
        }

        .insight-item {
            padding: 20px;
            background: #f8fafc;
            border-left: 5px solid #1769AA;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .insight-item h5 {
            color: #0B3A66;
            margin-bottom: 8px;
        }

        .progress {
            height: 12px;
            border-radius: 10px;
        }

        .category-box {
            background: #f8fafc;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
        }

    </style>

</head>


<body>

<div class="container-fluid px-4 py-5">


    <!-- Header -->

    <div class="header">

        <h2>

            <i class="fa-solid fa-lightbulb me-2"></i>

            Financial Insights

        </h2>

        <p class="mb-0 mt-2">

            Understand your spending and improve your financial habits.

        </p>

    </div>


    <!-- Cards -->

    <div class="row g-4">


        <!-- Income -->

        <div class="col-md-3">

            <div class="card-box">

                <div class="icon income-icon">

                    <i class="fa-solid fa-arrow-trend-up"></i>

                </div>

                <div class="card-title">

                    Total Income

                </div>

                <div class="amount income">

                    PKR {{ number_format($income, 2) }}

                </div>

            </div>

        </div>


        <!-- Expense -->

        <div class="col-md-3">

            <div class="card-box">

                <div class="icon expense-icon">

                    <i class="fa-solid fa-arrow-trend-down"></i>

                </div>

                <div class="card-title">

                    Total Expenses

                </div>

                <div class="amount expense">

                    PKR {{ number_format($expense, 2) }}

                </div>

            </div>

        </div>


        <!-- Balance -->

        <div class="col-md-3">

            <div class="card-box">

                <div class="icon balance-icon">

                    <i class="fa-solid fa-wallet"></i>

                </div>

                <div class="card-title">

                    Current Balance

                </div>

                <div class="amount balance">

                    PKR {{ number_format($balance, 2) }}

                </div>

            </div>

        </div>


        <!-- Savings Goal -->

        <div class="col-md-3">

            <div class="card-box">

                <div class="icon goal-icon">

                    <i class="fa-solid fa-bullseye"></i>

                </div>

                <div class="card-title">

                    Savings Goal

                </div>

                <div class="amount goal">

                    PKR {{ number_format($savingsGoal, 2) }}

                </div>

            </div>

        </div>

    </div>


    <!-- Insights -->

    <div class="insight-box">

        <h4 class="mb-4">

            <i class="fa-solid fa-chart-line me-2"></i>

            Your Financial Insights

        </h4>


        <div class="insight-item">

            <h5>

                <i class="fa-solid fa-circle-info me-2"></i>

                Summary

            </h5>

            <p class="mb-0">

                {{ $insight->Summary }}

            </p>

        </div>


        <div class="insight-item">

            <h5>

                <i class="fa-solid fa-lightbulb me-2"></i>

                Saving Tip

            </h5>

            <p class="mb-0">

                {{ $insight->Tips }}

            </p>

        </div>


        <!-- Highest Expense -->

        <div class="category-box">

            <h5>

                <i class="fa-solid fa-chart-pie me-2"></i>

                Highest Spending Category

            </h5>

            <p class="mb-1">

                {{ $highestCategory }}

            </p>

            <strong>

                PKR {{ number_format($highestAmount, 2) }}

            </strong>

        </div>


        <!-- Savings Goal -->

        @if($savingsGoal > 0)

            <div class="category-box">

                <h5>

                    <i class="fa-solid fa-bullseye me-2"></i>

                    Savings Goal Progress

                </h5>

                <p>

                    You need

                    <strong>

                        PKR {{ number_format($remainingGoal, 2) }}

                    </strong>

                    more to reach your savings goal.

                </p>


                @php

                    $progress = ($balance / $savingsGoal) * 100;

                    if ($progress > 100) {

                        $progress = 100;

                    }

                    if ($progress < 0) {

                        $progress = 0;

                    }

                @endphp


                <div class="progress">

                    <div class="progress-bar"
                         style="width: {{ $progress }}%">

                    </div>

                </div>


                <small class="text-muted">

                    {{ number_format($progress, 1) }}% completed

                </small>

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

</body>

</html>