<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Budget | Campus Coin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

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
            min-height: 100vh;
            padding: 50px 15px;
        }

        .budget-container {
            max-width: 760px;
            margin: auto;
        }

        .top-navigation {
            margin-bottom: 20px;
        }

        .back-dashboard {
            text-decoration: none;
            color: #475569;
            font-weight: 600;
            transition: 0.2s;
        }

        .back-dashboard:hover {
            color: #0d6efd;
        }

        .budget-card {
            background: #ffffff;
            border-radius: 22px;
            overflow: hidden;
            box-shadow: 0 15px 45px rgba(15, 23, 42, 0.10);
            border: 1px solid #e8edf3;
        }

        .card-header-custom {
            background: linear-gradient(135deg, #0b3a66, #1769aa);
            color: white;
            padding: 35px;
            position: relative;
            overflow: hidden;
        }

        .card-header-custom::after {
            content: "";
            position: absolute;
            width: 180px;
            height: 180px;
            border-radius: 50%;
            background: rgba(255,255,255,0.08);
            right: -60px;
            top: -70px;
        }

        .header-icon {
            width: 55px;
            height: 55px;
            border-radius: 14px;
            background: rgba(255,255,255,0.15);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 23px;
            margin-bottom: 18px;
        }

        .card-header-custom h2 {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .card-header-custom p {
            margin: 0;
            opacity: 0.88;
            font-size: 15px;
        }

        .form-body {
            padding: 40px;
        }

        .section-title {
            font-size: 15px;
            font-weight: 700;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 0.6px;
            margin-bottom: 25px;
        }

        .form-label {
            font-weight: 700;
            color: #334155;
            margin-bottom: 9px;
        }

        .form-label i {
            color: #1769aa;
            margin-right: 5px;
        }

        .form-select,
        .form-control {
            min-height: 52px;
            border: 1px solid #dbe3ec;
            border-radius: 11px;
            padding: 12px 15px;
            font-size: 15px;
            transition: 0.2s;
        }

        .form-select:focus,
        .form-control:focus {
            border-color: #1769aa;
            box-shadow: 0 0 0 4px rgba(23,105,170,0.10);
        }

        .input-group-text {
            background: #f1f5f9;
            border: 1px solid #dbe3ec;
            color: #0b3a66;
            font-weight: 700;
            min-width: 65px;
            justify-content: center;
            border-radius: 11px 0 0 11px;
        }

        .input-group .form-control {
            border-radius: 0 11px 11px 0;
        }

        .form-help {
            margin-top: 8px;
            color: #64748b;
            font-size: 13px;
        }

        .category-info {
            margin-top: 12px;
            padding: 12px 15px;
            border-radius: 10px;
            background: #eff6ff;
            color: #1e40af;
            font-size: 13px;
            border: 1px solid #dbeafe;
        }

        .amount-info {
            margin-top: 12px;
            padding: 12px 15px;
            border-radius: 10px;
            background: #f8fafc;
            color: #64748b;
            font-size: 13px;
            border: 1px solid #e2e8f0;
        }

        .form-actions {
            margin-top: 32px;
            padding-top: 25px;
            border-top: 1px solid #edf1f5;
        }

        .btn-cancel {
            min-height: 50px;
            border-radius: 10px;
            padding: 0 22px;
            font-weight: 600;
        }

        .save-btn {
            min-height: 50px;
            border: none;
            border-radius: 10px;
            padding: 0 28px;
            background: linear-gradient(135deg, #0b3a66, #1769aa);
            color: white;
            font-weight: 700;
            transition: 0.2s;
        }

        .save-btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 8px 18px rgba(11,58,102,0.20);
            color: white;
        }

        .security-note {
            margin-top: 22px;
            padding: 14px 16px;
            background: #f8fafc;
            border-radius: 10px;
            color: #64748b;
            font-size: 13px;
            text-align: center;
        }

        .error-box {
            background: #fff1f2;
            border: 1px solid #fecdd3;
            color: #be123c;
            padding: 13px 15px;
            border-radius: 10px;
            margin-bottom: 22px;
        }

        @media (max-width: 576px) {

            .page-wrapper {
                padding: 25px 12px;
            }

            .card-header-custom {
                padding: 28px 22px;
            }

            .form-body {
                padding: 25px 20px;
            }

            .card-header-custom h2 {
                font-size: 23px;
            }

            .form-actions {
                flex-direction: column;
            }

            .form-actions a,
            .form-actions button {
                width: 100%;
            }

        }

    </style>

</head>

<body>

<div class="page-wrapper">

    <div class="budget-container">

        <div class="top-navigation">

            <a href="{{ url('/userallbudgets') }}" class="back-dashboard">
                <i class="fa-solid fa-arrow-left me-2"></i>
                Back to Budgets
            </a>

        </div>

        <div class="budget-card">

            <div class="card-header-custom">

                <div class="header-icon">
                    <i class="fa-solid fa-wallet"></i>
                </div>

                <h2>Create New Budget</h2>

                <p>
                    Set a spending limit for one of your expense categories.
                </p>

            </div>

            <div class="form-body">

                <div class="section-title">
                    <i class="fa-solid fa-sliders me-2"></i>
                    Budget Information
                </div>

                @if(session('error'))

                    <div class="error-box">
                        <i class="fa-solid fa-circle-exclamation me-2"></i>
                        {{ session('error') }}
                    </div>

                @endif

                <form action="{{ url('/useraddbudgetlogic') }}" method="POST">

                    @csrf

                    <div class="mb-4">

                        <label class="form-label">
                            <i class="fa-solid fa-layer-group"></i>
                            Expense Category
                        </label>

                        <select name="category_id"
                                class="form-select"
                                required>

                            <option value="">
                                Select an expense category
                            </option>

                            @foreach($categories as $category)

                                <option value="{{ $category->id }}">

                                    {{ $category->Name }}

                                </option>

                            @endforeach

                        </select>

                        <div class="category-info">

                            <i class="fa-solid fa-circle-info me-1"></i>

                            A budget controls how much you plan to spend in this category.

                        </div>

                    </div>


                    <div class="mb-4">

                        <label class="form-label">
                            <i class="fa-solid fa-money-bill-wave"></i>
                            Budget Limit
                        </label>

                        <div class="input-group">

                            <span class="input-group-text">
                                PKR
                            </span>

                            <input type="number"
                                   name="LimitAmount"
                                   class="form-control"
                                   placeholder="Example: 15000"
                                   min="1"
                                   step="0.01"
                                   required>

                        </div>

                        <div class="form-help">
                            Enter the maximum amount you want to spend for this category.
                        </div>

                        <div class="amount-info">

                            <i class="fa-solid fa-lightbulb me-1"></i>

                            Tip: Set a realistic amount based on your normal monthly spending.

                        </div>

                    </div>


                    <div class="form-actions d-flex justify-content-between align-items-center gap-3">

                        <a href="{{ url('/userallbudgets') }}"
                           class="btn btn-outline-secondary btn-cancel">

                            <i class="fa-solid fa-xmark me-1"></i>
                            Cancel

                        </a>

                        <button type="submit"
                                class="save-btn">

                            <i class="fa-solid fa-circle-check me-1"></i>
                            Create Budget

                        </button>

                    </div>

                </form>

                <div class="security-note">

                    <i class="fa-solid fa-shield-halved me-1"></i>

                    Your budget is private and linked to your account.

                </div>

            </div>

        </div>

    </div>

</div>

</body>

</html>