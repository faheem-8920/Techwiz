<x-guest-layout>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css">

    <div class="auth-page">

        <div class="auth-shape shape-1"></div>
        <div class="auth-shape shape-2"></div>

        <div class="auth-card register-card">

            <div class="auth-brand">

                <img
                    src="{{ asset('assets/images/logo/img.png') }}"
                    alt="CampusCoin"
                    class="auth-logo"
                >

                <h1>CampusCoin</h1>

            </div>

            <div class="auth-heading">

                <h2>Create Account</h2>

                <p>Join CampusCoin and start managing your money</p>

            </div>


            <x-validation-errors class="mb-4" />


            {{-- REGISTER FORM --}}
            <form method="POST" action="{{ route('register') }}">

                @csrf

                <div class="fields-grid">

                    {{-- NAME --}}
                    <div class="auth-field">

                        <label for="name">Name</label>

                        <div class="input-wrapper">

                            <i class="bi bi-person input-icon"></i>

                            <input
                                id="name"
                                type="text"
                                name="name"
                                value="{{ old('name') }}"
                                required
                                autofocus
                                autocomplete="name"
                                placeholder="Enter your full name"
                            >

                        </div>

                    </div>


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
                                autocomplete="username"
                                placeholder="you@example.com"
                            >

                        </div>

                    </div>


                    {{-- ACADEMIC YEAR --}}
                    <div class="auth-field">

                        <label for="Academicyear">Academic Year</label>

                        <div class="input-wrapper">

                            <i class="bi bi-book input-icon"></i>

                            <select
                                id="Academicyear"
                                name="Academicyear"
                                required
                            >

                                <option value="">Select Academic Year</option>

                                <option value="1st Year" {{ old('Academicyear') == '1st Year' ? 'selected' : '' }}>1st Year</option>
                                <option value="2nd Year" {{ old('Academicyear') == '2nd Year' ? 'selected' : '' }}>2nd Year</option>
                                <option value="3rd Year" {{ old('Academicyear') == '3rd Year' ? 'selected' : '' }}>3rd Year</option>
                                <option value="4th Year" {{ old('Academicyear') == '4th Year' ? 'selected' : '' }}>4th Year</option>
                                <option value="Graduate" {{ old('Academicyear') == 'Graduate' ? 'selected' : '' }}>Graduate</option>

                            </select>

                        </div>

                    </div>


                    {{-- SAVINGS GOAL --}}
                    <div class="auth-field">

                        <label for="Savingsgoal">Savings Goal</label>

                        <div class="input-wrapper">

                            <i class="bi bi-cash-coin input-icon"></i>

                            <input
                                id="Savingsgoal"
                                type="number"
                                name="Savingsgoal"
                                value="{{ old('Savingsgoal') }}"
                                min="0"
                                step="0.01"
                                required
                                placeholder="Enter your savings goal"
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
                                autocomplete="new-password"
                                placeholder="Enter your password"
                            >

                            <i class="bi bi-eye-slash toggle-password" data-target="password"></i>

                        </div>

                    </div>


                    {{-- CONFIRM PASSWORD --}}
                    <div class="auth-field">

                        <label for="password_confirmation">Confirm Password</label>

                        <div class="input-wrapper">

                            <i class="bi bi-lock input-icon"></i>

                            <input
                                id="password_confirmation"
                                type="password"
                                name="password_confirmation"
                                required
                                autocomplete="new-password"
                                placeholder="Confirm your password"
                            >

                            <i class="bi bi-eye-slash toggle-password" data-target="password_confirmation"></i>

                        </div>

                    </div>

                </div>


                {{-- TERMS AND PRIVACY POLICY --}}
                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())

                    <div class="terms-row">

                        <label class="remember-me">

                            <input type="checkbox" name="terms" id="terms" required>

                            <span>

                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                    'terms_of_service' =>
                                        '<a target="_blank" href="' . route('terms.show') . '">' .
                                        __('Terms of Service') .
                                        '</a>',

                                    'privacy_policy' =>
                                        '<a target="_blank" href="' . route('policy.show') . '">' .
                                        __('Privacy Policy') .
                                        '</a>',
                                ]) !!}

                            </span>

                        </label>

                    </div>

                @endif


                {{-- REGISTER BUTTON --}}
                <button type="submit" class="auth-button">
                    <i class="bi bi-person-plus"></i>
                    Create Account
                </button>

            </form>


            {{-- LOGIN LINK --}}
            <div class="auth-footer-text">

                Already registered?

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
            max-width: 560px;

            background: rgba(255, 255, 255, 0.97);

            padding: 32px 34px;

            border-radius: 20px;

            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.35);
        }

        .register-card {
            max-height: 96vh;
            overflow-y: auto;

            scrollbar-width: none;
            -ms-overflow-style: none;
        }

        .register-card::-webkit-scrollbar {
            display: none;
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
            margin-bottom: 18px;
        }

        .auth-heading h2 {
            font-size: 22px;
            font-weight: 700;

            color: #0f1229;

            margin: 0 0 4px;
        }

        .auth-heading p {
            color: #7b7f9e;
            font-size: 13px;
            margin: 0;
        }

        .fields-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px 16px;

            margin-bottom: 4px;
        }

        .auth-field {
            margin-bottom: 14px;
        }

        .fields-grid .auth-field {
            margin-bottom: 0;
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

        .input-wrapper input,
        .input-wrapper select {
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

       .input-wrapper select {
    appearance: none;

    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 16 16' fill='none'%3E%3Cpath d='M4 6l4 4 4-4' stroke='%239ca0c2' stroke-width='1.8' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 14px center;
    background-size: 16px;
}

        .input-wrapper input:focus,
        .input-wrapper select:focus {
            border-color: #7c3aed;

            box-shadow: 0 0 0 4px rgba(124, 58, 237, 0.10);
        }

        .input-wrapper input::placeholder {
            color: #b3b6cf;
        }

        .toggle-password {
            position: absolute;
            right: 13px;

            color: #9ca0c2;
            font-size: 15px;

            cursor: pointer;

            transition: 0.15s;

            z-index: 2;
        }

        .toggle-password:hover {
            color: #7c3aed;
        }

        .terms-row {
            margin: 18px 0;
        }

        .terms-row .remember-me {
            align-items: flex-start;
        }

        .terms-row .remember-me input {
            margin-top: 3px;
        }

        .terms-row span {
            color: #6b6f8d;
            font-size: 12.5px;
            line-height: 1.5;
        }

        .terms-row a {
            color: #7c3aed;
            font-weight: 600;

            text-decoration: none;
        }

        .terms-row a:hover {
            text-decoration: underline;
        }

        .remember-me {
            display: flex;
            align-items: center;
            gap: 6px;

            color: #6b6f8d;

            cursor: pointer;
        }

        .remember-me input {
            width: 14px;
            height: 14px;

            accent-color: #7c3aed;
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

            margin-top: 6px;
        }

        .auth-button:hover {
            transform: translateY(-2px);

            box-shadow: 0 10px 25px rgba(124, 58, 237, 0.35);
        }

        .auth-footer-text {
            text-align: center;

            margin-top: 18px;

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

        @media (max-width: 640px) {

            .fields-grid {
                grid-template-columns: 1fr;
            }

        }

        @media (max-width: 480px) {

            .auth-card {
                padding: 26px 20px;
                max-width: 100%;
            }

            .auth-heading h2 {
                font-size: 20px;
            }

            .register-card {
                max-height: none;
                overflow-y: visible;
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