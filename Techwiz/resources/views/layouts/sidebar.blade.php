<div class="sidebar-wrapper active">

    <div class="sidebar-header">
        <div class="d-flex justify-content-between">

            <div class="logo">
                <a href="{{ route('dashboard') }}">
                    <img src="{{ asset('assets/images/logo/logo.png') }}" alt="CampusCoin">
                </a>
            </div>

            <div class="toggler">
                <a href="#" class="sidebar-hide d-xl-none d-block">
                    <i class="bi bi-x bi-middle"></i>
                </a>
            </div>

        </div>
    </div>

    <div class="sidebar-menu">
        <ul class="menu">

            <li class="sidebar-title">CampusCoin</li>

            <li class="sidebar-item active">
                <a href="/" class="sidebar-link">
                    <i class="bi bi-grid-fill"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a href="/wallet" class="sidebar-link">
                    <i class="bi bi-wallet2"></i>
                    <span>Wallet</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a href="/transactions" class="sidebar-link">
                    <i class="bi bi-arrow-left-right"></i>
                    <span>Transactions</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a href="#" class="sidebar-link">
                    <i class="bi bi-coin"></i>
                    <span>Earn Coins</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a href="#" class="sidebar-link">
                    <i class="bi bi-gift-fill"></i>
                    <span>Redeem Rewards</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a href="#" class="sidebar-link">
                    <i class="bi bi-trophy-fill"></i>
                    <span>Leaderboard</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a href="#" class="sidebar-link">
                    <i class="bi bi-person-circle"></i>
                    <span>Profile</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a href="#" class="sidebar-link">
                    <i class="bi bi-gear-fill"></i>
                    <span>Settings</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a href="#" class="sidebar-link">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Logout</span>
                </a>
            </li>

        </ul>
    </div>

    <button class="sidebar-toggler btn x">
        <i class="bi bi-x"></i>
    </button>

</div>