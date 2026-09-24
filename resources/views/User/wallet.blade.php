@extends('layouts.user')

@section('content')

<div class="page-heading">
    <h3>My Wallet</h3>
</div>

<div class="page-content">
    <div class="row">

        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <h6>Current Balance</h6>
                    <h3>500 Coins</h3>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <h6>Total Earned</h6>
                    <h3>750 Coins</h3>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <h6>Total Redeemed</h6>
                    <h3>250 Coins</h3>
                </div>
            </div>
        </div>

    </div>

    <div class="card mt-4">
        <div class="card-header">
            <h4>Recent Activity</h4>
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
                        <td>Event Participation</td>
                        <td>+30</td>
                    </tr>

                    <tr>
                        <td>22-09-2026</td>
                        <td>Reward Redeemed</td>
                        <td>-100</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection