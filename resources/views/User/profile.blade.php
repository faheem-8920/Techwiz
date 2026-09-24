@extends('layouts.user')

@section('content')

<div class="page-heading">

    <div class="page-title">
        <div class="row">

            <div class="col-12 col-md-6 order-md-1 order-last">

                <h3>Profile</h3>

                <p class="text-subtitle text-muted">
                    Manage your personal and student information.
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
                            Profile
                        </li>

                    </ol>

                </nav>

            </div>

        </div>
    </div>

</div>


<div class="page-content">

    {{-- =========================
         PROFILE HEADER
    ========================== --}}
    <section class="section">

        <div class="card">

            <div class="card-body">

                <div class="row align-items-center">

                    {{-- Profile Picture --}}
                    <div class="col-md-3 text-center mb-4 mb-md-0">

                        <div class="avatar avatar-xl">

                            <img
                                src="{{ asset('assets/images/faces/1.jpg') }}"
                                alt="Profile Picture">

                        </div>

                    </div>


                    {{-- Profile Information --}}
                    <div class="col-md-6">

                        <h3 class="mb-1">
                            Laiba Iftikhar
                        </h3>

                        <p class="text-muted mb-2">
                            <i class="bi bi-envelope me-1"></i>
                            laiba@example.com
                        </p>

                        <p class="text-muted mb-2">
                            <i class="bi bi-person-badge me-1"></i>
                            Student ID: CC-001
                        </p>

                        <span class="badge bg-light-success text-success">
                            Active Student
                        </span>

                    </div>


                    {{-- Edit Button --}}
                    <div class="col-md-3 text-md-end mt-3 mt-md-0">

                        <button
                            type="button"
                            class="btn btn-primary"
                            data-bs-toggle="modal"
                            data-bs-target="#editProfileModal">

                            <i class="bi bi-pencil me-1"></i>
                            Edit Profile

                        </button>

                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- =========================
         PERSONAL INFORMATION
    ========================== --}}
    <section class="section">

        <div class="card">

            <div class="card-header">

                <h4 class="card-title">
                    Personal Information
                </h4>

            </div>


            <div class="card-body">

                <div class="row">

                    {{-- Full Name --}}
                    <div class="col-md-6 mb-4">

                        <label class="form-label text-muted">
                            Full Name
                        </label>

                        <h6>
                            Laiba Iftikhar
                        </h6>

                    </div>


                    {{-- Email --}}
                    <div class="col-md-6 mb-4">

                        <label class="form-label text-muted">
                            Email Address
                        </label>

                        <h6>
                            laiba@example.com
                        </h6>

                    </div>


                    {{-- Phone --}}
                    <div class="col-md-6 mb-4">

                        <label class="form-label text-muted">
                            Phone Number
                        </label>

                        <h6>
                            +92 300 1234567
                        </h6>

                    </div>


                    {{-- Date of Birth --}}
                    <div class="col-md-6 mb-4">

                        <label class="form-label text-muted">
                            Date of Birth
                        </label>

                        <h6>
                            15 March 2003
                        </h6>

                    </div>


                    {{-- Gender --}}
                    <div class="col-md-6">

                        <label class="form-label text-muted">
                            Gender
                        </label>

                        <h6>
                            Female
                        </h6>

                    </div>


                    {{-- City --}}
                    <div class="col-md-6">

                        <label class="form-label text-muted">
                            City
                        </label>

                        <h6>
                            Karachi
                        </h6>

                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- =========================
         STUDENT INFORMATION
    ========================== --}}
    <section class="section">

        <div class="card">

            <div class="card-header">

                <h4 class="card-title">
                    Student Information
                </h4>

            </div>


            <div class="card-body">

                <div class="row">

                    {{-- Student ID --}}
                    <div class="col-md-6 mb-4">

                        <label class="form-label text-muted">
                            Student ID
                        </label>

                        <h6>
                            CC-001
                        </h6>

                    </div>


                    {{-- University --}}
                    <div class="col-md-6 mb-4">

                        <label class="form-label text-muted">
                            University / College
                        </label>

                        <h6>
                            ABC University
                        </h6>

                    </div>


                    {{-- Department --}}
                    <div class="col-md-6 mb-4">

                        <label class="form-label text-muted">
                            Department
                        </label>

                        <h6>
                            Computer Science
                        </h6>

                    </div>


                    {{-- Semester --}}
                    <div class="col-md-6 mb-4">

                        <label class="form-label text-muted">
                            Semester
                        </label>

                        <h6>
                            5th Semester
                        </h6>

                    </div>


                    {{-- Enrollment Year --}}
                    <div class="col-md-6">

                        <label class="form-label text-muted">
                            Enrollment Year
                        </label>

                        <h6>
                            2024
                        </h6>

                    </div>


                    {{-- Account Created --}}
                    <div class="col-md-6">

                        <label class="form-label text-muted">
                            Account Created
                        </label>

                        <h6>
                            January 2024
                        </h6>

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

                <p class="text-muted">
                    Your current budgeting preferences.
                </p>

            </div>


            <div class="card-body">

                <div class="row">

                    {{-- Currency --}}
                    <div class="col-md-4 mb-4">

                        <div class="d-flex align-items-center">

                            <div class="avatar avatar-md bg-light-primary me-3">

                                <span class="avatar-content">
                                    <i class="bi bi-currency-exchange"></i>
                                </span>

                            </div>

                            <div>

                                <small class="text-muted">
                                    Currency
                                </small>

                                <h6 class="mb-0">
                                    PKR
                                </h6>

                            </div>

                        </div>

                    </div>


                    {{-- Monthly Saving Goal --}}
                    <div class="col-md-4 mb-4">

                        <div class="d-flex align-items-center">

                            <div class="avatar avatar-md bg-light-success me-3">

                                <span class="avatar-content">
                                    <i class="bi bi-piggy-bank"></i>
                                </span>

                            </div>

                            <div>

                                <small class="text-muted">
                                    Monthly Saving Goal
                                </small>

                                <h6 class="mb-0">
                                    Rs. 10,000
                                </h6>

                            </div>

                        </div>

                    </div>


                    {{-- Budget Preference --}}
                    <div class="col-md-4 mb-4">

                        <div class="d-flex align-items-center">

                            <div class="avatar avatar-md bg-light-warning me-3">

                                <span class="avatar-content">
                                    <i class="bi bi-wallet2"></i>
                                </span>

                            </div>

                            <div>

                                <small class="text-muted">
                                    Budget Type
                                </small>

                                <h6 class="mb-0">
                                    Monthly
                                </h6>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- =========================
         CHANGE PASSWORD
    ========================== --}}
    <section class="section">

        <div class="card">

            <div class="card-header">

                <h4 class="card-title">
                    Change Password
                </h4>

                <p class="text-muted">
                    Update your account password.
                </p>

            </div>


            <div class="card-body">

                <form>

                    <div class="row">

                        {{-- Current Password --}}
                        <div class="col-md-6 mb-3">

                            <label for="currentPassword"
                                   class="form-label">

                                Current Password

                            </label>

                            <input
                                type="password"
                                id="currentPassword"
                                class="form-control"
                                placeholder="Enter current password">

                        </div>


                        {{-- New Password --}}
                        <div class="col-md-6 mb-3">

                            <label for="newPassword"
                                   class="form-label">

                                New Password

                            </label>

                            <input
                                type="password"
                                id="newPassword"
                                class="form-control"
                                placeholder="Enter new password">

                        </div>


                        {{-- Confirm Password --}}
                        <div class="col-md-6 mb-3">

                            <label for="confirmPassword"
                                   class="form-label">

                                Confirm New Password

                            </label>

                            <input
                                type="password"
                                id="confirmPassword"
                                class="form-control"
                                placeholder="Confirm new password">

                        </div>

                    </div>


                    <button
                        type="button"
                        class="btn btn-primary">

                        <i class="bi bi-shield-lock me-1"></i>
                        Change Password

                    </button>

                </form>

            </div>

        </div>

    </section>

