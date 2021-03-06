<x-app-layout>
    <x-auth-card>


        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="nev" :value="__('Név')" />

                <x-input id="nev" type="text" name="nev" :value="old('nev')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="jelszo" :value="__('Jelszo')" />

                <x-input id="jelszo"
                                type="password"
                                name="jelszo"
                                required autocomplete="new-password" />

                <div id="jelszoHelp" class="form-text">Legalább 8 karakter hosszú legyen!</div>
            </div>

             <!-- Name -->

             <div class="mt-4">
                <x-label for="szerepkorID" :value="__('Szerepkör')" />

                 <select class="form-select" id="szerepkorID" name="szerepkorID" aria-label="szerepkorID">
                     <option hidden>Válasszon</option>
                     @foreach ($roles as $role)
                         <option value="{{ $role->id }}">{{ $role->nev }}</option>
                     @endforeach
                 </select>

            </div>

            <div class="flex items-center justify-end mt-4">

                <x-button class="btn-success">
                    {{ __('Felhasználó hozzáadása') }}
                </x-button>
            </div>

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4 my-2" :errors="$errors" />

            @if(session()->has('error'))
                <div class="alert alert-danger p-3 my-2">
                    {{ session()->get('error') }}
                </div>
            @endif

            @if(session()->has('success'))
                <div class="alert alert-success p-3 my-2">
                    {{ session()->get('success') }}
                </div>

            @endif


        </form>


    </x-auth-card>
</x-app-layout>
