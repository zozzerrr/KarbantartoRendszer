<!doctype html>
    <html lang="{{ app()->getLocale() }}">
    <head>
      <title>Create Product | Product Store</title>
      <!-- styling etc. -->
    </head>
    <body>
        <div class="flex-center position-ref full-height">
        <div class="flex-center position-ref full-height">
            <div class="content">
                <h1>Here's a list of available categories</h1>
                <table>
                    <thead>
                        <td>szuloid</td>
                        <td>nev</td>
                        <td>intervallum</td>
                        <td>normaido</td>
                    </thead>
                    <tbody>
                        @foreach ($allCategories as $category)
                            <tr>
                                <td>{{ $category->szuloid }}</td>                                
                                <td>{{ $category->nev }}</td>
                                <td>{{ $category->intervallum}}</td>
                                <td>{{ $category->normaido }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
            <div class="content">
                <form method="POST" action="{{ config('app.url')}}/tools">
                    @csrf
                    <h1> Enter Details to create a tool</h1>
                    <div class="form-input">
                        <label>ID</label> <input type="text" name="id">
                    </div>

                    <div class="form-input">
                        <label>kategoriaid</label> <input type="text" name="kategoriaid">
                    </div>

                    <div class="form-input">
                        <label>nev</label> <input type="text" name="nev">
                    </div>

                    <div class="form-input">
                        <label>leiras</label> <input type="text" name="leiras">
                    </div>
                    <div class="form-input">
                        <label>elhelyezkedes</label> <input type="text" name="elhelyezkedes">
                    </div>
                    <div class="form-input">
                        <label>kovetkezokarbantartas</label> <input type="text" name="kovetkezokarbantartas">
                    </div>                    



                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
    </body>
    </html>