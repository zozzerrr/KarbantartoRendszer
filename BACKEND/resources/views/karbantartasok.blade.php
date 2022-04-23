<x-app-layout>

    <div class="container">

        <table class="table">
            <thead>

            <tr>
                <th scope="col">#</th>
                <th scope="col">Eszköz azonosító</th>
                <th scope="col">Rendkívüli hiba</th>
                <th scope="col">Hiba súlyossága</th>
                <th scope="col">Időpont</th>
                <th scope="col">Állapot</th>
            </tr>

            </thead>
            <tbody>

                @foreach ($allKarbantartasok as $karbantartas)
                    <tr>
                        <td scope="row">{{ $loop->index }}</td>
                        <td>{{ $karbantartas->eszkozid }}</td>
                        <td>{{ $karbantartas->hibaE }}</td>
                        <td>{{ $karbantartas->sulyossag }}</td>
                        <td>{{ $karbantartas->idopont }}</td>
                        <td>{{ $karbantartas->allapot }}</td>                  
                    </tr>
                @endforeach

            </tbody>
        </table>

    </div>

</x-app-layout>
