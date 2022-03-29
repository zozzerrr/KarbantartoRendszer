<x-app-layout>

    @if(!$empty)

        @if($categories->count() <= 0)
            <h3>Ehhez a végzethséghez nem lehet több kategóriát rendelni!!</h3>
        @else
            <div class="container">
                <form class="p-3" method="POST" action="{{ route('vegoria.addCategory')}}">
                    @csrf
                    <div class="mt-4">
                        <p>Végzettség neve: <span class="fw-bold">{{ $vegzettseg->kepesites }}</span></p>
                    </div>
                    <div class="mt-4">
                        <input type="hidden" name="vegzettseg_id" value="{{ $vegzettseg->id }}" >

                        <x-label for="kategoria_id" :value="__('Kategóriák')" />
                        <select class="form-select" id="kategoria_id" name="kategoria_id" aria-label="kategoria_id">
                            <option selected>Válasszon</option>
                            @foreach ($categories as $categorie)
                                <option value="{{ $categorie->id }}">{{ $categorie->nev }}</option>
                            @endforeach
                        </select>

                    </div>

                    <div class="flex items-center justify-end mt-4">

                        <x-button class="btn-success">
                            {{ __('Kategória hozzákötése') }}
                        </x-button>
                    </div>

                </form>

            </div>
        @endif

    @else
        <h3>Nincs ilyen végzettség!</h3>
    @endif

</x-app-layout>
