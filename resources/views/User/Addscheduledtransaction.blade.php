@extends('layouts.user')

@section('content')

<div class="page-wrapper">

    <div class="scheduled-container">

        {{-- TOP NAVIGATION --}}
        <div class="top-navigation">

            <a href="{{ url('/userallscheduledtransactions') }}"
               class="back-dashboard">

                <i class="fa-solid fa-arrow-left me-2"></i>

                Back to Scheduled Transactions

            </a>

        </div>


        {{-- MAIN CARD --}}
        <div class="scheduled-card">

            {{-- HEADER --}}
            <div class="scheduled-header">

                <div class="header-icon">
                    <i class="fa-solid fa-calendar-plus"></i>
                </div>

                <div>

                    <h2>
                        Add Scheduled Transaction
                    </h2>

                    <p>
                        Automatically track income or expenses that happen regularly.
                    </p>

                </div>

            </div>


            {{-- FORM BODY --}}
            <div class="scheduled-form-body">


                {{-- INFORMATION BOX --}}
                <div class="scheduled-info-box">

                    <i class="fa-solid fa-circle-info"></i>

                    <div>
                        <strong>How scheduled transactions work</strong>

                        <span>
                            Example: Monthly allowance, rent, subscriptions,
                            or regular income.
                        </span>
                    </div>

                </div>


                {{-- VALIDATION ERRORS --}}
                @if(session('error'))

                    <div class="scheduled-error">

                        <i class="fa-solid fa-circle-exclamation"></i>

                        <span>
                            {{ session('error') }}
                        </span>

                    </div>

                @endif


                @if($errors->any())

                    <div class="scheduled-error">

                        <div>

                            <strong>
                                <i class="fa-solid fa-circle-exclamation me-1"></i>
                                Please fix the following errors:
                            </strong>

                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>

                        </div>

                    </div>

                @endif


                <div class="section-title">

                    <i class="fa-solid fa-sliders me-2"></i>

                    Transaction Information

                </div>


                <form action="{{ url('/useraddscheduledtransactionlogic') }}"
                      method="POST">

                    @csrf


                    {{-- CATEGORY --}}
                    <div class="scheduled-form-group">

                        <label class="scheduled-label">

                            <i class="fa-solid fa-layer-group"></i>

                            Category

                        </label>

                        <select name="category_id"
                                class="scheduled-input scheduled-select"
                                required>

                            <option value="">
                                Select category
                            </option>

                            @foreach($categories as $category)

                                <option
                                    value="{{ $category->id }}"
                                    {{ old('category_id') == $category->id ? 'selected' : '' }}
                                >
                                    {{ $category->Name }} - {{ ucfirst($category->type) }}
                                </option>

                            @endforeach

                        </select>

                        <div class="scheduled-help">

                            <i class="fa-solid fa-circle-info"></i>

                            Choose the category where this transaction should be recorded.

                        </div>

                    </div>


                    {{-- AMOUNT --}}
                    <div class="scheduled-form-group">

                        <label class="scheduled-label">

                            <i class="fa-solid fa-money-bill-wave"></i>

                            Amount

                        </label>

                        <div class="input-group scheduled-input-group">

                            <span class="input-group-text">
                                PKR
                            </span>

                            <input type="number"
                                   name="Amount"
                                   class="form-control"
                                   min="1"
                                   step="0.01"
                                   placeholder="Enter amount"
                                   value="{{ old('Amount') }}"
                                   required>

                        </div>

                        <div class="scheduled-help">

                            <i class="fa-solid fa-circle-info"></i>

                            Enter the amount that will be recorded each time.

                        </div>

                    </div>


                    {{-- DESCRIPTION --}}
                    <div class="scheduled-form-group">

                        <label class="scheduled-label">

                            <i class="fa-solid fa-align-left"></i>

                            Description

                        </label>

                        <input type="text"
                               name="Description"
                               class="scheduled-input"
                               placeholder="Example: Monthly Allowance"
                               value="{{ old('Description') }}"
                               maxlength="255">

                        <div class="scheduled-help">

                            <i class="fa-solid fa-circle-info"></i>

                            Add a short description to easily identify this transaction.

                        </div>

                    </div>


                    {{-- START DATE --}}
                    <div class="scheduled-form-group">

                        <label class="scheduled-label">

                            <i class="fa-regular fa-calendar"></i>

                            Start Date

                        </label>

                        <input type="date"
                               name="StartDate"
                               class="scheduled-input"
                               value="{{ old('StartDate') }}"
                               required>

                        <div class="scheduled-help">

                            <i class="fa-solid fa-calendar-day"></i>

                            This will be the first date on which the transaction is created.

                        </div>

                    </div>


                    {{-- FREQUENCY --}}
                    <div class="scheduled-form-group">

                        <label class="scheduled-label">

                            <i class="fa-solid fa-arrows-rotate"></i>

                            Frequency

                        </label>

                        <select name="Frequency"
                                class="scheduled-input scheduled-select"
                                required>

                            <option value="">
                                Select frequency
                            </option>

                            <option value="Daily"
                                {{ old('Frequency') == 'Daily' ? 'selected' : '' }}>
                                Daily
                            </option>

                            <option value="Weekly"
                                {{ old('Frequency') == 'Weekly' ? 'selected' : '' }}>
                                Weekly
                            </option>

                            <option value="Monthly"
                                {{ old('Frequency') == 'Monthly' ? 'selected' : '' }}>
                                Monthly
                            </option>

                            <option value="Yearly"
                                {{ old('Frequency') == 'Yearly' ? 'selected' : '' }}>
                                Yearly
                            </option>

                        </select>

                        <div class="scheduled-help">

                            <i class="fa-solid fa-repeat"></i>

                            Select how often this transaction should be scheduled.

                        </div>

                    </div>


                    {{-- ACTIONS --}}
                    <div class="scheduled-actions">

                        <a href="{{ url('/user/allscheduledtransactions') }}"
                           class="scheduled-cancel">

                            <i class="fa-solid fa-xmark"></i>

                            Cancel

                        </a>


                        <button type="submit"
                                class="scheduled-save">

                            <i class="fa-solid fa-calendar-check"></i>

                            Save Scheduled Transaction

                        </button>

                    </div>

                </form>


                {{-- SECURITY NOTE --}}
                <div class="scheduled-security">

                    <i class="fa-solid fa-shield-halved"></i>

                    <span>
                        Your scheduled transactions are private and linked to your account.
                    </span>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
