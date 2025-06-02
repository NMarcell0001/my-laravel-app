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
            <p id="email-feedback" class="text-sm mt-1"></p>
            <p class="text-sm text-gray-500 mt-1">
                Enter a valid email address. (Example: asd@gmail.com)
            </p>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full"
                          type="password"
                          name="password"
                          required autocomplete="new-password"
                          minlength="8" />
            <p id="password-feedback" class="text-sm mt-1"></p>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
            <p class="text-sm text-gray-500 mt-1">
                Password must be at least 8 characters long.
            </p>
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                          type="password"
                          name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

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
                const emailInput = document.getElementById('email');
                const passwordInput = document.getElementById('password');

                const emailFeedback = document.getElementById('email-feedback');
                const passwordFeedback = document.getElementById('password-feedback');

                emailInput.addEventListener('input', function () {
                    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (emailInput.value.trim() === '') {
                        emailFeedback.textContent = '';
                    } else if (!emailPattern.test(emailInput.value)) {
                        emailFeedback.textContent = 'Invalid email format.';
                        emailFeedback.className = 'text-sm text-red-600 mt-1';
                    } else {
                        emailFeedback.textContent = 'Valid email format.';
                        emailFeedback.className = 'text-sm text-green-600 mt-1';
                    }
                });

                passwordInput.addEventListener('input', function () {
                    if (passwordInput.value.trim() === '') {
                        passwordFeedback.textContent = '';
                    } else if (passwordInput.value.length < 8) {
                        passwordFeedback.textContent = 'Password is too short.';
                        passwordFeedback.className = 'text-sm text-red-600 mt-1';
                    } else {
                        passwordFeedback.textContent = 'Password length is sufficient.';
                        passwordFeedback.className = 'text-sm text-green-600 mt-1';
                    }
                });
            });
        </script>
    @endpush
</x-guest-layout>
