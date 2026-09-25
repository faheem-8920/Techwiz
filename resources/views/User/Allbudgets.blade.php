<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>My Budgets</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        body {
            background: #f4f7fb;
            font-family: Arial, sans-serif;
        }

        .page-header {
            background: linear-gradient(135deg, #0d6efd, #084298);
            color: white;
            padding: 30px;
            border-radius: 15px;
            margin-bottom: 25px;
        }

        .budget-card {
            background: white;
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }

        .table th {
            background: #f1f5f9;
            color: #334155;
            font-weight: 600;
        }

        .table td {
            vertical-align: middle;
        }

        .amount {
            font-weight: bold;
            color: #0d6efd;
        }

        .badge-income {
            background: #198754;
        }

        .badge-expense {
            background: #dc3545;
        }

        .empty-box {
            padding: 60px 20px;
            text-align: center;
            color: #6c757d;
        }

        .empty-box i {
            font-size: 55px;
            margin-bottom: 15px;
            color: #adb5bd;
        }

        .action-btn {
            width: 38px;
            height: 38px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
        }
    </style>
</head>

<body>

<div class="container py-5">

    <!-- Header -->
    <div class="page-header d-flex justify-content-between align-items-center flex-wrap gap-3">

        <div>
            <h2 class="mb-2">
                <i class="fa-solid fa-wallet me-2"></i>
                My Budgets
            </h2>

            <p class="mb-0">
                Manage your category budgets and spending limits.
            </p>
        </div>

        <a href="{{ url('/useraddbudget') }}" class="btn btn-light">
            <i class="fa-solid fa-plus me-1"></i>
            Add Budget
        </a>

    </div>


    <!-- Budget Table -->
    <div class="budget-card">

        @if($budgets->count() > 0)

            <div class="table-responsive">

                <table class="table table-hover mb-0">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Category</th>
                            <th>Type</th>
                            <th>Budget Limit</th>
                            <th>Created</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($budgets as $budget)

                            @php
                                $category = \App\Models\Category::find($budget->category_id);
                            @endphp

                            <tr>

                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                <td>
                                    @if($category)
                                        <strong>
                                            {{ $category->Name }}
                                        </strong>
                                    @else
                                        <span class="text-muted">
                                            Category not found
                                        </span>
                                    @endif
                                </td>

                                <td>

                                    @if($category)

                                        @if($category->type == 'income')

                                            <span class="badge badge-income">
                                                Income
                                            </span>

                                        @else

                                            <span class="badge badge-expense">
                                                Expense
                                            </span>

                                        @endif

                                    @else

                                        <span class="badge bg-secondary">
                                            Unknown
                                        </span>

                                    @endif

                                </td>

                                <td>
                                    <span class="amount">
                                        PKR {{ number_format($budget->LimitAmount, 2) }}
                                    </span>
                                </td>

                                <td>
                                    {{ $budget->created_at->format('d M Y') }}
                                </td>

                                <td class="text-center">

                                    <!-- Edit -->
                                    <a href="{{ url('/usereditbudget/'.$budget->id) }}"
                                       class="btn btn-primary action-btn"
                                       title="Edit Budget">

                                        <i class="fa-solid fa-pen"></i>

                                    </a>

                                    <!-- Delete -->
                                    <a href="{{ url('/userdeletebudget/'.$budget->id) }}"
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

                <p class="mb-4">
                    You have not created any budgets yet.
                </p>

                <a href="{{ url('/useraddbudget') }}" class="btn btn-primary">

                    <i class="fa-solid fa-plus me-1"></i>
                    Create Your First Budget

                </a>

            </div>

        @endif

    </div>


    <!-- Back Button -->
    <div class="mt-4">

        <a href="{{ url('/dashboard') }}" class="btn btn-outline-secondary">

            <i class="fa-solid fa-arrow-left me-1"></i>
            Back to Dashboard

        </a>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>