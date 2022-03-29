<x-app-layout>

    <div class="container">

        <form class="p-3" method="POST" action="{{ route('vegzettsegek.store')}}">
            @csrf
            <div class="mb-3">
                <x-label for="kepesites" :value="__('Képesítés neve')" />

                <x-input id="kepesites" type="text" name="kepesites" :value="old('kepesites')" required autofocus />
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
