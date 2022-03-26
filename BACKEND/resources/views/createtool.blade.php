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
                        <td>ID</td>
                        <td>Name</td>
                        <td>Interval</td>
                    </thead>
                    <tbody>
                        @foreach ($allCategories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td class="inner-table">{{ $category->minterval }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
            <div class="content">
                <form method="POST" action="{{ config('app.url')}}/tools">
                    @csrf
                    <h1> Enter Details to create a category</h1>
                    <div class="form-input">
                        <label>ID</label> <input type="text" name="id">
                    </div>

                    <div class="form-input">
                        <label>Name</label> <input type="text" name="name">
                    </div>

                    <div class="form-input">
                        <label>Place</label> <input type="text" name="place">
                    </div>

                    <div class="form-input">
                        <label>Category</label> <input type="number" name="category_id">
                    </div>

                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
    </body>
    </html>