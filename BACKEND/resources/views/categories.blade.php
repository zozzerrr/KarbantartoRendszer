<x-app-layout>

    <div class="container">

        <table class="table">
            <thead>

            <tr>
                <th scope="col">#</th>
                <th scope="col">Szülő</th>
                <th scope="col">Név</th>
                <th scope="col">Intervallum</th>
                <th scope="col">Normaidő</th>
                <th scope="col">Karbantartásra vonatkozó instrukciók</th>
            </tr>

            </thead>
            <tbody>

            @foreach ($categories as $category)
                <tr>
                    <td scope="row">{{ $loop->index }}</td>
                    <td >{{ $category->szuloid }}</td>
                    <td>{{ $category->nev }}</td>
                    <td>{{ $category->intervallum}}</td>
                    <td>{{ $category->normaido }}</td>
                    <td>{{ $category->karbantartasInstrukcio}}</td>
                </tr>
            @endforeach

            </tbody>
        </table>

    </div>

</x-app-layout>
