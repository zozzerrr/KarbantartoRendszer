<x-app-layout>

    <div class="container">

    <form class="p-3" method="POST" action="{{ route('karbantartasok.store')}}">
            @csrf
            <h1> Rendkívüli karbantartási feladat rögzítése </h1>

            <div class="mt-4">

                <x-label for="eszkozid" :value="__('Eszköz')" />

                <select class="form-select" id="eszkozid" name="eszkozid" aria-label="eszkozid">
                    <option selected>Válasszon</option>
                    @foreach ($tools as $tool)
                        <option value="{{ $tool->id }}">{{ $tool->nev }}</option>
                    @endforeach
                </select>

            </div>

            <div class="mb-3">
                <x-label for="sulyossag" :value="__('Súlyosság')" />
                <x-input type="number" min="1" max="10" value="5" id="sulyossag" name="sulyossag">
            </div>

            <div class="mb-3">
                <x-label for="idopont" :value="__('Időpont')" />
                <x-input id="idopont" type="date" name="idopont" :value="old('idopont')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">

                <x-button class="btn-success">
                    {{ __('Rendkívüli karbantartás hozzáadása') }}
                </x-button>
            </div>

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
        </form>
    </div>
</x-app-layout>
