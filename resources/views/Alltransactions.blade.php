<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>All Transactions</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f4f7fa;
            font-family: Arial, sans-serif;
        }

        .container-box {
            margin-top: 50px;
            margin-bottom: 50px;
        }

        .page-title {
            color: #0b3a66;
            font-weight: bold;
            margin-bottom: 25px;
        }

        .transaction-card {
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        }

        .table th {
            background: #0b3a66;
            color: white;
        }

        .table td,
        .table th {
            vertical-align: middle;
            padding: 14px;
        }

        .income {
            background: #d1e7dd;
            color: #0f5132;
            padding: 6px 12px;
            border-radius: 20px;
            font-weight: bold;
        }

        .expense {
            background: #f8d7da;
            color: #842029;
            padding: 6px 12px;
            border-radius: 20px;
            font-weight: bold;
        }

        .amount {
            font-weight: bold;
            color: #0b3a66;
        }

        .back-btn {
            display: inline-block;
            margin-top: 20px;
            background: #0b3a66;
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 8px;
        }

        .back-btn:hover {
            background: #1769aa;
            color: white;
        }
    </style>
</head>

<body>

<div class="container container-box">

    <h2 class="page-title">All Transactions</h2>

    <div class="transaction-card">

        @if($transactions->count() > 0)

            <div class="table-responsive">

                <table class="table table-bordered table-hover">

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Date</th>
                            <th>Category Name</th>
                            <th>Category Type</th>
                            <th>Amount</th>
                            <th>Description</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($transactions as $transaction)

                            <tr>

                                <td>
                                    {{ $transaction->id }}
                                </td>

                                <td>
                                    {{ $transaction->Date }}
                                </td>
<td>
    {{ \App\Models\Category::find($transaction->category_id)->Name }}
</td>


<td>
    {{ ucfirst(\App\Models\Category::find($transaction->category_id)->type) }}
</td>
                                <td class="amount">
                                    Rs. {{ number_format($transaction->Amount, 2) }}
                                </td>

                                <td>
                                    {{ $transaction->Description }}
                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        @else

            <div class="alert alert-info">
                You have no transactions yet.
            </div>

        @endif

        <a href="{{ url('/addtransaction') }}" class="back-btn">
            Add New Transaction
        </a>

    </div>

</div>

</body>

</html>
