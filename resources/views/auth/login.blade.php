<x-guest-layout>

    <div class="auth-page">

        <div class="auth-shape shape-1"></div>
        <div class="auth-shape shape-2"></div>

        <div class="auth-card">

            <div class="auth-brand">

                <img
                    src="{{ asset('assets/images/logo/img.png') }}"
                    alt="CampusCoin"
                    class="auth-logo"
                >

                <h1>CampusCoin</h1>

            </div>

            <div class="auth-heading">

                <h2>Welcome Back</h2>

                <p>Login to manage your student budget</p>

            </div>


            {{-- LOGIN FORM --}}
            <form method="POST" action="{{ route('login') }}">

                @csrf


                {{-- EMAIL --}}
                <div class="auth-field">

                    <label for="email">Email Address</label>

                    <div class="input-wrapper">

                        <i class="bi bi-envelope input-icon"></i>

                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autofocus
                            autocomplete="username"
                            placeholder="you@example.com"
                        >

                    </div>

                </div>


                {{-- PASSWORD --}}
                <div class="auth-field">

                    <label for="password">Password</label>

                    <div class="input-wrapper">

                        <i class="bi bi-lock input-icon"></i>

                        <input
                            id="password"
                            type="password"
                            name="password"
                            required
                            autocomplete="current-password"
                            placeholder="Enter your password"
                        >

                        <i class="bi bi-eye-slash toggle-password" data-target="password"></i>

                    </div>

                </div>


                {{-- REMEMBER + FORGOT --}}
                <div class="auth-options">

                    <label class="remember-me">

                        <input type="checkbox" name="remember" id="remember_me">
                        <span>Remember me</span>

                    </label>


                    @if (Route::has('password.request'))

                        <a href="{{ route('password.request') }}">
                            Forgot Password?
                        </a>

                    @endif

                </div>


                {{-- LOGIN BUTTON --}}
                <button type="submit" class="auth-button">
                    <i class="bi bi-box-arrow-in-right"></i>
                    Login
                </button>

            </form>


            {{-- REGISTER --}}
            @if (Route::has('register'))

                <div class="auth-footer-text">

                    Don't have an account?

                    <a href="{{ route('register') }}">Create Account</a>

                </div>

            @endif

        </div>

    </div>


    {{-- AUTH PAGES CSS --}}
    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
        }

        .auth-page {
            min-height: 100vh;
            width: 100%;

            display: flex;
            align-items: center;
            justify-content: center;

            position: relative;
            overflow: hidden;

            background: #0f1229;
            padding: 30px 20px;
        }

        .auth-shape {
            position: absolute;
            border-radius: 50%;
            filter: blur(60px);
            opacity: 0.55;
            z-index: 0;
        }

        .shape-1 {
            width: 420px;
            height: 420px;

            top: -120px;
            left: -100px;

            background: radial-gradient(circle, #7c3aed, transparent 70%);
        }

        .shape-2 {
            width: 480px;
            height: 480px;

            bottom: -150px;
            right: -120px;

            background: radial-gradient(circle, #06b6d4, transparent 70%);
        }

        .auth-card {
            position: relative;
            z-index: 1;

            width: 100%;
            max-width: 420px;

            background: rgba(255, 255, 255, 0.97);

            padding: 44px 38px;

            border-radius: 22px;

            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.35);
        }

        .auth-brand {
            display: flex;
            align-items: center;
            gap: 12px;

            margin-bottom: 28px;
        }

        .auth-logo {
            width: 46px;
            height: 46px;

            object-fit: contain;

            border-radius: 10px;
        }

        .auth-brand h1 {
            font-size: 20px;
            font-weight: 800;

            color: #0f1229;

            margin: 0;
        }

        .auth-heading {
            margin-bottom: 28px;
        }

        .auth-heading h2 {
            font-size: 26px;
            font-weight: 700;

            color: #0f1229;

            margin: 0 0 6px;
        }

        .auth-heading p {
            color: #7b7f9e;
            font-size: 14px;
            margin: 0;
        }

        .auth-field {
            margin-bottom: 20px;
        }

        .auth-field label {
            display: block;

            font-size: 13px;
            font-weight: 600;

            color: #0f1229;

            margin-bottom: 7px;
        }

        .input-wrapper {
            position: relative;

            display: flex;
            align-items: center;
        }

        .input-icon {
            position: absolute;
            left: 15px;

            color: #9ca0c2;
            font-size: 16px;

            pointer-events: none;
        }

        .input-wrapper input {
            width: 100%;
            height: 50px;

            padding: 0 44px;

            border: 1.5px solid #e6e7f2;
            border-radius: 10px;

            font-size: 14px;
            color: #0f1229;

            outline: none;

            transition: 0.2s;
        }

        .input-wrapper input:focus {
            border-color: #7c3aed;

            box-shadow: 0 0 0 4px rgba(124, 58, 237, 0.10);
        }

        .input-wrapper input::placeholder {
            color: #b3b6cf;
        }

        .toggle-password {
            position: absolute;
            right: 15px;

            color: #9ca0c2;
            font-size: 16px;

            cursor: pointer;

            transition: 0.15s;
        }

        .toggle-password:hover {
            color: #7c3aed;
        }

        .auth-options {
            display: flex;
            align-items: center;
            justify-content: space-between;

            margin-bottom: 24px;

            font-size: 13px;
        }

        .remember-me {
            display: flex;
            align-items: center;
            gap: 7px;

            color: #6b6f8d;

            cursor: pointer;
        }

        .remember-me input {
            width: 15px;
            height: 15px;

            accent-color: #7c3aed;
        }

        .auth-options a {
            color: #7c3aed;
            font-weight: 600;

            text-decoration: none;
        }

        .auth-options a:hover {
            text-decoration: underline;
        }

        .auth-button {
            width: 100%;
            height: 50px;

            border: none;
            border-radius: 10px;

            background: linear-gradient(135deg, #7c3aed, #4f46e5);

            color: white;

            font-size: 15px;
            font-weight: 700;

            cursor: pointer;

            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;

            transition: 0.2s;
        }

        .auth-button:hover {
            transform: translateY(-2px);

            box-shadow: 0 10px 25px rgba(124, 58, 237, 0.35);
        }

        .auth-footer-text {
            text-align: center;

            margin-top: 24px;

            color: #7b7f9e;
            font-size: 13px;
        }

        .auth-footer-text a {
            color: #7c3aed;
            font-weight: 600;

            text-decoration: none;

            margin-left: 4px;
        }

        .auth-footer-text a:hover {
            text-decoration: underline;
        }

        @media (max-width: 480px) {

            .auth-card {
                padding: 34px 24px;
            }

            .auth-heading h2 {
                font-size: 22px;
            }

        }

    </style>


    {{-- PASSWORD TOGGLE SCRIPT --}}
    <script>

        document.querySelectorAll('.toggle-password').forEach(function (icon) {

            icon.addEventListener('click', function () {

                var input = document.getElementById(icon.dataset.target);

                if (input.type === 'password') {
                    input.type = 'text';
                    icon.classList.remove('bi-eye-slash');
                    icon.classList.add('bi-eye');
                } else {
                    input.type = 'password';
                    icon.classList.remove('bi-eye');
                    icon.classList.add('bi-eye-slash');
                }

            });

        });

    </script>

</x-guest-layout>