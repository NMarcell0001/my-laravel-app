<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <p class="text-sm text-gray-500 mt-1">
                Enter a valid email address. (Example: asd@gmail.com)
            </p>
            <div id="email-error" class="text-red-500 text-sm mt-1"></div>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" minlength="8" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
            <p class="text-sm text-gray-500 mt-1">
                Password must be at least 8 characters long.
            </p>
            <div id="password-error" class="text-red-500 text-sm mt-1"></div>
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            <div id="confirm-password-error" class="text-red-500 text-sm mt-1"></div>
        </div>

        <!-- Register Button -->
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const form = document.querySelector('form');

                const emailInput = document.querySelector('#email');
                const passwordInput = document.querySelector('#password');
                const confirmPasswordInput = document.querySelector('#password_confirmation');

                const emailError = document.querySelector('#email-error');
                const passwordError = document.querySelector('#password-error');
                const confirmPasswordError = document.querySelector('#confirm-password-error');

                form.addEventListener('submit', function (e) {
                    let hasError = false;

                    // Clear previous errors
                    emailError.textContent = '';
                    passwordError.textContent = '';
                    confirmPasswordError.textContent = '';

                    // Email format check
                    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (!emailPattern.test(emailInput.value)) {
                        emailError.textContent = "Please enter a valid email address.";
                        hasError = true;
                    }

                    // Password length
                    if (passwordInput.value.length < 8) {
                        passwordError.textContent = "Password must be at least 8 characters.";
                        hasError = true;
                    }

                    // Passwords match
                    if (passwordInput.value !== confirmPasswordInput.value) {
                        confirmPasswordError.textContent = "Passwords do not match.";
                        hasError = true;
                    }

                    if (hasError) {
                        e.preventDefault(); // Prevent form submission
                    }
                });
            });
        </script>
    @endpush
</x-guest-layout>
