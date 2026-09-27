<x-guest-layout>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css">

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

                <h2>Forgot Password?</h2>

                <p>
                    No problem. Just let us know your email address
                    and we will email you a password reset link.
                </p>

            </div>


            @session('status')

                <div class="status-message">
                    {{ $value }}
                </div>

            @endsession


            <x-validation-errors class="mb-4" />


            {{-- FORGOT PASSWORD FORM --}}
            <form method="POST" action="{{ route('password.email') }}">

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


                {{-- SEND BUTTON --}}
                <button type="submit" class="auth-button">
                    <i class="bi bi-send"></i>
                    Email Password Reset Link
                </button>

            </form>


            {{-- BACK TO LOGIN --}}
            <div class="auth-footer-text">

                Remember your password?

                <a href="{{ route('login') }}">Login here</a>

            </div>

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
            padding: 24px 16px;
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

            padding: 34px 32px;

            border-radius: 20px;

            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.35);
        }

        .auth-brand {
            display: flex;
            align-items: center;
            gap: 10px;

            margin-bottom: 18px;
        }

        .auth-logo {
            width: 38px;
            height: 38px;

            object-fit: contain;

            border-radius: 8px;
        }

        .auth-brand h1 {
            font-size: 18px;
            font-weight: 800;

            color: #0f1229;

            margin: 0;
        }

        .auth-heading {
            margin-bottom: 20px;
        }

        .auth-heading h2 {
            font-size: 22px;
            font-weight: 700;

            color: #0f1229;

            margin: 0 0 8px;
        }

        .auth-heading p {
            color: #7b7f9e;
            font-size: 13.5px;
            line-height: 1.6;
            margin: 0;
        }

        .status-message {
            background: #ecfdf5;
            border: 1px solid #a7f3d0;

            color: #059669;

            font-size: 13px;
            font-weight: 500;

            padding: 10px 14px;

            border-radius: 8px;

            margin-bottom: 16px;
        }

        .auth-field {
            margin-bottom: 20px;
        }

        .auth-field label {
            display: block;

            font-size: 12.5px;
            font-weight: 600;

            color: #0f1229;

            margin-bottom: 5px;
        }

        .input-wrapper {
            position: relative;

            display: flex;
            align-items: center;
        }

        .input-icon {
            position: absolute;
            left: 13px;

            color: #9ca0c2;
            font-size: 15px;

            pointer-events: none;
        }

        .input-wrapper input {
            width: 100%;
            height: 44px;

            padding: 0 40px;

            border: 1.5px solid #e6e7f2;
            border-radius: 9px;

            font-size: 13.5px;
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

        .auth-button {
            width: 100%;
            height: 46px;

            border: none;
            border-radius: 9px;

            background: linear-gradient(135deg, #7c3aed, #4f46e5);

            color: white;

            font-size: 14px;
            font-weight: 700;

            cursor: pointer;

            display: flex;
            align-items: center;
            justify-content: center;
            gap: 7px;

            transition: 0.2s;
        }

        .auth-button:hover {
            transform: translateY(-2px);

            box-shadow: 0 10px 25px rgba(124, 58, 237, 0.35);
        }

        .auth-footer-text {
            text-align: center;

            margin-top: 20px;

            color: #7b7f9e;
            font-size: 12.5px;
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

        .auth-card ul {
            padding-left: 16px;
            color: #d9534f;
            font-size: 12.5px;
        }

        @media (max-width: 480px) {

            .auth-card {
                padding: 28px 22px;
            }

            .auth-heading h2 {
                font-size: 20px;
            }

        }

    </style>

</x-guest-layout>