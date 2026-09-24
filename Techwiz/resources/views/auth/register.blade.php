<x-guest-layout>
    <x-authentication-card>

        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" value="{{ __('Name') }}" />

                <x-input
                    id="name"
                    class="block mt-1 w-full"
                    type="text"
                    name="name"
                    :value="old('name')"
                    required
                    autofocus
                    autocomplete="name"
                />
            </div>

            <!-- Email -->
            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />

                <x-input
                    id="email"
                    class="block mt-1 w-full"
                    type="email"
                    name="email"
                    :value="old('email')"
                    required
                    autocomplete="username"
                />
            </div>

            <!-- Academic Year -->
            <div class="mt-4">
                <x-label
                    for="Academicyear"
                    value="{{ __('Academic Year') }}"
                />

                <select
                    id="Academicyear"
                    name="Academicyear"
                    class="block mt-1 w-full border-gray-300 rounded-md shadow-sm"
                    required
                >
                    <option value="">Select Academic Year</option>

                    <option
                        value="1st Year"
                        {{ old('Academicyear') == '1st Year' ? 'selected' : '' }}
                    >
                        1st Year
                    </option>

                    <option
                        value="2nd Year"
                        {{ old('Academicyear') == '2nd Year' ? 'selected' : '' }}
                    >
                        2nd Year
                    </option>

                    <option
                        value="3rd Year"
                        {{ old('Academicyear') == '3rd Year' ? 'selected' : '' }}
                    >
                        3rd Year
                    </option>

                    <option
                        value="4th Year"
                        {{ old('Academicyear') == '4th Year' ? 'selected' : '' }}
                    >
                        4th Year
                    </option>

                    <option
                        value="Graduate"
                        {{ old('Academicyear') == 'Graduate' ? 'selected' : '' }}
                    >
                        Graduate
                    </option>
                </select>
            </div>

            <!-- Savings Goal -->
            <div class="mt-4">
                <x-label
                    for="Savingsgoal"
                    value="{{ __('Savings Goal') }}"
                />

                <x-input
                    id="Savingsgoal"
                    class="block mt-1 w-full"
                    type="number"
                    name="Savingsgoal"
                    :value="old('Savingsgoal')"
                    min="0"
                    step="0.01"
                    placeholder="Enter your savings goal"
                    required
                />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label
                    for="password"
                    value="{{ __('Password') }}"
                />

                <x-input
                    id="password"
                    class="block mt-1 w-full"
                    type="password"
                    name="password"
                    required
                    autocomplete="new-password"
                />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label
                    for="password_confirmation"
                    value="{{ __('Confirm Password') }}"
                />

                <x-input
                    id="password_confirmation"
                    class="block mt-1 w-full"
                    type="password"
                    name="password_confirmation"
                    required
                    autocomplete="new-password"
                />
            </div>

            <!-- Terms and Privacy Policy -->
            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())

                <div class="mt-4">

                    <x-label for="terms">

                        <div class="flex items-center">

                            <x-checkbox
                                name="terms"
                                id="terms"
                                required
                            />

                            <div class="ms-2">

                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                    'terms_of_service' =>
                                        '<a target="_blank" href="' .
                                        route('terms.show') .
                                        '" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' .
                                        __('Terms of Service') .
                                        '</a>',

                                    'privacy_policy' =>
                                        '<a target="_blank" href="' .
                                        route('policy.show') .
                                        '" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' .
                                        __('Privacy Policy') .
                                        '</a>',
                                ]) !!}

                            </div>

                        </div>

                    </x-label>

                </div>

            @endif

            <!-- Register Button -->
            <div class="flex items-center justify-end mt-4">

                <a
                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('login') }}"
                >
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ms-4">
                    {{ __('Register') }}
                </x-button>

            </div>

        </form>

    </x-authentication-card>
</x-guest-layout>