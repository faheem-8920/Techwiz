<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>My Budgets | Campus Coin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #f4f7fb;
            font-family: Arial, sans-serif;
            color: #1e293b;
        }

        .page-wrapper {
            padding: 40px 15px 60px;
        }

        .container-custom {
            max-width: 1250px;
            margin: auto;
        }

        .page-header {
            background: linear-gradient(135deg, #0b3a66, #1769aa);
            color: white;
            padding: 32px;
            border-radius: 20px;
            margin-bottom: 25px;
            box-shadow: 0 10px 30px rgba(11,58,102,0.15);
            position: relative;
            overflow: hidden;
        }

        .page-header::after {
            content: "";
            position: absolute;
            width: 240px;
            height: 240px;
            border-radius: 50%;
            background: rgba(255,255,255,0.07);
            right: -80px;
            top: -100px;
        }

        .header-content {
            position: relative;
            z-index: 2;
        }

        .header-icon {
            width: 55px;
            height: 55px;
            border-radius: 14px;
            background: rgba(255,255,255,0.14);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            margin-bottom: 15px;
        }

        .page-header h2 {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 7px;
        }

        .page-header p {
            opacity: 0.85;
            margin-bottom: 0;
        }

        .add-budget-btn {
            position: relative;
            z-index: 2;
            background: white;
            color: #0b3a66;
            border: none;
            border-radius: 10px;
            padding: 12px 20px;
            font-weight: 700;
            text-decoration: none;
            transition: 0.2s;
        }

        .add-budget-btn:hover {
            background: #f8fafc;
            color: #1769aa;
            transform: translateY(-1px);
        }

        .summary-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
            margin-bottom: 25px;
        }

        .summary-card {
            background: white;
            border-radius: 15px;
            padding: 22px;
            border: 1px solid #e7edf3;
            box-shadow: 0 5px 18px rgba(15,23,42,0.05);
        }

        .summary-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 12px;
        }

        .summary-label {
            color: #64748b;
            font-size: 13px;
            font-weight: 600;
        }

        .summary-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background: #eff6ff;
            color: #1769aa;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .summary-value {
            font-size: 23px;
            font-weight: 700;
            color: #0f172a;
        }

        .budget-list-card {
            background: white;
            border-radius: 18px;
            border: 1px solid #e5eaf0;
            box-shadow: 0 7px 25px rgba(15,23,42,0.06);
            overflow: hidden;
        }

        .list-header {
            padding: 22px 25px;
            border-bottom: 1px solid #edf1f5;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .list-header h5 {
            margin: 0;
            font-weight: 700;
        }

        .month-label {
            color: #64748b;
            font-size: 14px;
        }

        .table {
            margin-bottom: 0;
        }

        .table thead th {
            background: #f8fafc;
            color: #64748b;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 700;
            padding: 16px 18px;
            border-bottom: 1px solid #e5e7eb;
            white-space: nowrap;
        }

        .table tbody td {
            padding: 18px;
            vertical-align: middle;
            border-bottom: 1px solid #f0f2f5;
        }

        .table tbody tr:last-child td {
            border-bottom: none;
        }

        .table tbody tr {
            transition: 0.2s;
        }

        .table tbody tr:hover {
            background: #f8fbff;
        }

        .category-wrapper {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .category-icon {
            width: 42px;
            height: 42px;
            border-radius: 11px;
            background: #eff6ff;
            color: #1769aa;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .category-name {
            font-weight: 700;
            color: #1e293b;
        }

        .category-sub {
            font-size: 12px;
            color: #94a3b8;
            margin-top: 2px;
        }

        .amount {
            font-weight: 700;
            color: #0f172a;
        }

        .spent-amount {
            font-weight: 700;
            color: #dc3545;
        }

        .remaining-amount {
            font-weight: 700;
            color: #198754;
        }

        .exceeded-amount {
            font-weight: 700;
            color: #dc3545;
        }

        .progress-wrapper {
            min-width: 160px;
        }

        .progress {
            height: 8px;
            background: #e9eef3;
            border-radius: 20px;
            overflow: hidden;
        }

        .progress-bar {
            border-radius: 20px;
        }

        .progress-normal {
            background: #198754;
        }

        .progress-warning {
            background: #ffc107;
        }

        .progress-danger {
            background: #dc3545;
        }

        .progress-text {
            display: flex;
            justify-content: space-between;
            margin-top: 6px;
            font-size: 12px;
            color: #64748b;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 7px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
            white-space: nowrap;
        }

        .status-safe {
            background: #dcfce7;
            color: #166534;
        }

        .status-warning {
            background: #fef3c7;
            color: #92400e;
        }

        .status-exceeded {
            background: #fee2e2;
            color: #991b1b;
        }

        .action-btn {
            width: 38px;
            height: 38px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 9px;
            margin: 2px;
        }

        .empty-box {
            padding: 80px 20px;
            text-align: center;
        }

        .empty-icon {
            width: 80px;
            height: 80px;
            margin: auto auto 20px;
            border-radius: 22px;
            background: #eff6ff;
            color: #1769aa;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
        }

        .empty-box h4 {
            font-weight: 700;
            margin-bottom: 8px;
        }

        .empty-box p {
            color: #64748b;
            margin-bottom: 25px;
        }

        .bottom-navigation {
            margin-top: 22px;
        }

        .dashboard-btn {
            border-radius: 9px;
            padding: 10px 18px;
            font-weight: 600;
        }

        .alert-box {
            padding: 14px 18px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        @media (max-width: 1000px) {

            .summary-grid {
                grid-template-columns: 1fr;
            }

        }

        @media (max-width: 700px) {

            .page-wrapper {
                padding: 25px 10px 40px;
            }

            .page-header {
                padding: 25px 20px;
            }

            .page-header h2 {
                font-size: 23px;
            }

            .list-header {
                align-items: flex-start;
                flex-direction: column;
                gap: 8px;
            }

            .table thead {
                display: none;
            }

            .table,
            .table tbody,
            .table tr,
            .table td {
                display: block;
                width: 100%;
            }

            .table tbody tr {
                padding: 15px;
                border-bottom: 1px solid #e5e7eb;
            }

            .table tbody td {
                border: none;
                padding: 10px 5px;
            }

            .table tbody td::before {
                content: attr(data-label);
                display: block;
                color: #94a3b8;
                font-size: 11px;
                font-weight: 700;
                text-transform: uppercase;
                margin-bottom: 5px;
            }

            .progress-wrapper {
                min-width: 100%;
            }

        }

    </style>

</head>

<body>

<div class="page-wrapper">

    <div class="container-custom">

        <!-- Header -->

        <div class="page-header">

            <div class="header-content d-flex justify-content-between align-items-center flex-wrap gap-4">

                <div>

                    <div class="header-icon">
                        <i class="fa-solid fa-wallet"></i>
                    </div>

                    <h2>My Budgets</h2>

                    <p>
                        Track your category spending and stay within your limits.
                    </p>

                </div>

                <a href="{{ url('/useraddbudget') }}"
                   class="add-budget-btn">

                    <i class="fa-solid fa-plus me-2"></i>
                    Add Budget

                </a>

            </div>

        </div>


        @if(session('success'))

            <div class="alert alert-success alert-box">

                <i class="fa-solid fa-circle-check me-2"></i>

                {{ session('success') }}

            </div>

        @endif


        @if(session('error'))

            <div class="alert alert-danger alert-box">

                <i class="fa-solid fa-circle-exclamation me-2"></i>

                {{ session('error') }}

            </div>

        @endif


        @if($budgets->count() > 0)

            @php

                $totalLimit = 0;
                $totalSpent = 0;

                foreach($budgets as $budget) {

                    $totalLimit = $totalLimit + $budget->LimitAmount;

                    $totalSpent = $totalSpent + ($budget->spent ?? 0);

                }

                $totalRemaining = $totalLimit - $totalSpent;

                if($totalLimit > 0) {
                    $overallPercentage = ($totalSpent / $totalLimit) * 100;
                } else {
                    $overallPercentage = 0;
                }

                if($overallPercentage > 100) {
                    $overallPercentage = 100;
                }

            @endphp


            <!-- Summary -->

            <div class="summary-grid">

                <div class="summary-card">

                    <div class="summary-top">

                        <div class="summary-label">
                            TOTAL BUDGET
                        </div>

                        <div class="summary-icon">
                            <i class="fa-solid fa-wallet"></i>
                        </div>

                    </div>

                    <div class="summary-value">
                        PKR {{ number_format($totalLimit, 2) }}
                    </div>

                </div>


                <div class="summary-card">

                    <div class="summary-top">

                        <div class="summary-label">
                            SPENT THIS MONTH
                        </div>

                        <div class="summary-icon">
                            <i class="fa-solid fa-chart-line"></i>
                        </div>

                    </div>

                    <div class="summary-value">
                        PKR {{ number_format($totalSpent, 2) }}
                    </div>

                </div>


                <div class="summary-card">

                    <div class="summary-top">

                        <div class="summary-label">
                            REMAINING
                        </div>

                        <div class="summary-icon">
                            <i class="fa-solid fa-piggy-bank"></i>
                        </div>

                    </div>

                    <div class="summary-value
                        {{ $totalRemaining < 0 ? 'text-danger' : 'text-success' }}">

                        PKR {{ number_format(abs($totalRemaining), 2) }}

                    </div>

                    <small class="text-muted">

                        @if($totalRemaining < 0)
                            amount over budget
                        @else
                            available budget
                        @endif

                    </small>

                </div>

            </div>


            <!-- Budget List -->

            <div class="budget-list-card">

                <div class="list-header">

                    <h5>
                        <i class="fa-solid fa-list-check me-2 text-primary"></i>
                        Budget Overview
                    </h5>

                    <span class="month-label">

                        <i class="fa-regular fa-calendar me-1"></i>

                        {{ date('F Y') }}

                    </span>

                </div>


                <div class="table-responsive">

                    <table class="table">

                        <thead>

                            <tr>

                                <th>#</th>

                                <th>Category</th>

                                <th>Budget Limit</th>

                                <th>Spent</th>

                                <th>Progress</th>

                                <th>Remaining</th>

                                <th>Status</th>

                                <th class="text-center">Actions</th>

                            </tr>

                        </thead>


                        <tbody>

                        @foreach($budgets as $budget)

                            @php

                                $spent = $budget->spent ?? 0;

                                $limit = $budget->LimitAmount;

                                if($limit > 0) {
                                    $percentage = ($spent / $limit) * 100;
                                } else {
                                    $percentage = 0;
                                }

                                $displayPercentage = $percentage;

                                if($displayPercentage > 100) {
                                    $displayPercentage = 100;
                                }

                                $remaining = $limit - $spent;

                            @endphp

                            <tr>

                                <td data-label="#">

                                    <span class="text-muted fw-semibold">
                                        {{ $loop->iteration }}
                                    </span>

                                </td>


                                <td data-label="Category">

                                    <div class="category-wrapper">

                                        <div class="category-icon">
                                            <i class="fa-solid fa-utensils"></i>
                                        </div>

                                        <div>

                                            <div class="category-name">

                                                @if($budget->category)

                                                    {{ $budget->category->Name }}

                                                @else

                                                    Category not found

                                                @endif

                                            </div>

                                            <div class="category-sub">
                                                Expense Budget
                                            </div>

                                        </div>

                                    </div>

                                </td>


                                <td data-label="Budget Limit">

                                    <span class="amount">

                                        PKR {{ number_format($limit, 2) }}

                                    </span>

                                </td>


                                <td data-label="Spent">

                                    <span class="spent-amount">

                                        PKR {{ number_format($spent, 2) }}

                                    </span>

                                </td>


                                <td data-label="Progress">

                                    <div class="progress-wrapper">

                                        <div class="progress">

                                            @if($percentage > 100)

                                                <div class="progress-bar progress-danger"
                                                     style="width: 100%;"></div>

                                            @elseif($percentage >= 80)

                                                <div class="progress-bar progress-warning"
                                                     style="width: {{ $displayPercentage }}%;"></div>

                                            @else

                                                <div class="progress-bar progress-normal"
                                                     style="width: {{ $displayPercentage }}%;"></div>

                                            @endif

                                        </div>

                                        <div class="progress-text">

                                            <span>
                                                {{ number_format($percentage, 1) }}%
                                            </span>

                                            <span>
                                                used
                                            </span>

                                        </div>

                                    </div>

                                </td>


                                <td data-label="Remaining">

                                    @if($remaining >= 0)

                                        <span class="remaining-amount">

                                            PKR {{ number_format($remaining, 2) }}

                                        </span>

                                    @else

                                        <span class="exceeded-amount">

                                            PKR {{ number_format(abs($remaining), 2) }}

                                        </span>

                                        <div class="text-danger small">
                                            over limit
                                        </div>

                                    @endif

                                </td>


                                <td data-label="Status">

                                    @if($percentage > 100)

                                        <span class="status-badge status-exceeded">

                                            <i class="fa-solid fa-triangle-exclamation"></i>
                                            Exceeded

                                        </span>

                                    @elseif($percentage >= 80)

                                        <span class="status-badge status-warning">

                                            <i class="fa-solid fa-clock"></i>
                                            Near Limit

                                        </span>

                                    @else

                                        <span class="status-badge status-safe">

                                            <i class="fa-solid fa-circle-check"></i>
                                            On Track

                                        </span>

                                    @endif

                                </td>


                                <td data-label="Actions" class="text-center">

                                    <a href="{{ url('/usereditbudget/'.$budget->id) }}"
                                       class="btn btn-primary action-btn"
                                       title="Edit Budget">

                                        <i class="fa-solid fa-pen"></i>

                                    </a>

                                    <a href="{{ url('/userdeletebudget/'.$budget->id) }}"
                                       class="btn btn-outline-danger action-btn"
                                       title="Delete Budget"
                                       onclick="return confirm('Are you sure you want to delete this budget?')">

                                        <i class="fa-solid fa-trash"></i>

                                    </a>

                                </td>

                            </tr>

                        @endforeach

                        </tbody>

                    </table>

                </div>

            </div>


        @else

            <!-- Empty State -->

            <div class="budget-list-card">

                <div class="empty-box">

                    <div class="empty-icon">

                        <i class="fa-solid fa-wallet"></i>

                    </div>

                    <h4>No Budgets Yet</h4>

                    <p>
                        Create your first category budget and start tracking your spending.
                    </p>

                    <a href="{{ url('/useraddbudget') }}"
                       class="btn btn-primary px-4 py-2">

                        <i class="fa-solid fa-plus me-2"></i>
                        Create Your First Budget

                    </a>

                </div>

            </div>

        @endif


        <!-- Bottom Navigation -->

        <div class="bottom-navigation">

            <a href="{{ url('/dashboard') }}"
               class="btn btn-outline-secondary dashboard-btn">

                <i class="fa-solid fa-arrow-left me-2"></i>
                Back to Dashboard

            </a>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>