<x-guest-layout>

    <div class="campus-login-page">

        {{-- LEFT SIDE --}}
        <div class="campus-login-left">

            <div class="campus-brand">

                <img
                    src="{{ asset('assets/images/logo/img.png') }}"
                    alt="CampusCoin"
                    class="login-logo"
                >

                <h1>CampusCoin</h1>

                <p>
                    Manage your student budget<br>
                    easily and smartly.
                </p>

            </div>

        </div>


        {{-- RIGHT SIDE --}}
        <div class="campus-login-right">

            <div class="login-card">

                <div class="login-heading">

                    <h2>Welcome Back!</h2>

                    <p>
                        Login to manage your finances
                    </p>

                </div>


                {{-- SESSION STATUS --}}
                <x-auth-session-status
                    class="mb-4"
                    :status="session('status')"
                />


                {{-- VALIDATION ERRORS --}}
                <x-validation-errors
                    class="mb-4"
                />


                {{-- LOGIN FORM --}}
                <form method="POST" action="{{ route('login') }}">

                    @csrf


                    {{-- EMAIL --}}
                    <div class="login-field">

                        <label for="email">
                            Email Address
                        </label>

                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autofocus
                            autocomplete="username"
                            placeholder="Enter your email"
                        >

                    </div>


                    {{-- PASSWORD --}}
                    <div class="login-field">

                        <label for="password">
                            Password
                        </label>

                        <input
                            id="password"
                            type="password"
                            name="password"
                            required
                            autocomplete="current-password"
                            placeholder="Enter your password"
                        >

                    </div>


                    {{-- REMEMBER + FORGOT --}}
                    <div class="login-options">

                        <label class="remember-me">

                            <input
                                type="checkbox"
                                name="remember"
                                id="remember_me"
                            >

                            <span>Remember me</span>

                        </label>


                        @if (Route::has('password.request'))

                            <a href="{{ route('password.request') }}">
                                Forgot Password?
                            </a>

                        @endif

                    </div>


                    {{-- LOGIN BUTTON --}}
                    <button
                        type="submit"
                        class="login-button"
                    >

                        <i class="bi bi-box-arrow-in-right"></i>

                        Login

                    </button>

                </form>


                {{-- REGISTER --}}
                @if (Route::has('register'))

                    <div class="register-text">

                        Don't have an account?

                        <a href="{{ route('register') }}">
                            Create Account
                        </a>

                    </div>

                @endif

            </div>

        </div>

    </div>


    {{-- LOGIN PAGE CSS --}}
    <style>

        * {
            box-sizing: border-box;
        }


        body {
            margin: 0;
            background: #f4f7ff;
        }


        .campus-login-page {
            min-height: 100vh;
            display: flex;
            background: #f4f7ff;
        }


        /* LEFT SIDE */

        .campus-login-left {
            width: 45%;
            min-height: 100vh;

            display: flex;
            align-items: center;
            justify-content: center;

            background: linear-gradient(
                145deg,
                #435fc7,
                #687ed2
            );

            padding: 50px;
        }


        .campus-brand {
            text-align: center;
            color: white;
        }


        .login-logo {
            width: 180px;
            height: 100px;

            object-fit: contain;

            background: white;
            border-radius: 20px;

            padding: 10px;

            margin-bottom: 25px;
        }


        .campus-brand h1 {
            font-size: 38px;
            font-weight: 700;
            margin: 0 0 12px;
        }


        .campus-brand p {
            font-size: 17px;
            line-height: 1.7;
            margin: 0;

            opacity: 0.9;
        }


        /* RIGHT SIDE */

        .campus-login-right {
            width: 55%;

            min-height: 100vh;

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 40px;
        }


        /* LOGIN CARD */

        .login-card {
            width: 100%;
            max-width: 460px;

            background: white;

            padding: 42px;

            border-radius: 18px;

            box-shadow:
                0 15px 45px rgba(43, 60, 120, 0.10);
        }


        /* HEADING */

        .login-heading {
            margin-bottom: 30px;
        }


        .login-heading h2 {
            color: #173d78;

            font-size: 30px;

            font-weight: 700;

            margin-bottom: 8px;
        }


        .login-heading p {
            color: #7890bd;

            margin: 0;

            font-size: 15px;
        }


        /* FORM */

        .login-field {
            margin-bottom: 22px;
        }


        .login-field label {
            display: block;

            color: #173d78;

            font-size: 15px;

            font-weight: 600;

            margin-bottom: 8px;
        }


        .login-field input {
            width: 100%;

            height: 52px;

            padding: 0 16px;

            border: 1px solid #dce3f2;

            border-radius: 9px;

            color: #173d78;

            background: #fff;

            font-size: 15px;

            outline: none;

            transition: 0.2s;
        }


        .login-field input:focus {
            border-color: #526bc9;

            box-shadow:
                0 0 0 3px rgba(82, 107, 201, 0.10);
        }


        .login-field input::placeholder {
            color: #a2aec4;
        }


        /* OPTIONS */

        .login-options {
            display: flex;

            align-items: center;

            justify-content: space-between;

            margin-bottom: 25px;

            font-size: 14px;
        }


        .remember-me {
            display: flex;

            align-items: center;

            gap: 7px;

            color: #6e7f9f;

            cursor: pointer;
        }


        .remember-me input {
            width: 16px;
            height: 16px;

            accent-color: #526bc9;
        }


        .login-options a {
            color: #526bc9;

            text-decoration: none;

            font-weight: 600;
        }


        .login-options a:hover {
            text-decoration: underline;
        }


        /* LOGIN BUTTON */

        .login-button {
            width: 100%;

            height: 52px;

            border: none;

            border-radius: 9px;

            background: #4b63c6;

            color: white;

            font-size: 16px;

            font-weight: 600;

            cursor: pointer;

            transition: 0.2s;
        }


        .login-button:hover {
            background: #394fae;

            transform: translateY(-1px);
        }


        .login-button i {
            margin-right: 7px;
        }


        /* REGISTER */

        .register-text {
            text-align: center;

            margin-top: 25px;

            color: #7b8ba8;

            font-size: 14px;
        }


        .register-text a {
            color: #526bc9;

            font-weight: 600;

            text-decoration: none;

            margin-left: 4px;
        }


        .register-text a:hover {
            text-decoration: underline;
        }


        /* MOBILE */

        @media (max-width: 900px) {

            .campus-login-page {
                display: block;
            }


            .campus-login-left {
                width: 100%;
                min-height: 280px;

                padding: 30px;
            }


            .campus-login-right {
                width: 100%;
                min-height: auto;

                padding: 30px 20px;
            }


            .campus-brand h1 {
                font-size: 30px;
            }


            .login-logo {
                width: 150px;
                height: 80px;
            }

        }


        @media (max-width: 500px) {

            .login-card {
                padding: 28px 22px;
            }


            .login-heading h2 {
                font-size: 25px;
            }


            .login-options {
                align-items: flex-start;

                flex-direction: column;

                gap: 12px;
            }

        }

    </style>

</x-guest-layout>