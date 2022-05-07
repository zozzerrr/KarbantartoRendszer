<x-app-layout>

    <div class="container">

        <table class="table">
            <thead>

            <tr>
                <th scope="col">#</th>
                <th scope="col">Név</th>
                <th scope="col">Végzettségek</th>
                <th scope="col">Opciók</th>
            </tr>

            </thead>
            <tbody>

            @foreach ($karbantartok as $karbantarto)
                <tr>
                    <td scope="row">{{ $loop->index+1 }}</td>
                    <td >{{ $karbantarto->nev }}</td>
                    <td >
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton{{$loop->index}}" data-bs-toggle="dropdown" aria-expanded="false">
                                Végzettségek
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton{{$loop->index}}">
                                @forelse ($karbantarto->kepesitesek as $kepesites)
                                    <li class="p-1 text-break">{{ $kepesites->kepesites }}</li>
                                @empty
                                    <li  class="p-1 text-break">Még nincs hozzá rendelve</li>
                                @endforelse
                            </ul>
                        </div>
                    </td>
                    <td ><a class="btn btn-warning" href="{{ config('app_url') }}/karbantartok/{{ $karbantarto->id }}">Végzettség hozzáadása</a></td>
                </tr>
            @endforeach

            </tbody>
        </table>

    </div>

</x-app-layout>
