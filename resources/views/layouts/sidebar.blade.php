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

                <a href="/frmt" class="sidebar-link">

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

                    {{-- INCOME --}}
                    <li class="submenu-item">

                        <a href="/income" class="submenu-link">

                            <i class="bi bi-arrow-down-circle"></i>

                            <span>Income</span>

                        </a>

                    </li>


                    {{-- EXPENSES --}}
                    <li class="submenu-item">

                        <a href="/expenses" class="submenu-link">

                            <i class="bi bi-arrow-up-circle"></i>

                            <span>Expenses</span>

                        </a>

                    </li>

                </ul>

            </li>


            {{-- CATEGORIES --}}
            <li class="sidebar-item">

                <a href="/categories" class="sidebar-link">

                    <i class="bi bi-tags-fill"></i>

                    <span>Categories</span>

                </a>

            </li>


            {{-- REPORTS --}}
            <li class="sidebar-item">

                <a href="/reports" class="sidebar-link">

                    <i class="bi bi-bar-chart-fill"></i>

                    <span>Reports</span>

                </a>

            </li>


            {{-- BUDGET GOALS --}}
            <li class="sidebar-item">

                <a href="/budget-goals" class="sidebar-link">

                    <i class="bi bi-bullseye"></i>

                    <span>Budget Goals</span>

                </a>

            </li>


            {{-- SAVING TIPS --}}
            <li class="sidebar-item">

                <a href="/saving-tips" class="sidebar-link">

                    <i class="bi bi-lightbulb-fill"></i>

                    <span>Saving Tips</span>

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