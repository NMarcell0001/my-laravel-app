<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div>
            <p class="text-xl text-red-500 font-bold mt-1">
                All fields are necessary to fill in!
            </p>
        </div>

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <p class="text-sm text-gray-500 mt-1">
                Enter a valid email address. (Example: asd@gmail.com)
            </p>
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
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
               href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <!-- Register button with id for toggling -->
            <x-primary-button id="register-button" class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>

    </form>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const nameInput = document.getElementById('name');
                const emailInput = document.getElementById('email');
                const passwordInput = document.getElementById('password');
                const confirmPasswordInput = document.getElementById('password_confirmation');
                const registerButton = document.getElementById('register-button');

                // Simple email regex for validation
                const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

                function validateForm() {
                    const nameValid = nameInput.value.trim() !== '';
                    const emailValid = emailPattern.test(emailInput.value.trim());
                    const passwordValid = passwordInput.value.length >= 8;
                    const confirmPasswordValid = confirmPasswordInput.value === passwordInput.value && confirmPasswordInput.value !== '';

                    // Show button only if ALL fields are valid
                    if (nameValid && emailValid && passwordValid && confirmPasswordValid) {
                        registerButton.style.display = 'inline-block';
                    } else {
                        registerButton.style.display = 'none';
                    }
                }

                // Attach input listeners to all fields
                [nameInput, emailInput, passwordInput, confirmPasswordInput].forEach(input => {
                    input.addEventListener('input', validateForm);
                });

                // Initial call to hide button on page load if fields are empty
                validateForm();
            });
        </script>
    @endpush
</x-guest-layout>
