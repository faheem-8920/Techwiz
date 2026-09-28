@extends('layouts.user')

@section('content')

<div class="announcement-page">

<!-- Page Header -->
<div class="announcement-page-header">

    <div class="announcement-brand">
        <div class="announcement-brand-icon">
            <i class="fa-solid fa-bullhorn"></i>
        </div>

        <span>Campus Coin</span>
    </div>

    <h2>Announcements</h2>

    <p>
        Stay updated with the latest announcements from Campus Coin.
    </p>

</div>


@if($announcements->count() > 0)

    <div class="announcement-grid">

        @foreach($announcements as $announcement)

            <div class="announcement-card">

                <div class="announcement-card-body">

                    <!-- Announcement Top -->
                    <div class="announcement-top">

                        <div class="announcement-title-area">

                            <div class="announcement-icon">
                                <i class="fa-solid fa-bullhorn"></i>
                            </div>

                            <div class="announcement-title-content">

                                <h5>
                                    {{ $announcement->Title }}
                                </h5>

                                <span class="announcement-date">
                                    <i class="fa-regular fa-calendar"></i>
                                    {{ $announcement->created_at->format('d M Y') }}
                                </span>

                            </div>

                        </div>


                        <span class="announcement-status">
                            <i class="fa-solid fa-circle-check"></i>
                            Active
                        </span>

                    </div>


                    <!-- Divider -->
                    <div class="announcement-divider"></div>


                    <!-- Message -->
                    <div class="announcement-message">

                        <div class="announcement-message-label">
                            <i class="fa-regular fa-message"></i>
                            Announcement
                        </div>

                        <p>
                            {{ $announcement->Message }}
                        </p>

                    </div>


                    <!-- Footer -->
                    <div class="announcement-footer">

                        <span class="announcement-time">
                            <i class="fa-regular fa-clock"></i>
                            {{ $announcement->created_at->format('h:i A') }}
                        </span>

                        <span class="announcement-admin">
                            <i class="fa-solid fa-shield-halved"></i>
                            Campus Coin Admin
                        </span>

                    </div>

                </div>

            </div>

        @endforeach

    </div>

@else

    <!-- Empty State -->
    <div class="announcement-empty">

        <div class="announcement-empty-icon">
            <i class="fa-solid fa-bullhorn"></i>
        </div>

        <h4>No Announcements</h4>

        <p>
            There are no active announcements available right now.
        </p>

    </div>

@endif

</div>

@endsection
