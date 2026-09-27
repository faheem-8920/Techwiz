<div class="sidebar-wrapper active">

    {{-- SIDEBAR HEADER --}}
    <div class="sidebar-header">

        <div class="d-flex justify-content-between align-items-center">

            {{-- CAMPUSCOIN LOGO --}}
            <div class="logo campuscoin-logo">

                <img
                    src="{{ asset('assets/images/logo/img.png') }}"
                    alt="CampusCoin"
                    style="width: 200px; height: 80px; object-fit: cover;"
                >

            </div>

            {{-- MOBILE SIDEBAR CLOSE --}}
            <div class="toggler">
                <a href="#" class="sidebar-hide d-xl-none d-block">
                    <i class="bi bi-x bi-middle"></i>
                </a>
            </div>

        </div>

    </div>


    {{-- SIDEBAR MENU --}}
    <div class="sidebar-menu">

        <ul class="menu">


            {{-- DASHBOARD --}}
            <li class="sidebar-item">

                <a href="/userdashboard" class="sidebar-link">

                    <i class="bi bi-grid-fill"></i>

                    <span>Dashboard</span>

                </a>

            </li>


            {{-- TRANSACTIONS --}}
            <li class="sidebar-item has-sub">

                <a href="#" class="sidebar-link">

                    <i class="bi bi-arrow-left-right"></i>

                    <span>Transactions</span>

                </a>


                <ul class="submenu">

                    {{-- ALL TRANSACTIONS --}}
                    <li class="submenu-item">

                        <a href="/useralltransactions" class="submenu-link">

                            <i class="bi bi-list-ul"></i>

                            <span>All Transactions</span>

                        </a>

                    </li>


                    {{-- ADD TRANSACTION --}}
                    <li class="submenu-item">

                        <a href="/useraddtransaction" class="submenu-link">

                            <i class="bi bi-plus-circle"></i>

                            <span>Add Transaction</span>

                        </a>

                    </li>


                    {{-- SCHEDULED TRANSACTIONS --}}
                    <li class="submenu-item">

                        <a href="/userallscheduledtransactions" class="submenu-link">

                            <i class="bi bi-calendar-event"></i>

                            <span>Scheduled Transactions</span>

                        </a>

                    </li>

                </ul>

            </li>


            {{-- CATEGORIES --}}
            <li class="sidebar-item">

                <a href="/userallcategories" class="sidebar-link">

                    <i class="bi bi-tags-fill"></i>

                    <span>Categories</span>

                </a>

            </li>


            {{-- BUDGET GOALS --}}
            <li class="sidebar-item">

                <a href="/userallbudgets" class="sidebar-link">

                    <i class="bi bi-bullseye"></i>

                    <span>Budget Goals</span>

                </a>

            </li>


            {{-- REPORTS --}}
            <li class="sidebar-item">

                <a href="/userreports" class="sidebar-link">

                    <i class="bi bi-bar-chart-fill"></i>

                    <span>Reports</span>

                </a>

            </li>


            {{-- SAVING INSIGHTS --}}
            <li class="sidebar-item">

                <a href="/userinsights" class="sidebar-link">

                    <i class="bi bi-lightbulb-fill"></i>

                    <span>Saving Insights</span>

                </a>

            </li>


            {{-- ANNOUNCEMENTS --}}
            <li class="sidebar-item">

                <a href="/userallannouncements" class="sidebar-link">

                    <i class="bi bi-megaphone-fill"></i>

                    <span>Announcements</span>

                </a>

            </li>


            {{-- ACCOUNT --}}
            <li class="sidebar-title mt-3">
                Account
            </li>


            {{-- PROFILE --}}
            <li class="sidebar-item">

                <a href="/profile" class="sidebar-link">

                    <i class="bi bi-person-circle"></i>

                    <span>Profile</span>

                </a>

            </li>


            {{-- SETTINGS --}}
            <li class="sidebar-item">

                <a href="/settings" class="sidebar-link">

                    <i class="bi bi-gear-fill"></i>

                    <span>Settings</span>

                </a>

            </li>


            {{-- LOGOUT --}}
            <li class="sidebar-item">

                <form method="POST" action="{{ route('logout') }}">

                    @csrf

                    <button
                        type="submit"
                        class="sidebar-link border-0 bg-transparent w-100 text-start"
                    >

                        <i class="bi bi-box-arrow-right"></i>

                        <span>Logout</span>

                    </button>

                </form>

            </li>

        </ul>

    </div>


    {{-- SIDEBAR TOGGLER --}}
    <button class="sidebar-toggler btn x">

        <i class="bi bi-x"></i>

    </button>

</div>


{{-- CAMPUSCOIN LOGO CSS --}}
<style>

    /* Logo aur menu ka gap kam */
    .sidebar-wrapper .sidebar-header {
        padding-bottom: 5px;
    }

    .sidebar-wrapper .sidebar-menu {
        margin-top: 0 !important;
    }

    .sidebar-wrapper .sidebar-menu .menu {
        margin-top: 0 !important;
        padding-top: 0 !important;
    }


    /* Logo Container */
    .campuscoin-logo {
        width: 100%;
        display: flex;
        align-items: center;
    }


    /* Logo Link */
    .campuscoin-logo a {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
    }


    /* Logo Image */
    .campuscoin-logo img {
        width: 150px;
        height: 60px;
        object-fit: contain;
        display: block;
        margin-top: 15px;
    }


    /* Logout Button */
    .sidebar-menu form {
        margin: 0;
        padding: 0;
    }


    .sidebar-menu form .sidebar-link {
        cursor: pointer;
        font-family: inherit;
        font-size: inherit;
    }


    /* Mobile Logo */
    @media (max-width: 1199px) {

        .campuscoin-logo img {
            width: 140px;
            height: 55px;
        }

    }

</style>
