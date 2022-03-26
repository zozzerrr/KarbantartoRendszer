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
                        <label>Name</label> <input type="text" name="name">
                    </div>

                    <div class="form-input">
                        <label>Interval</label> <input type="text" name="minterval">
                    </div>

                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
    </body>
    </html>