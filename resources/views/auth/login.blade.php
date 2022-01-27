<x-guest-layout>
    <x-auth-card>


        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <img src="{{ asset('images/logo.png') }}" class="absolute border-4 rounded-full border-indigo-800 h-20 w-20 -top-10 left-2/4 transform -translate-x-2/4" alt="">


        <h1 class="text-center mb-8 text-2xl font-black text-gray-900">Sign in to your account</h1>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full " type="text" name="email" :value="old('email')"  autofocus />
                @error('email')
                <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                {{ $message }}
                </span>
                @enderror
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full "
                                type="password"
                                name="password"
                                 autocomplete="current-password" />
                @error('password')
                <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1 ">
                {{ $message }}
                </span>
                @enderror
            </div>

            <!-- Remember Me -->
           

            <div class="flex items-center justify-end mt-4">
              

                <x-button class="ml-3">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
