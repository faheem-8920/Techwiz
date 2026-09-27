<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Scheduled Transaction | Campus Coin</title>

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
            min-height: 100vh;
            padding: 45px 15px;
        }

        .scheduled-container {
            max-width: 760px;
            margin: auto;
        }

        .top-navigation {
            margin-bottom: 20px;
        }

        .back-link {
            text-decoration: none;
            color: #475569;
            font-weight: 600;
            transition: 0.2s;
        }

        .back-link:hover {
            color: #0d6efd;
        }

        .scheduled-card {
            background: white;
            border-radius: 22px;
            overflow: hidden;
            border: 1px solid #e6ebf0;
            box-shadow: 0 15px 45px rgba(15, 23, 42, 0.10);
        }

        .form-header {
            background: linear-gradient(135deg, #0b3a66, #1769aa);
            color: white;
            padding: 35px;
            position: relative;
            overflow: hidden;
        }

        .form-header::after {
            content: "";
            position: absolute;
            width: 190px;
            height: 190px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.07);
            right: -65px;
            top: -75px;
        }

        .header-icon {
            width: 55px;
            height: 55px;
            border-radius: 14px;
            background: rgba(255, 255, 255, 0.14);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            margin-bottom: 17px;
        }

        .form-header h2 {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 7px;
            position: relative;
            z-index: 2;
        }

        .form-header p {
            margin: 0;
            opacity: 0.86;
            position: relative;
            z-index: 2;
        }

        .form-body {
            padding: 40px;
        }

        .info-box {
            background: #eff6ff;
            border: 1px solid #dbeafe;
            border-left: 4px solid #1769aa;
            padding: 15px 17px;
            border-radius: 10px;
            color: #1e40af;
            font-size: 14px;
            margin-bottom: 28px;
        }

        .section-title {
            color: #64748b;
            font-size: 14px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.6px;
            margin-bottom: 23px;
        }

        .form-label {
            color: #334155;
            font-weight: 700;
            margin-bottom: 9px;
        }

        .form-label i {
            color: #1769aa;
            margin-right: 5px;
        }

        .form-control,
        .form-select {
            min-height: 52px;
            padding: 12px 15px;
            border: 1px solid #dbe3ec;
            border-radius: 11px;
            transition: 0.2s;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #1769aa;
            box-shadow: 0 0 0 4px rgba(23, 105, 170, 0.10);
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

        .help-text {
            color: #64748b;
            font-size: 13px;
            margin-top: 8px;
        }

        .current-scheduled {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 18px;
            margin-bottom: 25px;
        }

        .current-label {
            color: #64748b;
            font-size: 12px;
            text-transform: uppercase;
            font-weight: 700;
            margin-bottom: 7px;
        }

        .current-value {
            font-size: 21px;
            color: #0b3a66;
            font-weight: 700;
        }

        .current-details {
            margin-top: 10px;
            color: #64748b;
            font-size: 13px;
        }

        .category-note {
            margin-top: 10px;
            padding: 12px 15px;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            color: #64748b;
            border-radius: 9px;
            font-size: 13px;
        }

        .form-actions {
            border-top: 1px solid #edf1f5;
            margin-top: 30px;
            padding-top: 25px;
        }

        .cancel-btn,
        .update-btn {
            min-height: 50px;
            border-radius: 10px;
            padding: 0 23px;
            font-weight: 700;
        }

        .update-btn {
            background: linear-gradient(135deg, #0b3a66, #1769aa);
            color: white;
            border: none;
            transition: 0.2s;
        }

        .update-btn:hover {
            color: white;
            transform: translateY(-1px);
            box-shadow: 0 8px 18px rgba(11, 58, 102, 0.20);
        }

        .error-box {
            background: #fff1f2;
            border: 1px solid #fecdd3;
            color: #be123c;
            padding: 13px 15px;
            border-radius: 10px;
            margin-bottom: 22px;
        }

        .frequency-badge {
            display: inline-block;
            background: #e0f2fe;
            color: #0369a1;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
            margin-top: 8px;
        }

        @media (max-width: 576px) {

            .page-wrapper {
                padding: 25px 12px;
            }

            .form-header {
                padding: 28px 22px;
            }

            .form-body {
                padding: 25px 20px;
            }

            .form-header h2 {
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

    <div class="scheduled-container">

        <!-- Back Navigation -->

        <div class="top-navigation">

            <a href="{{ url('/userallscheduledtransactions') }}"
               class="back-link">

                <i class="fa-solid fa-arrow-left me-2"></i>

                Back to Scheduled Transactions

            </a>

        </div>


        <div class="scheduled-card">

            <!-- Header -->

            <div class="form-header">

                <div class="header-icon">
                    <i class="fa-solid fa-calendar-days"></i>
                </div>

                <h2>Edit Scheduled Transaction</h2>

                <p>
                    Update your recurring transaction details and schedule.
                </p>

            </div>


            <!-- Body -->

            <div class="form-body">

                <div class="info-box">

                    <i class="fa-solid fa-circle-info me-2"></i>

                    Update the details below. The schedule will continue using
                    the new information you provide.

                </div>


                @if(session('error'))

                    <div class="error-box">

                        <i class="fa-solid fa-circle-exclamation me-2"></i>

                        {{ session('error') }}

                    </div>

                @endif


                <div class="section-title">

                    <i class="fa-solid fa-sliders me-2"></i>

                    Scheduled Transaction Details

                </div>


                <!-- Current Transaction -->

                <div class="current-scheduled">

                    <div class="current-label">
                        Current Scheduled Amount
                    </div>

                    <div class="current-value">

                        PKR {{ number_format($scheduled->Amount, 2) }}

                    </div>

                    <div class="current-details">

                        <i class="fa-solid fa-calendar me-1"></i>

                        Start Date:
                        {{ $scheduled->StartDate }}

                        <br>

                        <i class="fa-solid fa-repeat me-1"></i>

                        Frequency:
                        {{ $scheduled->Frequency }}

                        <span class="frequency-badge">
                            Active Schedule
                        </span>

                    </div>

                </div>


                <!-- Update Form -->

                <form action="{{ url('/userupdatescheduledtransaction/'.$scheduled->id) }}"
                      method="POST">

                    @csrf


                    <!-- Category -->

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

                                <option value="{{ $category->id }}"
                                    {{ $scheduled->category_id == $category->id ? 'selected' : '' }}>

                                    {{ $category->Name }}

                                    @if(isset($category->type))
                                        - {{ $category->type }}
                                    @endif

                                </option>

                            @endforeach

                        </select>

                        <div class="category-note">

                            <i class="fa-solid fa-circle-info me-1"></i>

                            Select the category that should be used whenever
                            this scheduled transaction is generated.

                        </div>

                    </div>


                    <!-- Amount -->

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
                                   value="{{ $scheduled->Amount }}"
                                   min="1"
                                   step="0.01"
                                   placeholder="Enter transaction amount"
                                   required>

                        </div>

                        <div class="help-text">

                            Enter the amount that will be automatically added
                            whenever this schedule runs.

                        </div>

                    </div>


                    <!-- Description -->

                    <div class="mb-4">

                        <label class="form-label">

                            <i class="fa-solid fa-align-left"></i>

                            Description

                        </label>

                        <input type="text"
                               name="Description"
                               class="form-control"
                               value="{{ $scheduled->Description }}"
                               placeholder="Enter transaction description">

                        <div class="help-text">

                            Example: Monthly hostel rent, weekly transport,
                            monthly subscription, etc.

                        </div>

                    </div>


                    <!-- Start Date -->

                    <div class="mb-4">

                        <label class="form-label">

                            <i class="fa-solid fa-calendar-plus"></i>

                            Start Date

                        </label>

                        <input type="date"
                               name="StartDate"
                               class="form-control"
                               value="{{ $scheduled->StartDate }}"
                               required>

                        <div class="help-text">

                            The schedule will start from this date.

                        </div>

                    </div>


                    <!-- Frequency -->

                    <div class="mb-4">

                        <label class="form-label">

                            <i class="fa-solid fa-repeat"></i>

                            Frequency

                        </label>

                        <select name="Frequency"
                                class="form-select"
                                required>

                            <option value="Daily"
                                {{ $scheduled->Frequency == 'Daily' ? 'selected' : '' }}>

                                Daily

                            </option>

                            <option value="Weekly"
                                {{ $scheduled->Frequency == 'Weekly' ? 'selected' : '' }}>

                                Weekly

                            </option>

                            <option value="Monthly"
                                {{ $scheduled->Frequency == 'Monthly' ? 'selected' : '' }}>

                                Monthly

                            </option>

                            <option value="Yearly"
                                {{ $scheduled->Frequency == 'Yearly' ? 'selected' : '' }}>

                                Yearly

                            </option>

                        </select>

                        <div class="help-text">

                            Choose how frequently this transaction should be
                            automatically created.

                        </div>

                    </div>


                    <!-- Buttons -->

                    <div class="form-actions d-flex justify-content-between align-items-center gap-3">

                        <a href="{{ url('/userallscheduledtransactions') }}"
                           class="btn btn-outline-secondary cancel-btn">

                            <i class="fa-solid fa-xmark me-1"></i>

                            Cancel

                        </a>


                        <button type="submit"
                                class="update-btn">

                            <i class="fa-solid fa-floppy-disk me-1"></i>

                            Update Scheduled Transaction

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

</body>

</html>
