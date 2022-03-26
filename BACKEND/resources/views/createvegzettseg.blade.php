<!doctype html>
    <html lang="{{ app()->getLocale() }}">
    <head>
      <title>Create kepesites </title>
      <!-- styling etc. -->
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <form method="POST" action="{{ config('app.url')}}/vegzettsegek">
                    @csrf
                    <h1> Enter Details to create a vegzettseg</h1>
                    <div class="form-input">
                        <label>Kepesites neve</label> <input type="text" name="kepesites">
                    </div>
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
    </body>
    </html>