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
<div class="page-wrapper">

    <div class="category-container">

        {{-- TOP NAVIGATION --}}
        <div class="top-navigation">

            <a href="{{ url('/user/allcategories') }}" class="back-dashboard">
                <i class="fa-solid fa-arrow-left me-2"></i>
                Back to Categories
            </a>

        </div>


        {{-- CATEGORY CARD --}}
        <div class="category-card">

            {{-- HEADER --}}
            <div class="category-header">

                <div class="header-icon">
                    <i class="fa-solid fa-tags"></i>
                </div>

                <div>
                    <h2>Add New Category</h2>

                    <p>
                        Create an income or expense category to organize your finances.
                    </p>
                </div>

            </div>


            {{-- FORM BODY --}}
            <div class="category-form-body">

                {{-- ERROR MESSAGE --}}
                @if(session('error'))

                    <div class="category-error">
                        <i class="fa-solid fa-circle-exclamation"></i>

                        <span>
                            {{ session('error') }}
                        </span>
                    </div>

                @endif


                {{-- VALIDATION ERRORS --}}
                @if($errors->any())

                    <div class="category-error">

                        <div class="error-title">
                            <i class="fa-solid fa-circle-exclamation"></i>
                            Please fix the following errors:
                        </div>

                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>

                    </div>

                @endif


                <div class="section-title">
                    <i class="fa-solid fa-sliders me-2"></i>
                    Category Information
                </div>


                <form action="{{ url('/user/addcategorylogic') }}" method="POST">

                    @csrf


                    {{-- CATEGORY NAME --}}
                    <div class="category-form-group">

                        <label for="categoryName" class="category-label">

                            <i class="fa-solid fa-tag"></i>

                            Category Name

                        </label>

                        <input
                            type="text"
                            id="categoryName"
                            name="Name"
                            class="category-input"
                            placeholder="Example: Food, Salary, Transport"
                            value="{{ old('Name') }}"
                            maxlength="100"
                            required
                        >

                        <div class="field-help">

                            <i class="fa-solid fa-circle-info"></i>

                            Give your category a clear and recognizable name.

                        </div>

                    </div>


                    {{-- CATEGORY TYPE --}}
                    <div class="category-form-group">

                        <label for="categoryType" class="category-label">

                            <i class="fa-solid fa-layer-group"></i>

                            Category Type

                        </label>

                        <select
                            id="categoryType"
                            name="type"
                            class="category-select"
                            required
                        >

                            <option value="">
                                Select Category Type
                            </option>

                            <option
                                value="income"
                                {{ old('type') == 'income' ? 'selected' : '' }}
                            >
                                Income
                            </option>

                            <option
                                value="expense"
                                {{ old('type') == 'expense' ? 'selected' : '' }}
                            >
                                Expense
                            </option>

                        </select>


                        <div class="type-info">

                            <div class="type-info-item income-info">

                                <i class="fa-solid fa-arrow-trend-up"></i>

                                <div>
                                    <strong>Income</strong>
                                    <span>Money you receive.</span>
                                </div>

                            </div>


                            <div class="type-info-item expense-info">

                                <i class="fa-solid fa-arrow-trend-down"></i>

                                <div>
                                    <strong>Expense</strong>
                                    <span>Money you spend.</span>
                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- ACTIONS --}}
                    <div class="category-actions">

                        <a
                            href="{{ url('/user/allcategories') }}"
                            class="category-cancel"
                        >
                            <i class="fa-solid fa-xmark"></i>
                            Cancel
                        </a>


                        <button
                            type="submit"
                            class="category-save"
                        >
                            <i class="fa-solid fa-circle-check"></i>
                            Add Category
                        </button>

                    </div>

                </form>


                {{-- SECURITY NOTE --}}
                <div class="category-security">

                    <i class="fa-solid fa-shield-halved"></i>

                    <span>
                        This category will be linked to your CampusCoin account.
                    </span>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
