@extends('layouts.user')

@section('content')

<style>
    .category-card {
        max-width: 420px;
        margin: 60px auto;
        padding: 32px;
        background: #ffffff;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        font-family: 'Segoe UI', sans-serif;
    }

    .category-card h2 {
        margin-bottom: 24px;
        color: #1f2937;
        font-size: 22px;
        text-align: center;
    }

    .form-group {
        margin-bottom: 18px;
    }

    .form-group label {
        display: block;
        margin-bottom: 6px;
        font-weight: 600;
        color: #374151;
        font-size: 14px;
    }

    .form-group input,
    .form-group select {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid #d1d5db;
        border-radius: 8px;
        font-size: 14px;
        box-sizing: border-box;
        transition: border-color 0.2s;
    }

    .form-group input:focus,
    .form-group select:focus {
        outline: none;
        border-color: #6366f1;
        box-shadow: 0 0 0 3px rgba(99,102,241,0.15);
    }

    .btn-submit {
        width: 100%;
        padding: 12px;
        background: #6366f1;
        color: #fff;
        border: none;
        border-radius: 8px;
        font-size: 15px;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.2s;
    }

    .btn-submit:hover {
        background: #4f46e5;
    }

    .error-text {
        color: #dc2626;
        font-size: 13px;
        margin-top: 4px;
    }
</style>

<div class="category-card">
    <h2>Add Category</h2>

    @if ($errors->any())
        <div class="error-text">
            <ul style="margin:0; padding-left:18px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ url('/Addcategorylogic') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>Category Name</label>
            <input type="text" name="Name" required value="{{ old('Name') }}">
        </div>

        <div class="form-group">
            <label>Category Type</label>
            <select name="type" required>
                <option value="">Select Category Type</option>
                <option value="income" {{ old('type') == 'income' ? 'selected' : '' }}>Income</option>
                <option value="expense" {{ old('type') == 'expense' ? 'selected' : '' }}>Expense</option>
            </select>
        </div>

        <button type="submit" class="btn-submit">Add Category</button>
    </form>
</div>

@endsection