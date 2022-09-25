<x-app-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="h-20 w-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors
            class="mb-4"
            :errors="$errors"
        />

        <form
            method="POST"
            action="{{ route('password.update') }}"
        >
            @csrf

            <!-- Password Reset Token -->
            <input
                type="hidden"
                name="token"
                value="{{ $request->route('token') }}"
            >

            <!-- Email Address -->
            <div>
                <x-input-label
                    for="email"
                    :value="__('Email')"
                />

                <x-text-input
                    id="email"
                    class="mt-1 block w-full"
                    type="email"
                    name="email"
                    :value="old('email', $request->email)"
                    required
                    autofocus
                />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label
                    for="password"
                    :value="__('Password')"
                />

                <x-text-input
                    id="password"
                    class="mt-1 block w-full"
                    type="password"
                    name="password"
                    required
                />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label
                    for="password_confirmation"
                    :value="__('Confirm Password')"
                />

                <x-text-input
                    id="password_confirmation"
                    class="mt-1 block w-full"
                    type="password"
                    name="password_confirmation"
                    required
                />
            </div>

            <div class="mt-4 flex items-center justify-end">
                <x-primary-button>
                    {{ __('Reset Password') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-app-layout>
