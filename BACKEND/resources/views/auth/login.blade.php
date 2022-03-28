<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" style="width: 20px"/>
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />


            <div class="row justify-content-center p-2">
                <div class="col-6">

                    <form class="" method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Address -->
                        <div class="mb-3">
                            <x-label for="email" :value="__('Email')" />

                            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <x-label for="jelszo" :value="__('Jelszo')" />

                            <x-input id="jelszo" class="block mt-1 w-full"
                                     type="password"
                                     name="jelszo"
                                     required autocomplete="current-password" />
                        </div>

                        <div class="mb-3 d-flex flex-row-reverse">

                            <x-button class="ml-3">
                                {{ __('Belépés') }}
                            </x-button>
                        </div>

                    </form>

                </div>
            </div>




    </x-auth-card>
</x-guest-layout>
