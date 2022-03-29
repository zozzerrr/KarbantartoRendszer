<x-app-layout>

    <div class="container">

        <table class="table">
            <thead>

            <tr>
                <th scope="col">#</th>
                <th scope="col">Képesítés</th>
            </tr>

            </thead>
            <tbody>

            @foreach ($vegzettsegek as $vegzettseg)
                <tr>
                    <td scope="row">{{ $loop->index }}</td>
                    <td >{{ $vegzettseg->kepesites }}</td>
                    <td ><a class="btn btn-warning" href="{{ config('app_url') }}/vegoria/{{ $vegzettseg->id }}">Frisítés</a></td>
                </tr>
            @endforeach

            </tbody>
        </table>

    </div>

</x-app-layout>
