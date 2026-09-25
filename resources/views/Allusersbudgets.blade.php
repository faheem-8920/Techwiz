<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>All Users Budgets</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>

        body {
            background: #f4f7fa;
            font-family: Arial, sans-serif;
        }

        .page-header {
            background: linear-gradient(135deg, #0B3A66, #1769AA);
            color: white;
            padding: 28px;
            border-radius: 15px;
            margin-bottom: 25px;
        }

        .budget-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }

        .table {
            margin-bottom: 0;
        }

        .table th {
            background: #f1f5f9;
            color: #334155;
            font-weight: 600;
            white-space: nowrap;
        }

        .table td {
            vertical-align: middle;
        }

        .amount {
            font-weight: 700;
            color: #0B3A66;
        }

        .user-id {
            font-weight: 600;
            color: #1769AA;
        }

        .action-btn {
            width: 38px;
            height: 38px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
        }

        .empty-box {
            text-align: center;
            padding: 70px 20px;
            color: #6c757d;
        }

        .empty-box i {
            font-size: 55px;
            color: #adb5bd;
            margin-bottom: 15px;
        }

    </style>

</head>

<body>

<div class="container-fluid px-4 py-5">

    <!-- Page Header -->

    <div class="page-header d-flex justify-content-between align-items-center flex-wrap gap-3">

        <div>

            <h2 class="mb-2">

                <i class="fa-solid fa-wallet me-2"></i>

                All Users Budgets

            </h2>

            <p class="mb-0">

                View and manage budgets created by all users.

            </p>

        </div>

        <div>

            <span class="badge bg-light text-dark fs-6 px-3 py-2">

                Total Budgets: {{ $budgets->count() }}

            </span>

        </div>

    </div>


    <!-- Success Message -->

    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show">

            <i class="fa-solid fa-circle-check me-2"></i>

            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"></button>

        </div>

    @endif


    <!-- Budget Table -->

    <div class="budget-card">

        @if($budgets->count() > 0)

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead>

                        <tr>

                            <th>#</th>

                            <th>Budget ID</th>

                            <th>User ID</th>

                            <th>Budget Limit</th>

                            <th>Created Date</th>

                            <th class="text-center">Action</th>

                        </tr>

                    </thead>

                    <tbody>

                        @foreach($budgets as $budget)

                            <tr>

                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                <td>

                                    <strong>
                                        #{{ $budget->id }}
                                    </strong>

                                </td>

                                <td>

                                    <span class="user-id">

                                        <i class="fa-solid fa-user me-1"></i>

                                        User #{{ $budget->user_id }}

                                    </span>

                                </td>

                                <td>

                                    <span class="amount">

                                        PKR {{ number_format($budget->LimitAmount, 2) }}

                                    </span>

                                </td>

                                <td>

                                    {{ $budget->created_at->format('d M Y, h:i A') }}

                                </td>

                                <td class="text-center">

                                    <a href="{{ url('/deleteuserbudget/'.$budget->id) }}"
                                       class="btn btn-danger action-btn"
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

        @else

            <div class="empty-box">

                <i class="fa-solid fa-wallet"></i>

                <h4>No Budgets Found</h4>

                <p class="mb-0">

                    No users have created any budgets yet.

                </p>

            </div>

        @endif

    </div>


    <!-- Back Button -->

    <div class="mt-4">

        <a href=""
           class="btn btn-outline-secondary">

            <i class="fa-solid fa-arrow-left me-1"></i>

            Back to Admin Dashboard

        </a>

    </div>

</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>