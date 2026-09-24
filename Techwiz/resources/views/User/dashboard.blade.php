@extends('layouts.user')

@section('title', 'Dashboard')

@section('content')

<div class="page-content">
    <section class="row">

        <div class="col-12 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body text-center">
                    <h6 class="text-muted">Wallet Balance</h6>
                    <h3>500 Coins</h3>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body text-center">
                    <h6 class="text-muted">Earned Coins</h6>
                    <h3>250</h3>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body text-center">
                    <h6 class="text-muted">Redeemed Coins</h6>
                    <h3>100</h3>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body text-center">
                    <h6 class="text-muted">Transactions</h6>
                    <h3>35</h3>
                </div>
            </div>
        </div>

        <div class="col-12 mt-4">
            <div class="card">
                <div class="card-header">
                    <h4>Recent Transactions</h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Activity</th>
                                <th>Coins</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>24-09-2026</td>
                                <td>Quiz Completed</td>
                                <td>+50</td>
                            </tr>
                            <tr>
                                <td>23-09-2026</td>
                                <td>Reward Redeemed</td>
                                <td>-100</td>
                            </tr>
                            <tr>
                                <td>22-09-2026</td>
                                <td>Event Participation</td>
                                <td>+30</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </section>
</div>

@endsection