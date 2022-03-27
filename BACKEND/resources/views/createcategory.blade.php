<!doctype html>
    <html lang="{{ app()->getLocale() }}">
    <head>
      <title>Create Product | Product Store</title>
      <!-- styling etc. -->
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <form method="POST" action="{{ config('app.url')}}/categories">
                    @csrf
                    <h1> Enter Details to create a category</h1>
                    <div class="form-input">
                        <label>Szuloid</label> <input type="text" name="szuloid">
                    </div>

                    <div class="form-input">
                        <label>Nev</label> <input type="text" name="nev">
                    </div>
                    <div class="form-input">
                        <label>Intervallum</label> <input type="text" name="intervallum">
                    </div>
                    <div class="form-input">
                        <label>Normaido</label> <input type="text" name="normaido">
                    </div>                                        

                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
    </body>
    </html>