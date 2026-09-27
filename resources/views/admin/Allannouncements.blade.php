@extends('admin.layouts.app')

@section('content')

<div class="container-fluid py-4">

    <!-- Header -->
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
                All Announcements
            </h2>

            <p class="text-muted mb-0">
                Manage announcements published for Campus Coin students.
            </p>

        </div>


        <a href="/addannouncement" class="btn btn-primary px-4">

            <i class="fa-solid fa-plus me-2"></i>
            Add Announcement

        </a>

    </div>


    <!-- Statistics -->
    <div class="row g-3 mb-4">

        <div class="col-md-4">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body d-flex align-items-center gap-3">

                    <div class="bg-primary bg-opacity-10 text-primary rounded-3 p-3">
                        <i class="fa-solid fa-bullhorn fs-4"></i>
                    </div>

                    <div>
                        <small class="text-muted d-block">
                            Total Announcements
                        </small>

                        <h4 class="fw-bold mb-0">
                            {{ $announcements->count() }}
                        </h4>
                    </div>

                </div>

            </div>

        </div>


        <div class="col-md-4">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body d-flex align-items-center gap-3">

                    <div class="bg-success bg-opacity-10 text-success rounded-3 p-3">
                        <i class="fa-solid fa-circle-check fs-4"></i>
                    </div>

                    <div>
                        <small class="text-muted d-block">
                            Active
                        </small>

                        <h4 class="fw-bold mb-0">
                            {{ $announcements->where('Status', true)->count() }}
                        </h4>
                    </div>

                </div>

            </div>

        </div>


        <div class="col-md-4">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body d-flex align-items-center gap-3">

                    <div class="bg-danger bg-opacity-10 text-danger rounded-3 p-3">
                        <i class="fa-solid fa-circle-xmark fs-4"></i>
                    </div>

                    <div>
                        <small class="text-muted d-block">
                            Inactive
                        </small>

                        <h4 class="fw-bold mb-0">
                            {{ $announcements->where('Status', false)->count() }}
                        </h4>
                    </div>

                </div>

            </div>

        </div>

    </div>


    <!-- Announcements Table -->
    <div class="card border-0 shadow-sm overflow-hidden">

        <div class="card-header bg-white border-0 p-4">

            <div class="d-flex flex-wrap justify-content-between align-items-center gap-2">

                <div>

                    <h5 class="fw-bold mb-1">
                        Announcement List
                    </h5>

                    <small class="text-muted">
                        View and manage all announcements.
                    </small>

                </div>

                <span class="badge bg-primary rounded-pill px-3 py-2">
                    {{ $announcements->count() }} Records
                </span>

            </div>

        </div>


        <div class="card-body p-0">

            @if($announcements->count() > 0)

                <div class="table-responsive">

                    <table class="table table-hover align-middle mb-0">

                        <thead class="table-light">

                            <tr>

                                <th class="px-4 py-3">
                                    #
                                </th>

                                <th class="py-3">
                                    Announcement
                                </th>

                                <th class="py-3">
                                    Message
                                </th>

                                <th class="py-3">
                                    Status
                                </th>

                                <th class="py-3">
                                    Created
                                </th>

                                <th class="text-center py-3">
                                    Actions
                                </th>

                            </tr>

                        </thead>


                        <tbody>

                            @foreach($announcements as $announcement)

                                <tr>

                                    <!-- ID -->
                                    <td class="px-4 fw-semibold text-muted">
                                        {{ $loop->iteration }}
                                    </td>


                                    <!-- Title -->
                                    <td style="min-width: 220px;">

                                        <div class="d-flex align-items-center gap-3">

                                            <div class="bg-primary bg-opacity-10 text-primary rounded-3 p-2">

                                                <i class="fa-solid fa-bullhorn"></i>

                                            </div>

                                            <div>

                                                <div class="fw-semibold">
                                                    {{ $announcement->Title }}
                                                </div>

                                                <small class="text-muted">
                                                    Announcement #{{ $announcement->id }}
                                                </small>

                                            </div>

                                        </div>

                                    </td>


                                    <!-- Message -->
                                    <td style="min-width: 280px; max-width: 400px;">

                                        <span class="text-muted">

                                            {{ \Illuminate\Support\Str::limit($announcement->Message, 100) }}

                                        </span>

                                    </td>


                                    <!-- Status -->
                                    <td>

                                        @if($announcement->Status)

                                            <span class="badge bg-success bg-opacity-10 text-success px-3 py-2">

                                                <i class="fa-solid fa-circle-check me-1"></i>
                                                Active

                                            </span>

                                        @else

                                            <span class="badge bg-danger bg-opacity-10 text-danger px-3 py-2">

                                                <i class="fa-solid fa-circle-xmark me-1"></i>
                                                Inactive

                                            </span>

                                        @endif

                                    </td>


                                    <!-- Date -->
                                    <td>

                                        <div class="fw-semibold small">

                                            {{ $announcement->created_at->format('d M Y') }}

                                        </div>

                                        <small class="text-muted">

                                            {{ $announcement->created_at->format('h:i A') }}

                                        </small>

                                    </td>


                                    <!-- Actions -->
                                    <td>

                                        <div class="d-flex justify-content-center gap-2">

                                            <!-- Edit -->
                                            <a
                                                href="/editannouncement/{{ $announcement->id }}"
                                                class="btn btn-sm btn-outline-primary"
                                                title="Edit Announcement"
                                            >

                                                <i class="fa-solid fa-pen"></i>

                                            </a>


                                            <!-- Activate / Deactivate -->
                                            @if($announcement->Status)

                                                <a
                                                    href="/deactivateannouncement/{{ $announcement->id }}"
                                                    class="btn btn-sm btn-outline-warning"
                                                    title="Deactivate"
                                                    onclick="return confirm('Are you sure you want to deactivate this announcement?')"
                                                >

                                                    <i class="fa-solid fa-toggle-on"></i>

                                                </a>

                                            @else

                                                <a
                                                    href="/activateannouncement/{{ $announcement->id }}"
                                                    class="btn btn-sm btn-outline-success"
                                                    title="Activate"
                                                    onclick="return confirm('Are you sure you want to activate this announcement?')"
                                                >

                                                    <i class="fa-solid fa-toggle-off"></i>

                                                </a>

                                            @endif


                                            <!-- Delete -->
                                            <a
                                                href="/deleteannouncement/{{ $announcement->id }}"
                                                class="btn btn-sm btn-outline-danger"
                                                title="Delete"
                                                onclick="return confirm('Are you sure you want to delete this announcement?')"
                                            >

                                                <i class="fa-solid fa-trash"></i>

                                            </a>

                                        </div>

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            @else

                <!-- Empty State -->
                <div class="text-center py-5 px-3">

                    <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-inline-flex p-4 mb-3">

                        <i class="fa-solid fa-bullhorn fa-2x"></i>

                    </div>

                    <h5 class="fw-bold">
                        No Announcements Yet
                    </h5>

                    <p class="text-muted mb-4">
                        Start by creating your first announcement for students.
                    </p>

                    <a href="/addannouncement" class="btn btn-primary px-4">

                        <i class="fa-solid fa-plus me-2"></i>
                        Create Announcement

                    </a>

                </div>

            @endif

        </div>

    </div>

</div>

@endsection