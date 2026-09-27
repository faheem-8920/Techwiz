@extends('layouts.user')

@section('content')

<div class="container-fluid py-4">

    <!-- Page Header -->
    <div class="mb-4">

        <div class="d-flex align-items-center gap-2 mb-2">

            <div class="bg-primary bg-opacity-10 text-primary rounded-3 p-2">
                <i class="fa-solid fa-bullhorn fs-5"></i>
            </div>

            <span class="text-primary fw-semibold">
                Campus Coin
            </span>

        </div>

        <h2 class="fw-bold mb-1">
            Announcements
        </h2>

        <p class="text-muted mb-0">
            Stay updated with the latest announcements from Campus Coin.
        </p>

    </div>


    @if($announcements->count() > 0)

        <div class="row g-4">

            @foreach($announcements as $announcement)

                <div class="col-xl-6 col-lg-6 col-md-12">

                    <div class="card border-0 shadow-sm h-100 announcement-card">

                        <div class="card-body p-4">

                            <!-- Top -->
                            <div class="d-flex justify-content-between align-items-start mb-3">

                                <div class="d-flex align-items-center gap-3">

                                    <div class="bg-primary bg-opacity-10 text-primary rounded-3 p-3">

                                        <i class="fa-solid fa-bullhorn fs-5"></i>

                                    </div>

                                    <div>

                                        <h5 class="fw-bold mb-1">
                                            {{ $announcement->Title }}
                                        </h5>

                                        <small class="text-muted">
                                            <i class="fa-regular fa-calendar me-1"></i>

                                            {{ $announcement->created_at->format('d M Y') }}

                                        </small>

                                    </div>

                                </div>


                                <span class="badge bg-success bg-opacity-10 text-success px-3 py-2">

                                    <i class="fa-solid fa-circle-check me-1"></i>
                                    Active

                                </span>

                            </div>


                            <!-- Divider -->
                            <hr class="my-3">


                            <!-- Message -->
                            <div class="announcement-message">

                                <p class="text-muted mb-0">

                                    {{ $announcement->Message }}

                                </p>

                            </div>


                            <!-- Footer -->
                            <div class="mt-4 pt-3 border-top">

                                <div class="d-flex align-items-center justify-content-between">

                                    <small class="text-muted">

                                        <i class="fa-regular fa-clock me-1"></i>

                                        {{ $announcement->created_at->format('h:i A') }}

                                    </small>


                                    <small class="text-primary fw-semibold">

                                        Campus Coin Admin

                                    </small>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    @else

        <!-- Empty State -->
        <div class="card border-0 shadow-sm">

            <div class="card-body text-center py-5">

                <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-inline-flex p-4 mb-4">

                    <i class="fa-solid fa-bullhorn fa-2x"></i>

                </div>

                <h4 class="fw-bold mb-2">
                    No Announcements
                </h4>

                <p class="text-muted mb-0">
                    There are no active announcements available right now.
                </p>

            </div>

        </div>

    @endif

</div>


<style>

.announcement-card {
    transition: all 0.25s ease;
}

.announcement-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08) !important;
}

.announcement-message {
    line-height: 1.7;
    min-height: 70px;
}

</style>

@endsection