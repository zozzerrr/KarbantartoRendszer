<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="flex-center position-ref full-height">
      <div class="content">
        <div class="title m-b-md">Category</div>
        <div class="links">
          <a href="{{ config('app.url')}}/categories/create">Create Category</a>
          <a href="{{ config('app.url')}}/categories">View Categories</a>
        </div>
      </div>
    </div>

    <div class="flex-center position-ref full-height">
      <div class="content">
        <div class="title m-b-md">Tool</div>
        <div class="links">
          <a href="{{ config('app.url')}}/tools/create">Create Tool</a>
          <a href="{{ config('app.url')}}/tools">View Tools</a>
        </div>
      </div>
    </div>
    <div class="flex-center position-ref full-height">
      <div class="content">
        <div class="title m-b-md">Vegzettsegek</div>
        <div class="links">
          <a href="{{ config('app.url')}}/vegzettsegek/create">Create Vegzettseg</a>
          <a href="{{ config('app.url')}}/vegzettsegek">View Vegzettseg</a>
        </div>
      </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