</div>


{{-- =========================
     EDIT PROFILE MODAL
========================== --}}
<div class="modal fade"
     id="editProfileModal"
     tabindex="-1"
     aria-labelledby="editProfileModalLabel"
     aria-hidden="true">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title"
                    id="editProfileModalLabel">

                    Edit Profile

                </h5>

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close">
                </button>

            </div>


            <div class="modal-body">

                <form>

                    <div class="row">

                        {{-- Full Name --}}
                        <div class="col-md-6 mb-3">

                            <label for="editName"
                                   class="form-label">

                                Full Name

                            </label>

                            <input
                                type="text"
                                id="editName"
                                class="form-control"
                                value="Laiba Iftikhar">

                        </div>


                        {{-- Email --}}
                        <div class="col-md-6 mb-3">

                            <label for="editEmail"
                                   class="form-label">

                                Email Address

                            </label>

                            <input
                                type="email"
                                id="editEmail"
                                class="form-control"
                                value="laiba@example.com">

                        </div>


                        {{-- Phone --}}
                        <div class="col-md-6 mb-3">

                            <label for="editPhone"
                                   class="form-label">

                                Phone Number

                            </label>

                            <input
                                type="text"
                                id="editPhone"
                                class="form-control"
                                value="+92 300 1234567">

                        </div>


                        {{-- Date of Birth --}}
                        <div class="col-md-6 mb-3">

                            <label for="editDob"
                                   class="form-label">

                                Date of Birth

                            </label>

                            <input
                                type="date"
                                id="editDob"
                                class="form-control"
                                value="2003-03-15">

                        </div>


                        {{-- Gender --}}
                        <div class="col-md-6 mb-3">

                            <label for="editGender"
                                   class="form-label">

                                Gender

                            </label>

                            <select
                                id="editGender"
                                class="form-select">

                                <option>Male</option>
                                <option selected>Female</option>
                                <option>Other</option>

                            </select>

                        </div>


                        {{-- City --}}
                        <div class="col-md-6 mb-3">

                            <label for="editCity"
                                   class="form-label">

                                City

                            </label>

                            <input
                                type="text"
                                id="editCity"
                                class="form-control"
                                value="Karachi">

                        </div>


                        {{-- University --}}
                        <div class="col-md-6 mb-3">

                            <label for="editUniversity"
                                   class="form-label">

                                University / College

                            </label>

                            <input
                                type="text"
                                id="editUniversity"
                                class="form-control"
                                value="ABC University">

                        </div>


                        {{-- Department --}}
                        <div class="col-md-6 mb-3">

                            <label for="editDepartment"
                                   class="form-label">

                                Department

                            </label>

                            <input
                                type="text"
                                id="editDepartment"
                                class="form-control"
                                value="Computer Science">

                        </div>


                        {{-- Semester --}}
                        <div class="col-md-6 mb-3">

                            <label for="editSemester"
                                   class="form-label">

                                Semester

                            </label>

                            <select
                                id="editSemester"
                                class="form-select">

                                <option>1st Semester</option>
                                <option>2nd Semester</option>
                                <option>3rd Semester</option>
                                <option>4th Semester</option>
                                <option selected>5th Semester</option>
                                <option>6th Semester</option>
                                <option>7th Semester</option>
                                <option>8th Semester</option>

                            </select>

                        </div>


                        {{-- Monthly Saving Goal --}}
                        <div class="col-md-6 mb-3">

                            <label for="editSavingGoal"
                                   class="form-label">

                                Monthly Saving Goal

                            </label>

                            <div class="input-group">

                                <span class="input-group-text">
                                    Rs.
                                </span>

                                <input
                                    type="number"
                                    id="editSavingGoal"
                                    class="form-control"
                                    value="10000">

                            </div>

                        </div>

                    </div>

                </form>

            </div>


            <div class="modal-footer">

                <button
                    type="button"
                    class="btn btn-light-secondary"
                    data-bs-dismiss="modal">

                    Cancel

                </button>

                <button
                    type="button"
                    class="btn btn-primary"
                    data-bs-dismiss="modal">

                    <i class="bi bi-check-lg me-1"></i>
                    Save Changes

                </button>

            </div>

        </div>

    </div>

</div>

@endsection