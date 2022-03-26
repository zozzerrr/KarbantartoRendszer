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