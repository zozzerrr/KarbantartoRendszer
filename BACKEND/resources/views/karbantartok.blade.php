<x-app-layout>

    <div class="container">

        <table class="table">
            <thead>

            <tr>
                <th scope="col">#</th>
                <th scope="col">Név</th>
            </tr>

            </thead>
            <tbody>

            @foreach ($karbantartok as $karbantarto)
                <tr>
                    <td scope="row">{{ $loop->index }}</td>
                    <td >{{ $karbantarto->nev }}</td>
                    <td ><a class="btn btn-warning" href="{{ config('app_url') }}/karbantartok/{{ $karbantarto->id }}">Végzettség hozzáadása</a></td>
                </tr>
            @endforeach

            </tbody>
        </table>

    </div>

</x-app-layout>
