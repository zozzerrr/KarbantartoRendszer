<x-app-layout>

    <div class="container">

        <table class="table">
            <thead>

            <tr>
                <th scope="col">#</th>
                <th scope="col">Név</th>
                <th scope="col">Elhelyezkedés</th>
                <th scope="col">Súlyosság</th>
                <th scope="col">Állapot</th>
                <th scope="col">Leírás</th>
                <th scope="col">Normaidő</th>
                <th scope="col">Instrukciók</th>
            </tr>

            </thead>
            <tbody>

                @foreach ($allFeladatok as $feladat)
                    <tr>
                        <td scope="row">{{ $loop->index }}</td>
                        <td>{{ $feladat->nev }}</td>
                        <td>{{ $feladat->elhelyezkedes }}</td>
                        <td>{{ $feladat->sulyossag }}</td>
                        <td>{{ $feladat->allapot }}</td>
                        <td>{{ $feladat->leiras }}</td>
                        <td>{{ $feladatok->normaido }}</td>
                        @if ($feladat->allapot == 'Megkezdve')
                        <td>{{ $feladat->karbantartasInstrukcio }}</td>
                        @endif
                        
                    </tr>
                @endforeach

            </tbody>
        </table>

    </div>

</x-app-layout>
