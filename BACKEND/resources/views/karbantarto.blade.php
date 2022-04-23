<x-app-layout>

    @if(!$empty)

        @if($vegzettsegek->count() <= 0)
            <h3>Ehhez a karbantartóhoz nem lehet több végzettséget rendelni!</h3>
        @else
            <div class="container">
                <form class="p-3" method="POST" action="{{ route('karbantartok.addVegzettseg')}}">
                    @csrf
                    <div class="mt-4">
                        <p>Karbantartó neve: <span class="fw-bold">{{ $karbantarto->nev }}</span></p>
                    </div>
                    <div class="mt-4">
                        <input type="hidden" name="dolgozoid" value="{{ $karbantarto->id }}" >

                        <x-label for="vegzettsegid" :value="__('Végzettségek')" />
                        <select class="form-select" id="vegzettsegid" name="vegzettsegid" aria-label="vegzettsegid">
                            <option selected>Válasszon</option>
                            @foreach ($vegzettsegek as $vegzettseg)
                                <option value="{{ $vegzettseg->id }}">{{ $vegzettseg->kepesites }}</option>
                            @endforeach
                        </select>

                    </div>

                    <div class="flex items-center justify-end mt-4">

                        <x-button class="btn-success">
                            {{ __('Végzettség hozzákötése') }}
                        </x-button>
                    </div>

                </form>

            </div>
        @endif

    @else
        <h3>Nincs ilyen karbantartó!</h3>
    @endif

</x-app-layout>
