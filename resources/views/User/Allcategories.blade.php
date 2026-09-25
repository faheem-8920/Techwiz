@extends('layouts.user')

@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>All Categories</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            margin: 0;
            padding: 30px;
        }

        .container {
            width: 90%;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 8px;
        }

        h2 {
            margin-bottom: 20px;
        }

        .add-button {
            display: inline-block;
            background: #198754;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background: #333;
            color: white;
        }

        tr:nth-child(even) {
            background: #f9f9f9;
        }

        .edit-button {
            background: #0d6efd;
            color: white;
            padding: 7px 12px;
            text-decoration: none;
            border-radius: 4px;
        }

        .delete-button {
            background: #dc3545;
            color: white;
            padding: 7px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .income {
            color: green;
            font-weight: bold;
        }

        .expense {
            color: red;
            font-weight: bold;
        }
    </style>
</head>

<body>

<div class="container">

    <h2>All Categories</h2>

    <a href="{{ url('/addcategory') }}" class="add-button">
        Add Category
    </a>

    <table>

        <thead>
            <tr>
                <th>ID</th>
                <th>User ID</th>
                <th>Category Name</th>
                <th>Type</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>

            @foreach($categories as $category)

                <tr>

                    <td>
                        {{ $category->id }}
                    </td>

                    <td>
                        {{ $category->user_id }}
                    </td>

                    <td>
                        {{ $category->Name }}
                    </td>

                    <td>

                        @if($category->type == 'Income')

                            <span class="income">
                                Income
                            </span>

                        @else

                            <span class="expense">
                                Expense
                            </span>

                        @endif

                    </td>

                    <td>

                        <a
                            href="{{ url('/editcategory/'.$category->id) }}"
                            class="edit-button"
                        >
                            Edit
                        </a>

                        <a
                            href="{{ url('/deletecategory/'.$category->id) }}"
                            class="delete-button"
                            onclick="return confirm('Are you sure you want to delete this category?')"
                        >
                            Delete
                        </a>

                    </td>

                </tr>

            @endforeach

        </tbody>

    </table>

</div>

</body>
</html>

@endsection