@extends('layouts.user')

@section('content')

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
