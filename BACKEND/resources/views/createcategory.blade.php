<x-app-layout>

    <div class="container">

    <form class="p-3" method="POST" action="{{ route('categories.store')}}">
            @csrf

            <h1>Kategória létrehozása</h1>

            <div class="mt-4">

                <x-label for="szerepkorID" :value="__('Szülő kategória')" />

                <select class="form-select" id="szuloid" name="szuloid" aria-label="szuloid">
                    <option hidden>Válasszon</option>
                    <option value="0">Fő kategória</option>
                    @foreach ($categories as $categorie)
                        <option value="{{ $categorie->id }}">{{ $categorie->nev }}</option>
                    @endforeach
                </select>

            </div>

            <div class="mb-3">
                <x-label for="nev" :value="__('Név')" />

                <x-input id="nev" type="text" name="nev" :value="old('nev')" required autofocus />
            </div>

            <div class="mb-3">
                <x-label for="intervallum" :value="__('Intervallum')" />

                <x-input id="intervallum" type="number" name="intervallum" :value="old('intervallum')" autofocus/>
            </div>

            <div class="mb-3">
                <x-label for="normaido" :value="__('Normaidő')" />

                <x-input id="normaido" type="time" step="1" name="normaido" :value="old('normaido')" required autofocus />
            </div>

            <div class="mb-3">
                <x-label for="karbantartasInstrukcio" :value="__(' Karbantartásra vonatkozó instrukciók')" />

                <textarea class="form-control" id="karbantartasInstrukcio" name="karbantartasInstrukcio"  rows="3" required></textarea>
            </div>


            <div class="flex items-center justify-end mt-4">

                <x-button class="btn-success">
                    {{ __('Kategória hozzáadása') }}
                </x-button>
            </div>

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            @if(session()->has('error'))
                <div class="alert alert-danger p-3 my-2">
                    {{ session()->get('error') }}
                </div>
            @endif

        </form>
    </div>

</x-app-layout>
