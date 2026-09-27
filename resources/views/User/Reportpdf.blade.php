<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <title>Campus Coin Financial Report</title>

    <style>

        body {
            font-family: DejaVu Sans, Arial, sans-serif;
            background: #f5f7fa;
            color: #333;
            margin: 0;
            padding: 30px;
        }

        .container {
            width: 100%;
        }

        /* Header */

        .header {
            background: #0B3A66;
            color: white;
            padding: 25px;
            text-align: center;
            border-radius: 8px;
            margin-bottom: 25px;
        }

        .header h1 {
            margin: 0;
            font-size: 26px;
        }

        .header p {
            margin: 8px 0 0;
            font-size: 13px;
        }

        /* Report Information */

        .report-info {
            background: white;
            border: 1px solid #e0e0e0;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 6px;
        }

        .report-info table {
            width: 100%;
            border: none;
            margin: 0;
        }

        .report-info td {
            border: none;
            padding: 5px;
            font-size: 13px;
        }

        .label {
            font-weight: bold;
            color: #666;
        }

        /* Summary */

        .summary-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 10px;
            margin: 0 -10px 25px;
        }

        .summary-table td {
            width: 33.33%;
            padding: 18px;
            border: 1px solid #ddd;
            background: white;
            text-align: center;
            border-radius: 6px;
        }

        .summary-title {
            font-size: 13px;
            color: #777;
            margin-bottom: 8px;
        }

        .summary-amount {
            font-size: 21px;
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

        /* Section Heading */

        .section-title {
            background: #0B3A66;
            color: white;
            padding: 12px 15px;
            font-size: 16px;
            font-weight: bold;
            margin-top: 10px;
        }

        /* Transactions */

        .transactions {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }

        .transactions th {
            background: #1769AA;
            color: white;
            padding: 11px 8px;
            font-size: 12px;
            text-align: left;
        }

        .transactions td {
            border: 1px solid #ddd;
            padding: 10px 8px;
            font-size: 11px;
        }

        .transactions tr:nth-child(even) {
            background: #f8fafc;
        }

        .amount {
            font-weight: bold;
        }

        /* No Data */

        .no-data {
            text-align: center;
            padding: 30px;
            background: white;
            border: 1px solid #ddd;
            color: #777;
        }

        /* Footer */

        .footer {
            margin-top: 30px;
            padding-top: 15px;
            border-top: 1px solid #ddd;
            text-align: center;
            color: #777;
            font-size: 10px;
        }

    </style>

</head>


<body>

<div class="container">


    <!-- Header -->

    <div class="header">

        <h1>Campus Coin</h1>

        <p>Personal Financial Management System</p>

        <p>Financial Report</p>

    </div>


    <!-- Report Information -->

    <div class="report-info">

        <table>

            <tr>

                <td>
                    <span class="label">Report Type:</span>

                    @if(isset($filter))

                        {{ ucfirst($filter) }}

                    @else

                        Monthly

                    @endif
                </td>

                <td style="text-align: right;">

                    <span class="label">Generated:</span>

                    {{ date('d M Y') }}

                </td>

            </tr>

        </table>

    </div>


    <!-- Summary -->

    <table class="summary-table">

        <tr>

            <td>

                <div class="summary-title">
                    TOTAL INCOME
                </div>

                <div class="summary-amount income">

                    PKR {{ number_format($income, 2) }}

                </div>

            </td>


            <td>

                <div class="summary-title">
                    TOTAL EXPENSES
                </div>

                <div class="summary-amount expense">

                    PKR {{ number_format($expense, 2) }}

                </div>

            </td>


            <td>

                <div class="summary-title">
                    REMAINING BALANCE
                </div>

                <div class="summary-amount balance">

                    PKR {{ number_format($balance, 2) }}

                </div>

            </td>

        </tr>

    </table>


    <!-- Transactions -->

    <div class="section-title">

        Transaction History

    </div>


    @if($transactions->count() > 0)

        <table class="transactions">

            <tr>

                <th style="width: 15%;">
                    Date
                </th>

                <th style="width: 20%;">
                    Category
                </th>

                <th style="width: 45%;">
                    Description
                </th>

                <th style="width: 20%;">
                    Amount
                </th>

            </tr>


            @foreach($transactions as $transaction)

                @php

                    $category = \App\Models\Category::find($transaction->category_id);

                @endphp


                <tr>

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

                        @if($transaction->Description)

                            {{ $transaction->Description }}

                        @else

                            No description

                        @endif

                    </td>


                    <td class="amount">

                        PKR {{ number_format($transaction->Amount, 2) }}

                    </td>

                </tr>

            @endforeach

        </table>

    @else

        <div class="no-data">

            No transactions found for this report.

        </div>

    @endif


    <!-- Footer -->

    <div class="footer">

        <strong>Campus Coin</strong>

        <br>

        Student Personal Finance Tracker

        <br><br>

        This report was generated automatically by Campus Coin.

    </div>


</div>

</body>

</html>
