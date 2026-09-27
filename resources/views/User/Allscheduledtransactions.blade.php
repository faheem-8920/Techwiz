<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Scheduled Transactions | Campus Coin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>

        body {
            background: #f4f7fb;
            font-family: Arial, sans-serif;
        }

        .page-wrapper {
            padding: 40px 15px 60px;
        }

        .container-box {
            max-width: 1250px;
            margin: auto;
        }

        .header {
            background: linear-gradient(135deg, #0b3a66, #1769aa);
            color: white;
            padding: 32px;
            border-radius: 20px;
            margin-bottom: 25px;
            box-shadow: 0 10px 30px rgba(11,58,102,.15);
        }

        .header-icon {
            width: 55px;
            height: 55px;
            background: rgba(255,255,255,.14);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            margin-bottom: 15px;
        }

        .header h2 {
            font-weight: 700;
            margin-bottom: 7px;
        }

        .header p {
            margin: 0;
            opacity: .85;
        }

        .add-btn {
            background: white;
            color: #0b3a66;
            border: none;
            border-radius: 10px;
            padding: 12px 20px;
            font-weight: 700;
            text-decoration: none;
        }

        .add-btn:hover {
            color: #1769aa;
        }

        .table-card {
            background: white;
            border-radius: 18px;
            overflow: hidden;
            border: 1px solid #e5eaf0;
            box-shadow: 0 7px 25px rgba(15,23,42,.06);
        }

        .table thead th {
            background: #f8fafc;
            color: #64748b;
            text-transform: uppercase;
            font-size: 12px;
            letter-spacing: .4px;
            padding: 17px;
            white-space: nowrap;
        }

        .table td {
            padding: 18px 17px;
            vertical-align: middle;
        }

        .category {
            font-weight: 700;
            color: #1e293b;
        }

        .description {
            color: #64748b;
            font-size: 13px;
            margin-top: 3px;
        }

        .amount {
            color: #0b3a66;
            font-weight: 700;
        }

        .frequency {
            background: #eff6ff;
            color: #1d4ed8;
            padding: 7px 11px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
        }

        .status-active {
            background: #dcfce7;
            color: #166534;
            padding: 7px 11px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
        }

        .status-paused {
            background: #f1f5f9;
            color: #64748b;
            padding: 7px 11px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
        }

        .action-btn {
            width: 38px;
            height: 38px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            margin: 2px;
        }

        .empty {
            text-align: center;
            padding: 75px 20px;
        }

        .empty-icon {
            width: 80px;
            height: 80px;
            border-radius: 22px;
            background: #eff6ff;
            color: #1769aa;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            margin: auto auto 20px;
        }

        .empty h4 {
            font-weight: 700;
        }

        .empty p {
            color: #64748b;
        }

        .success-alert {
            border-radius: 12px;
        }

        @media(max-width:700px) {

            .page-wrapper {
                padding: 25px 10px;
            }

            .header {
                padding: 25px 20px;
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

            .table tr {
                border-bottom: 1px solid #e5e7eb;
                padding: 12px;
            }

            .table td {
                border: none;
                padding: 9px 5px;
            }

            .table td::before {
                content: attr(data-label);
                display: block;
                color: #94a3b8;
                font-size: 11px;
                text-transform: uppercase;
                font-weight: 700;
                margin-bottom: 4px;
            }

        }

    </style>

</head>

<body>

<div class="page-wrapper">

    <div class="container-box">

        <div class="header">

            <div class="d-flex justify-content-between align-items-center flex-wrap gap-4">

                <div>

                    <div class="header-icon">
                        <i class="fa-solid fa-calendar-days"></i>
                    </div>

                    <h2>Scheduled Transactions</h2>

                    <p>
                        Automatically manage your regular income and expenses.
                    </p>

                </div>

                <a href="{{ url('/useraddscheduledtransaction') }}"
                   class="add-btn">

                    <i class="fa-solid fa-plus me-2"></i>
                    Add Scheduled Transaction

                </a>

            </div>

        </div>


        @if(session('success'))

            <div class="alert alert-success success-alert">

                <i class="fa-solid fa-circle-check me-2"></i>

                {{ session('success') }}

            </div>

        @endif


        <div class="table-card">

            @if($scheduledTransactions->count() > 0)

                <div class="table-responsive">

                    <table class="table table-hover mb-0">

                        <thead>

                            <tr>

                                <th>#</th>
                                <th>Category</th>
                                <th>Amount</th>
                                <th>Frequency</th>
                                <th>Next Date</th>
                                <th>Status</th>
                                <th>Actions</th>

                            </tr>

                        </thead>

                        <tbody>

                        @foreach($scheduledTransactions as $scheduled)

                            <tr>

                                <td data-label="#">

                                    {{ $loop->iteration }}

                                </td>


                                <td data-label="Category">

                                    <div class="category">

                                        {{ $scheduled->category->Name ?? 'Category not found' }}

                                    </div>

                                    <div class="description">

                                        {{ $scheduled->Description ?? 'No description' }}

                                    </div>

                                </td>


                                <td data-label="Amount">

                                    <span class="amount">

                                        PKR {{ number_format($scheduled->Amount, 2) }}

                                    </span>

                                </td>


                                <td data-label="Frequency">

                                    <span class="frequency">

                                        <i class="fa-solid fa-repeat me-1"></i>

                                        {{ $scheduled->Frequency }}

                                    </span>

                                </td>


                                <td data-label="Next Date">

                                    {{ date('d M Y', strtotime($scheduled->NextDate)) }}

                                </td>


                                <td data-label="Status">

                                    @if($scheduled->Status)

                                        <span class="status-active">

                                            <i class="fa-solid fa-circle-check me-1"></i>
                                            Active

                                        </span>

                                    @else

                                        <span class="status-paused">

                                            <i class="fa-solid fa-pause me-1"></i>
                                            Paused

                                        </span>

                                    @endif

                                </td>


                                <td data-label="Actions">

                                    <a href="{{ url('/usereditscheduledtransaction/'.$scheduled->id) }}"
                                       class="btn btn-primary action-btn"
                                       title="Edit">

                                        <i class="fa-solid fa-pen"></i>

                                    </a>


                                    <a href="{{ url('/usertogglescheduledtransaction/'.$scheduled->id) }}"
                                       class="btn btn-warning action-btn"
                                       title="Pause / Resume">

                                        @if($scheduled->Status)

                                            <i class="fa-solid fa-pause"></i>

                                        @else

                                            <i class="fa-solid fa-play"></i>

                                        @endif

                                    </a>


                                    <a href="{{ url('/userdeletescheduledtransaction/'.$scheduled->id) }}"
                                       class="btn btn-outline-danger action-btn"
                                       title="Delete"
                                       onclick="return confirm('Are you sure you want to delete this scheduled transaction?')">

                                        <i class="fa-solid fa-trash"></i>

                                    </a>

                                </td>

                            </tr>

                        @endforeach

                        </tbody>

                    </table>

                </div>

            @else

                <div class="empty">

                    <div class="empty-icon">

                        <i class="fa-solid fa-calendar-days"></i>

                    </div>

                    <h4>No Scheduled Transactions</h4>

                    <p>
                        Add regular income or expenses to automatically track them.
                    </p>

                    <a href="{{ url('/useraddscheduledtransaction') }}"
                       class="btn btn-primary px-4">

                        <i class="fa-solid fa-plus me-2"></i>
                        Add Your First Scheduled Transaction

                    </a>

                </div>

            @endif

        </div>


        <div class="mt-4">

            <a href="{{ url('/dashboard') }}"
               class="btn btn-outline-secondary">

                <i class="fa-solid fa-arrow-left me-2"></i>
                Back to Dashboard

            </a>

        </div>

    </div>

</div>

</body>

</html>