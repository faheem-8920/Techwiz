<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Scheduled Transaction | Campus Coin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>

        body {
            background: #f4f7fb;
            font-family: Arial, sans-serif;
            color: #1e293b;
        }

        .page-wrapper {
            min-height: 100vh;
            padding: 45px 15px;
        }

        .container-box {
            max-width: 760px;
            margin: auto;
        }

        .back-link {
            color: #475569;
            text-decoration: none;
            font-weight: 600;
            display: inline-block;
            margin-bottom: 18px;
        }

        .back-link:hover {
            color: #1769aa;
        }

        .card-box {
            background: white;
            border-radius: 22px;
            overflow: hidden;
            box-shadow: 0 15px 40px rgba(15,23,42,0.10);
            border: 1px solid #e5eaf0;
        }

        .header {
            background: linear-gradient(135deg, #0b3a66, #1769aa);
            color: white;
            padding: 35px;
        }

        .header-icon {
            width: 55px;
            height: 55px;
            background: rgba(255,255,255,0.14);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 23px;
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

        .body {
            padding: 40px;
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

        .form-control,
        .form-select {
            min-height: 52px;
            border-radius: 11px;
            border: 1px solid #dbe3ec;
            padding: 12px 15px;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #1769aa;
            box-shadow: 0 0 0 4px rgba(23,105,170,.10);
        }

        .input-group-text {
            background: #f1f5f9;
            border-color: #dbe3ec;
            font-weight: 700;
            color: #0b3a66;
            border-radius: 11px 0 0 11px;
        }

        .input-group .form-control {
            border-radius: 0 11px 11px 0;
        }

        .help {
            font-size: 13px;
            color: #64748b;
            margin-top: 7px;
        }

        .info-box {
            background: #eff6ff;
            border: 1px solid #dbeafe;
            border-left: 4px solid #1769aa;
            padding: 15px;
            border-radius: 10px;
            color: #1e40af;
            margin-bottom: 28px;
            font-size: 14px;
        }

        .actions {
            border-top: 1px solid #edf1f5;
            margin-top: 30px;
            padding-top: 25px;
        }

        .btn {
            min-height: 50px;
            border-radius: 10px;
            padding: 0 22px;
            font-weight: 700;
        }

        .save-btn {
            background: linear-gradient(135deg, #0b3a66, #1769aa);
            border: none;
            color: white;
        }

        .save-btn:hover {
            color: white;
            transform: translateY(-1px);
        }

        @media(max-width:576px) {

            .body {
                padding: 25px 20px;
            }

            .header {
                padding: 28px 22px;
            }

            .actions {
                flex-direction: column;
            }

            .actions a,
            .actions button {
                width: 100%;
            }
        }

    </style>

</head>

<body>

<div class="page-wrapper">

    <div class="container-box">

        <a href="{{ url('/userallscheduledtransactions') }}"
           class="back-link">

            <i class="fa-solid fa-arrow-left me-2"></i>
            Back to Scheduled Transactions

        </a>

        <div class="card-box">

            <div class="header">

                <div class="header-icon">
                    <i class="fa-solid fa-calendar-plus"></i>
                </div>

                <h2>Add Scheduled Transaction</h2>

                <p>
                    Automatically track income or expenses that happen regularly.
                </p>

            </div>

            <div class="body">

                <div class="info-box">

                    <i class="fa-solid fa-circle-info me-2"></i>

                    Example: Monthly allowance, rent, subscriptions, or regular income.

                </div>

                <form action="{{ url('/useraddscheduledtransactionlogic') }}"
                      method="POST">

                    @csrf

                    <div class="mb-4">

                        <label class="form-label">

                            <i class="fa-solid fa-layer-group"></i>
                            Category

                        </label>

                        <select name="category_id"
                                class="form-select"
                                required>

                            <option value="">
                                Select category
                            </option>

                            @foreach($categories as $category)

                                <option value="{{ $category->id }}">

                                    {{ $category->Name }} - {{ $category->type }}

                                </option>

                            @endforeach

                        </select>

                    </div>


                    <div class="mb-4">

                        <label class="form-label">

                            <i class="fa-solid fa-money-bill-wave"></i>
                            Amount

                        </label>

                        <div class="input-group">

                            <span class="input-group-text">
                                PKR
                            </span>

                            <input type="number"
                                   name="Amount"
                                   class="form-control"
                                   min="1"
                                   step="0.01"
                                   placeholder="Enter amount"
                                   required>

                        </div>

                    </div>


                    <div class="mb-4">

                        <label class="form-label">

                            <i class="fa-solid fa-align-left"></i>
                            Description

                        </label>

                        <input type="text"
                               name="Description"
                               class="form-control"
                               placeholder="Example: Monthly Allowance">

                    </div>


                    <div class="mb-4">

                        <label class="form-label">

                            <i class="fa-regular fa-calendar"></i>
                            Start Date

                        </label>

                        <input type="date"
                               name="StartDate"
                               class="form-control"
                               required>

                        <div class="help">
                            This will be the first date on which the transaction is created.
                        </div>

                    </div>


                    <div class="mb-4">

                        <label class="form-label">

                            <i class="fa-solid fa-arrows-rotate"></i>
                            Frequency

                        </label>

                        <select name="Frequency"
                                class="form-select"
                                required>

                            <option value="">
                                Select frequency
                            </option>

                            <option value="Daily">
                                Daily
                            </option>

                            <option value="Weekly">
                                Weekly
                            </option>

                            <option value="Monthly">
                                Monthly
                            </option>

                            <option value="Yearly">
                                Yearly
                            </option>

                        </select>

                    </div>


                    <div class="actions d-flex justify-content-between gap-3">

                        <a href="{{ url('/userallscheduledtransactions') }}"
                           class="btn btn-outline-secondary">

                            <i class="fa-solid fa-xmark me-1"></i>
                            Cancel

                        </a>

                        <button type="submit"
                                class="btn save-btn">

                            <i class="fa-solid fa-calendar-check me-2"></i>
                            Save Scheduled Transaction

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

</body>

</html>