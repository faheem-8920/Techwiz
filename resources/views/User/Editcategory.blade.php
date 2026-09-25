@extends('layouts.user')

@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>Edit Category</title>
</head>
<body>

    <h2>Edit Category</h2>

    <form action="{{ url('/updatecategory/'.$category->id) }}" method="POST">
        @csrf

        <div>
            <label>Category Name</label>
            <input type="text" name="Name" value="{{ $category->Name }}" required>
        </div>

        <br>

        <div>
            <label>Category Type</label>

            <select name="type" required>

                <option value="">Select Category Type</option>

                <option value="Income"
                    {{ $category->type == 'Income' ? 'selected' : '' }}>
                    Income
                </option>

                <option value="Expense"
                    {{ $category->type == 'Expense' ? 'selected' : '' }}>
                    Expense
                </option>

            </select>
        </div>

        <br>

        <button type="submit">Update Category</button>

        <a href="{{ url('/categories') }}">Cancel</a>

    </form>

</body>
</html>@endsection