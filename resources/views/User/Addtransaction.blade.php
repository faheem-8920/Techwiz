@extends('layouts.user')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Transaction</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f4f7fa;
            font-family: Arial, sans-serif;
        }

        .transaction-box {
            max-width: 650px;
            margin: 60px auto;
            background: white;
            padding: 35px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        }

        .transaction-title {
            color: #0b3a66;
            font-weight: bold;
            margin-bottom: 30px;
            text-align: center;
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
            background: #0b3a66;
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 8px;
            width: 100%;
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

    <div class="transaction-box">

        <h2 class="transaction-title">Add Transaction</h2>

        <form action="{{ url('/addtransactionlogic') }}" method="POST">

            @csrf

            <!-- Category -->
            <div class="mb-3">

                <label class="form-label">Category</label>

                <select name="category_id" class="form-select" required>

                    <option value="">Select Category</option>

                    @foreach($categories as $category)

                        <option value="{{ $category->id }}">
                            {{ $category->Name }} - {{ ucfirst($category->type) }}
                        </option>

                    @endforeach

                </select>

            </div>


            <!-- Amount -->
            <div class="mb-3">

                <label class="form-label">Amount</label>

                <input
                    type="number"
                    name="Amount"
                    class="form-control"
                    placeholder="Enter amount"
                    min="0"
                    step="0.01"
                    required
                >

            </div>


            <!-- Description -->
            <div class="mb-3">

                <label class="form-label">Description</label>

                <textarea
                    name="Description"
                    class="form-control"
                    rows="4"
                    placeholder="Enter transaction description"
                ></textarea>

            </div>


            <!-- Date -->
            <div class="mb-4">

                <label class="form-label">Date</label>

                <input
                    type="date"
                    name="Date"
                    class="form-control"
                    required
                >

            </div>


            <!-- Submit -->
            <button type="submit" class="save-btn">
                Save Transaction
            </button>

            <a href="{{ url('/dashboard') }}" class="back-btn">
                Back to Dashboard
            </a>

        </form>

    </div>

</div>

</body>
</html>


@endsection