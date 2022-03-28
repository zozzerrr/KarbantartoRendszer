<nav class="navbar navbar-expand-lg navbar-light bg-light">

    <div class="container-fluid">

        <a class="navbar-brand" >{{ Auth::user()->nev }}</a>


        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav">

                <li class="nav-item">
                    <x-nav-link class="nav-link" :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Kezdőlap') }}
                    </x-nav-link>
                </li>

                @if(Auth::user()->hasRole('Eszközfelelős'))

                    <li class="nav-item">
                        <x-nav-link class="nav-link" :href="route('register')" :active="request()->routeIs('register')">
                            {{ __('Kategória felvétele') }}
                        </x-nav-link>
                    </li>
                    <li class="nav-item">
                        <x-nav-link class="nav-link" :href="route('register')" :active="request()->routeIs('categories')">
                            {{ __('Kategóriák') }}
                        </x-nav-link>
                    </li>

                    <li class="nav-item">
                        <x-nav-link class="nav-link" :href="route('register')" :active="request()->routeIs('register')">
                            {{ __('Eszköz felvétele') }}
                        </x-nav-link>
                    </li>
                    <li class="nav-item">
                        <x-nav-link class="nav-link" :href="route('register')" :active="request()->routeIs('register')">
                            {{ __('Eszközök') }}
                        </x-nav-link>
                    </li>

                @endif

                @if(Auth::user()->hasRole('Adminisztrátor'))
                <li class="nav-item">
                    <x-nav-link class="nav-link" :href="route('register')" :active="request()->routeIs('register')">
                        {{ __('Felhasználó felvétele') }}
                    </x-nav-link>
                </li>
                @endif

                @if(Auth::user())
                <li class="nav-item">
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link class="nav-link btn btn-danger" :href="route('logout')"
                                               onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </li>
                @endif
            </ul>

        </div>

    </div>

</nav>
