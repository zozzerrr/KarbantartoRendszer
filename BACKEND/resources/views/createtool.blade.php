<x-app-layout>

    <div class="container">

        <form class="p-3" method="POST" action="{{ route('tools.store')}}">
            @csrf
            <h1> Enter Details to create a category</h1>

            <div class="mt-4">

                <x-label for="kategoriaid" :value="__('Katagóriába sorolás')" />

                <select class="form-select" id="kategoriaid" name="kategoriaid" aria-label="kategoriaid">
                    <option selected>Válasszon</option>
                    @foreach ($categories as $categorie)
                        <option value="{{ $categorie->id }}">{{ $categorie->nev }}</option>
                    @endforeach
                </select>

            </div>

            <div class="mb-3">
                <x-label for="id" :value="__('Azonosító')" />

                <x-input id="id" type="text" name="id" :value="old('id')" required autofocus />
            </div>

            <div class="mb-3">
                <x-label for="nev" :value="__('Eszköz neve')" />

                <x-input id="intervallum" type="text" name="nev" :value="old('nev')" required autofocus />
            </div>

            <div class="mb-3">
                <x-label for="leiras" :value="__('Eszköz leírása')" />

                <textarea class="form-control" id="leiras" name="leiras"  rows="3" required></textarea>
            </div>

            <div class="mb-3">
                <x-label for="elhelyezkedes" :value="__('Elhelyezkedes')" />

                <x-input id="elhelyezkedes" type="text" name="elhelyezkedes" :value="old('elhelyezkedes')" required autofocus />
            </div>

            <div class="mb-3">
                <x-label for="kovetkezokarbantartas" :value="__('Következő karbantartás')" />

                <x-input id="kovetkezokarbantartas" type="date" name="kovetkezokarbantartas" :value="old('kovetkezokarbantartas')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">

                <x-button class="btn-success">
                    {{ __('Kategória hozzáadása') }}
                </x-button>
            </div>

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
        </form>
    </div>
</x-app-layout>


