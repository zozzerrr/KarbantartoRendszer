<x-app-layout>

    <div class="container">

        <table class="table">
            <thead>

            <tr>
                <th scope="col">#</th>
                <th scope="col">ID</th>
                <th scope="col">Kategoriaid</th>
                <th scope="col">Név</th>
                <th scope="col">Leiras</th>
                <th scope="col">Elhelyezkedes</th>
                <th scope="col">Kovetkezokarbantartas</th>
            </tr>

            </thead>
            <tbody>

                @foreach ($allTools as $tool)
                    <tr>
                        <td scope="row">{{ $loop->index }}</td>
                        <td>{{ $tool->id }}</td>
                        <td>{{ $tool->kategoriaid }}</td>
                        <td>{{ $tool->nev }}</td>
                        <td>{{ $tool->leiras }}</td>
                        <td>{{ $tool->elhelyezkedes }}</td>
                        <td>{{ $tool->kovetkezokarbantartas }}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>

    </div>

</x-app-layout>
