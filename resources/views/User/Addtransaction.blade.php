@extends('layouts.user')

@section('content')

<div class="page-wrapper">

    <div class="transaction-container">

        {{-- TOP NAVIGATION --}}
        <div class="top-navigation">

            <a href="{{ url('/useralltransactions') }}" class="back-dashboard">

                <i class="fa-solid fa-arrow-left me-2"></i>

                Back to Transactions

            </a>

        </div>


        {{-- MAIN CARD --}}
        <div class="transaction-card">

            {{-- HEADER --}}
            <div class="transaction-header">

                <div class="transaction-header-icon">
                    <i class="fa-solid fa-arrow-right-arrow-left"></i>
                </div>

                <div>

                    <h2>Add Transaction</h2>

                    <p>
                        Record your income or expenses and keep your finances organized.
                    </p>

                </div>

            </div>


            {{-- FORM BODY --}}
            <div class="transaction-form-body">

                {{-- ERROR MESSAGE --}}
                @if(session('error'))

                    <div class="transaction-error">

                        <i class="fa-solid fa-circle-exclamation"></i>

                        <span>
                            {{ session('error') }}
                        </span>

                    </div>

                @endif


                {{-- VALIDATION ERRORS --}}
                @if($errors->any())

                    <div class="transaction-error">

                        <div>

                            <strong>
                                <i class="fa-solid fa-circle-exclamation me-1"></i>
                                Please fix the following errors:
                            </strong>

                            <ul>

                                @foreach($errors->all() as $error)

                                    <li>
                                        {{ $error }}
                                    </li>

                                @endforeach

                            </ul>

                        </div>

                    </div>

                @endif


                {{-- INFO BOX --}}
                <div class="transaction-info-box">

                    <i class="fa-solid fa-circle-info"></i>

                    <div>

                        <strong>Keep your records updated</strong>

                        <span>
                            Select the correct category and enter the amount,
                            description, and date for this transaction.
                        </span>

                    </div>

                </div>


                <div class="section-title">

                    <i class="fa-solid fa-sliders me-2"></i>

                    Transaction Information

                </div>


                <form action="{{ url('/useraddtransactionlogic') }}" method="POST">

                    @csrf


                    {{-- CATEGORY --}}
                    <div class="transaction-form-group">

                        <label class="transaction-label">

                            <i class="fa-solid fa-layer-group"></i>

                            Category

                        </label>

                        <select
                            name="category_id"
                            class="transaction-input transaction-select"
                            required
                        >

                            <option value="">
                                Select Category
                            </option>

                            @foreach($categories as $category)

                                <option
                                    value="{{ $category->id }}"
                                    {{ old('category_id') == $category->id ? 'selected' : '' }}
                                >

                                    {{ $category->Name }} -
                                    {{ ucfirst($category->type) }}

                                </option>

                            @endforeach

                        </select>

                        <div class="transaction-help">

                            <i class="fa-solid fa-circle-info"></i>

                            Select the category that matches this transaction.

                        </div>

                    </div>


                    {{-- AMOUNT --}}
                    <div class="transaction-form-group">

                        <label class="transaction-label">

                            <i class="fa-solid fa-money-bill-wave"></i>

                            Amount

                        </label>

                        <div class="input-group transaction-input-group">

                            <span class="input-group-text">
                                PKR
                            </span>

                            <input
                                type="number"
                                name="Amount"
                                class="form-control"
                                placeholder="Enter amount"
                                min="0"
                                step="0.01"
                                value="{{ old('Amount') }}"
                                required
                            >

                        </div>

                        <div class="transaction-help">

                            <i class="fa-solid fa-circle-info"></i>

                            Enter the amount for this transaction.

                        </div>

                    </div>


                    {{-- DESCRIPTION --}}
                    <div class="transaction-form-group">

                        <label class="transaction-label">

                            <i class="fa-solid fa-align-left"></i>

                            Description

                        </label>

                        <textarea
                            name="Description"
                            class="transaction-input transaction-textarea"
                            rows="4"
                            placeholder="Enter transaction description"
                        >{{ old('Description') }}</textarea>

                        <div class="transaction-help">

                            <i class="fa-solid fa-pen"></i>

                            Add a short note to identify this transaction later.

                        </div>

                    </div>


                    {{-- DATE --}}
                    <div class="transaction-form-group">

                        <label class="transaction-label">

                            <i class="fa-regular fa-calendar"></i>

                            Date

                        </label>

                        <input
                            type="date"
                            name="Date"
                            class="transaction-input"
                            value="{{ old('Date') }}"
                            required
                        >

                        <div class="transaction-help">

                            <i class="fa-solid fa-calendar-day"></i>

                            Select the date on which this transaction occurred.

                        </div>

                    </div>


                    {{-- ACTIONS --}}
                    <div class="transaction-actions">

                        <a
                            href="{{ url('/useralltransactions') }}"
                            class="transaction-cancel"
                        >

                            <i class="fa-solid fa-xmark"></i>

                            Cancel

                        </a>


                        <button
                            type="submit"
                            class="transaction-save"
                        >

                            <i class="fa-solid fa-circle-check"></i>

                            Save Transaction

                        </button>

                    </div>

                </form>


                {{-- SECURITY NOTE --}}
                <div class="transaction-security">

                    <i class="fa-solid fa-shield-halved"></i>

                    <span>
                        Your transaction information is private and linked to your account.
                    </span>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
