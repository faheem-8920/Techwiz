@extends('admin.layouts.app')

@section('content')

<div class="container-fluid py-4">

    <!-- Page Header -->
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">

        <div>
            <div class="d-flex align-items-center gap-2 mb-2">
                <div class="bg-primary bg-opacity-10 text-primary rounded-3 p-2">
                    <i class="fa-solid fa-bullhorn fs-5"></i>
                </div>

                <span class="text-primary fw-semibold">
                    Admin Announcements
                </span>
            </div>

            <h2 class="fw-bold mb-1">
                Create Announcement
            </h2>

            <p class="text-muted mb-0">
                Publish an important message for Campus Coin students.
            </p>
        </div>

        <a href="/allannouncements" class="btn btn-outline-primary px-4">
            <i class="fa-solid fa-list me-2"></i>
            All Announcements
        </a>

    </div>


    <!-- Main Card -->
    <div class="row justify-content-center">

        <div class="col-xl-8 col-lg-9">

            <div class="card border-0 shadow-sm overflow-hidden">

                <!-- Card Header -->
                <div class="card-header bg-primary text-white border-0 p-4">

                    <div class="d-flex align-items-center gap-3">

                        <div class="bg-white bg-opacity-25 rounded-3 p-3">
                            <i class="fa-solid fa-bullhorn fs-4"></i>
                        </div>

                        <div>
                            <h5 class="mb-1 fw-bold">
                                New Announcement
                            </h5>

                            <small class="opacity-75">
                                Add the announcement details below
                            </small>
                        </div>

                    </div>

                </div>


                <!-- Form -->
                <div class="card-body p-4 p-lg-5">

                    <form action="/addannouncementlogic" method="POST">

                        @csrf


                        <!-- Title -->
                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                Announcement Title
                            </label>

                            <div class="input-group input-group-lg">

                                <span class="input-group-text bg-light border-end-0">
                                    <i class="fa-solid fa-heading text-primary"></i>
                                </span>

                                <input
                                    type="text"
                                    name="Title"
                                    class="form-control border-start-0"
                                    placeholder="Enter announcement title"
                                    required
                                >

                            </div>

                            <small class="text-muted">
                                Use a short and clear title.
                            </small>

                        </div>


                        <!-- Message -->
                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                Announcement Message
                            </label>

                            <textarea
                                name="Message"
                                class="form-control"
                                rows="7"
                                placeholder="Write your announcement message here..."
                                required
                            ></textarea>

                            <small class="text-muted">
                                Write the complete information students need to know.
                            </small>

                        </div>


                        <!-- Status -->
                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                Announcement Status
                            </label>

                            <select
                                name="Status"
                                class="form-select form-select-lg"
                                required
                            >

                                <option value="1" selected>
                                    Active
                                </option>

                                <option value="0">
                                    Inactive
                                </option>

                            </select>

                            <div class="mt-2 d-flex align-items-center gap-2 text-muted">

                                <i class="fa-solid fa-circle-info"></i>

                                <small>
                                    Active announcements can be displayed to students.
                                </small>

                            </div>

                        </div>


                        <!-- Buttons -->
                        <div class="border-top pt-4 mt-4">

                            <div class="d-flex flex-wrap gap-2">

                                <button
                                    type="submit"
                                    class="btn btn-primary px-4 py-2"
                                >

                                    <i class="fa-solid fa-paper-plane me-2"></i>
                                    Publish Announcement

                                </button>


                                <a
                                    href="/allannouncements"
                                    class="btn btn-light border px-4 py-2"
                                >

                                    <i class="fa-solid fa-xmark me-2"></i>
                                    Cancel

                                </a>

                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection