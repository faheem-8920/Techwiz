@extends('layouts.user')

@section('content')

<div class="page-heading">

    <div class="page-title">
        <div class="row">

            <div class="col-12 col-md-6 order-md-1 order-last">

                <h3>Settings</h3>

                <p class="text-subtitle text-muted">
                    Manage your CampusCoin preferences and account settings.
                </p>

            </div>

            <div class="col-12 col-md-6 order-md-2 order-first">

                <nav aria-label="breadcrumb"
                     class="breadcrumb-header float-start float-lg-end">

                    <ol class="breadcrumb">

                        <li class="breadcrumb-item">
                            <a href="/dashboard">Dashboard</a>
                        </li>

                        <li class="breadcrumb-item active"
                            aria-current="page">
                            Settings
                        </li>

                    </ol>

                </nav>

            </div>

        </div>
    </div>

</div>


<div class="page-content">

    {{-- =========================
         APPEARANCE SETTINGS
    ========================== --}}
    <section class="section">

        <div class="card">

            <div class="card-header">

                <h4 class="card-title">
                    Appearance
                </h4>

                <p class="text-muted mb-0">
                    Customize how CampusCoin looks.
                </p>

            </div>

            <div class="card-body">

                {{-- Dark Mode --}}
                <div class="d-flex justify-content-between
                            align-items-center border-bottom pb-4 mb-4">

                    <div class="d-flex align-items-center">

                        <div class="avatar avatar-md bg-light-primary me-3">

                            <span class="avatar-content">
                                <i class="bi bi-moon-stars"></i>
                            </span>

                        </div>

                        <div>

                            <h6 class="mb-1">
                                Dark Mode
                            </h6>

                            <small class="text-muted">
                                Use a darker appearance for the application.
                            </small>

                        </div>

                    </div>

                    <div class="form-check form-switch">

                        <input
                            class="form-check-input"
                            type="checkbox"
                            id="darkMode">

                        <label
                            class="form-check-label"
                            for="darkMode">
                        </label>

                    </div>

                </div>


                {{-- Font Size --}}
                <div class="row align-items-center">

                    <div class="col-md-8">

                        <div class="d-flex align-items-center">

                            <div class="avatar avatar-md bg-light-success me-3">

                                <span class="avatar-content">
                                    <i class="bi bi-fonts"></i>
                                </span>

                            </div>

                            <div>

                                <h6 class="mb-1">
                                    Font Size
                                </h6>

                                <small class="text-muted">
                                    Adjust the text size across the application.
                                </small>

                            </div>

                        </div>

                    </div>


                    <div class="col-md-4 mt-3 mt-md-0">

                        <select
                            class="form-select"
                            id="fontSize">

                            <option>Small</option>
                            <option selected>Medium</option>
                            <option>Large</option>

                        </select>

                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- =========================
         NOTIFICATION SETTINGS
    ========================== --}}
    <section class="section">

        <div class="card">

            <div class="card-header">

                <h4 class="card-title">
                    Notifications
                </h4>

                <p class="text-muted mb-0">
                    Choose which notifications you want to receive.
                </p>

            </div>

            <div class="card-body">

                {{-- Budget Alerts --}}
                <div class="d-flex justify-content-between
                            align-items-center border-bottom pb-3 mb-3">

                    <div>

                        <h6 class="mb-1">
                            Budget Alerts
                        </h6>

                        <small class="text-muted">
                            Get notified when your spending approaches
                            your budget limit.
                        </small>

                    </div>

                    <div class="form-check form-switch">

                        <input
                            class="form-check-input"
                            type="checkbox"
                            id="budgetAlerts"
                            checked>

                    </div>

                </div>


                {{-- Saving Tips --}}
                <div class="d-flex justify-content-between
                            align-items-center border-bottom pb-3 mb-3">

                    <div>

                        <h6 class="mb-1">
                            Saving Tips
                        </h6>

                        <small class="text-muted">
                            Receive useful money-saving tips.
                        </small>

                    </div>

                    <div class="form-check form-switch">

                        <input
                            class="form-check-input"
                            type="checkbox"
                            id="savingTips"
                            checked>

                    </div>

                </div>


                {{-- Monthly Report --}}
                <div class="d-flex justify-content-between
                            align-items-center">

                    <div>

                        <h6 class="mb-1">
                            Monthly Report
                        </h6>

                        <small class="text-muted">
                            Receive a summary of your monthly income
                            and expenses.
                        </small>

                    </div>

                    <div class="form-check form-switch">

                        <input
                            class="form-check-input"
                            type="checkbox"
                            id="monthlyReport"
                            checked>

                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- =========================
         FINANCIAL PREFERENCES
    ========================== --}}
    <section class="section">

        <div class="card">

            <div class="card-header">

                <h4 class="card-title">
                    Financial Preferences
                </h4>

                <p class="text-muted mb-0">
                    Set your preferred financial display options.
                </p>

            </div>

            <div class="card-body">

                <div class="row">

                    {{-- Currency --}}
                    <div class="col-md-6 mb-4">

                        <label for="currency"
                               class="form-label">

                            Currency

                        </label>

                        <select
                            id="currency"
                            class="form-select">

                            <option selected>
                                PKR - Pakistani Rupee
                            </option>

                            <option>
                                USD - US Dollar
                            </option>

                            <option>
                                GBP - British Pound
                            </option>

                            <option>
                                EUR - Euro
                            </option>

                        </select>

                    </div>


                    {{-- Budget Period --}}
                    <div class="col-md-6 mb-4">

                        <label for="budgetPeriod"
                               class="form-label">

                            Budget Period

                        </label>

                        <select
                            id="budgetPeriod"
                            class="form-select">

                            <option selected>
                                Monthly
                            </option>

                            <option>
                                Weekly
                            </option>

                        </select>

                    </div>


                    {{-- Saving Goal --}}
                    <div class="col-md-6">

                        <label for="savingGoal"
                               class="form-label">

                            Monthly Saving Goal

                        </label>

                        <div class="input-group">

                            <span class="input-group-text">
                                Rs.
                            </span>

                            <input
                                type="number"
                                id="savingGoal"
                                class="form-control"
                                value="10000">

                        </div>

                    </div>


                    {{-- Alert Percentage --}}
                    <div class="col-md-6">

                        <label for="alertPercentage"
                               class="form-label">

                            Budget Alert At

                        </label>

                        <select
                            id="alertPercentage"
                            class="form-select">

                            <option>
                                50%
                            </option>

                            <option selected>
                                80%
                            </option>

                            <option>
                                90%
                            </option>

                            <option>
                                100%
                            </option>

                        </select>

                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- =========================
         ACCOUNT PREFERENCES
    ========================== --}}
    <section class="section">

        <div class="card">

            <div class="card-header">

                <h4 class="card-title">
                    Account Preferences
                </h4>

            </div>

            <div class="card-body">

                {{-- Auto Save --}}
                <div class="d-flex justify-content-between
                            align-items-center border-bottom pb-3 mb-3">

                    <div>

                        <h6 class="mb-1">
                            Remember My Preferences
                        </h6>

                        <small class="text-muted">
                            Keep your selected settings for future visits.
                        </small>

                    </div>

                    <div class="form-check form-switch">

                        <input
                            class="form-check-input"
                            type="checkbox"
                            id="rememberPreferences"
                            checked>

                    </div>

                </div>


                {{-- Confirm Delete --}}
                <div class="d-flex justify-content-between
                            align-items-center">

                    <div>

                        <h6 class="mb-1">
                            Confirm Before Delete
                        </h6>

                        <small class="text-muted">
                            Ask for confirmation before deleting transactions
                            or categories.
                        </small>

                    </div>

                    <div class="form-check form-switch">

                        <input
                            class="form-check-input"
                            type="checkbox"
                            id="confirmDelete"
                            checked>

                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- =========================
         SAVE BUTTON
    ========================== --}}
    <section class="section">

        <div class="card">

            <div class="card-body">

                <div class="d-flex justify-content-between
                            align-items-center flex-wrap gap-2">

                    <div>

                        <h6 class="mb-1">
                            Save Your Settings
                        </h6>

                        <small class="text-muted">
                            Your settings will be saved here.
                        </small>

                    </div>

                    <div>

                        <button
                            type="button"
                            class="btn btn-light-secondary me-2">

                            Reset

                        </button>

                        <button
                            type="button"
                            class="btn btn-primary">

                            <i class="bi bi-check-lg me-1"></i>
                            Save Changes

                        </button>

                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- =========================
         DANGER ZONE
    ========================== --}}
    <section class="section">

        <div class="card border border-danger">

            <div class="card-header">

                <h4 class="card-title text-danger">
                    Danger Zone
                </h4>

            </div>

            <div class="card-body">

                <div class="d-flex justify-content-between
                            align-items-center flex-wrap gap-3">

                    <div>

                        <h6 class="mb-1">
                            Reset Preferences
                        </h6>

                        <p class="text-muted mb-0">
                            Reset your application preferences
                            to their default values.
                        </p>

                    </div>

                    <button
                        type="button"
                        class="btn btn-outline-danger">

                        <i class="bi bi-arrow-counterclockwise me-1"></i>
                        Reset Preferences

                    </button>

                </div>

            </div>

        </div>

    </section>

</div>

@endsection