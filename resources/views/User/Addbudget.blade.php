@extends('layouts.user')

@section('content')

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

                @if($errors->any())

                    <div class="error-box">

                        <i class="fa-solid fa-circle-exclamation me-2"></i>

                        <ul class="mb-0 mt-2">

                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach

                        </ul>

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

                                <option value="{{ $category->id }}"
                                    {{ old('category_id') == $category->id ? 'selected' : '' }}>

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
                                   value="{{ old('LimitAmount') }}"
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

@endsection