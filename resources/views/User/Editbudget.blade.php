<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Budget</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>

        body {
            background: #f4f7fb;
            font-family: Arial, sans-serif;
        }

        .page-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 15px;
        }

        .budget-form-card {
            width: 100%;
            max-width: 650px;
            background: white;
            border-radius: 18px;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.09);
            overflow: hidden;
        }

        .form-header {
            background: linear-gradient(135deg, #0d6efd, #084298);
            color: white;
            padding: 30px;
        }

        .form-header h2 {
            margin-bottom: 5px;
        }

        .form-body {
            padding: 35px;
        }

        .form-label {
            font-weight: 600;
            color: #334155;
        }

        .form-control,
        .form-select {
            padding: 12px 14px;
            border-radius: 9px;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.12);
        }

        .input-group-text {
            background: #f1f5f9;
            border-radius: 9px 0 0 9px;
            font-weight: 600;
        }

        .btn {
            padding: 11px 20px;
            border-radius: 9px;
        }

        .info-box {
            background: #f1f7ff;
            border-left: 4px solid #0d6efd;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 25px;
            color: #495057;
        }

    </style>

</head>

<body>

<div class="page-wrapper">

    <div class="budget-form-card">

        <!-- Header -->

        <div class="form-header">

            <h2>
                <i class="fa-solid fa-pen-to-square me-2"></i>
                Edit Budget
            </h2>

            <p class="mb-0">
                Update your budget category or spending limit.
            </p>

        </div>


        <!-- Form -->

        <div class="form-body">

            <div class="info-box">

                <i class="fa-solid fa-circle-info me-2"></i>

                Update the details below and save your changes.

            </div>


            <form action="{{ url('/userupdatebudget/'.$budget->id) }}" method="POST">

                @csrf


           

                <!-- Budget Amount -->

                <div class="mb-4">

                    <label class="form-label">
                        <i class="fa-solid fa-money-bill me-1"></i>
                        Budget Limit
                    </label>

                    <div class="input-group">

                        <span class="input-group-text">
                            PKR
                        </span>

                        <input type="number"
                               name="LimitAmount"
                               class="form-control"
                               value="{{ $budget->LimitAmount }}"
                               min="0"
                               step="0.01"
                               placeholder="Enter budget amount"
                               required>

                    </div>

                    <small class="text-muted">
                        Enter the maximum amount you want to spend for this budget.
                    </small>

                </div>


                <!-- Buttons -->

                <div class="d-flex justify-content-between gap-2">

                    <a href="{{ url('/userallbudgets') }}"
                       class="btn btn-outline-secondary">

                        <i class="fa-solid fa-arrow-left me-1"></i>
                        Cancel

                    </a>


                    <button type="submit"
                            class="btn btn-primary">

                        <i class="fa-solid fa-floppy-disk me-1"></i>
                        Update Budget

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>