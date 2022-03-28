<!doctype html>
    <html lang="{{ app()->getLocale() }}">
    <head>
        <title>View Tools</title>


    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <h1>Here's a list of available vegzettsegek</h1>
                <table>
                    <thead>
                        <td>kepesitesek</td>
                    </thead>
                    <tbody>
                        @foreach ($allVegzettseg as $vegzettseg)
                            <tr>
                                <td>{{ $vegzettseg->kepesites }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </body>
    </html>

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

            @foreach ($vezgettsegek as $vezgettsegg)
                <tr>
                    <td scope="row">{{ $loop->index }}</td>
                    <td >{{ $vezgettsegg->kepesites }}</td>

                </tr>
            @endforeach

            </tbody>
        </table>

    </div>

</x-app-layout>
