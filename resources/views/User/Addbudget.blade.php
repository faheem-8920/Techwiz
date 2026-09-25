<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Budget</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body {
            background: #f4f7fa;
            font-family: Arial, sans-serif;
        }

        .budget-box {
            max-width: 650px;
            margin: 60px auto;
            background: white;
            padding: 35px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        }

        .budget-title {
            color: #0b3a66;
            font-weight: bold;
            text-align: center;
            margin-bottom: 30px;
        }

        .form-label {
            font-weight: 600;
            color: #333;
        }

        .form-control,
        .form-select {
            padding: 12px;
            border-radius: 8px;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #1769aa;
            box-shadow: 0 0 0 0.2rem rgba(23, 105, 170, 0.15);
        }

        .save-btn {
            width: 100%;
            background: #0b3a66;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 8px;
            font-weight: bold;
        }

        .save-btn:hover {
            background: #1769aa;
        }

        .back-btn {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #0b3a66;
            text-decoration: none;
        }

        .back-btn:hover {
            text-decoration: underline;
        }

    </style>

</head>

<body>

<div class="container">

    <div class="budget-box">

        <h2 class="budget-title">
            Add Budget
        </h2>

        <form action="{{ url('/useraddbudgetlogic') }}" method="POST">

            @csrf

            <!-- Category -->

            <div class="mb-4">

                <label class="form-label">
                    Select Category
                </label>

                <select name="category_id" class="form-select" required>

                    <option value="">
                        Select Category
                    </option>

                    @foreach($categories as $category)

                        <option value="{{ $category->id }}">

                            {{ $category->Name }} - {{ ucfirst($category->type) }}

                        </option>

                    @endforeach

                </select>

            </div>


            <!-- Budget Amount -->

            <div class="mb-4">

                <label class="form-label">
                    Budget Amount
                </label>

                <input
                    type="number"
                    name="LimitAmount"
                    class="form-control"
                    placeholder="Enter budget amount"
                    min="0"
                    step="0.01"
                    required
                >

            </div>


            <!-- Submit -->

            <button type="submit" class="save-btn">

                Save Budget

            </button>


            <a href="{{ url('/userallbudgets') }}" class="back-btn">

                Back to Budgets

            </a>

        </form>

    </div>

</div>

</body>

</html>