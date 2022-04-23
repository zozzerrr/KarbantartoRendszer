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
                        <x-nav-link class="nav-link" :href="route('categories.create')" :active="request()->routeIs('categories.create')">
                            {{ __('Kategória felvétele') }}
                        </x-nav-link>
                    </li>
                    <li class="nav-item">
                        <x-nav-link class="nav-link" :href="route('categories.index')" :active="request()->routeIs('categories.index')">
                            {{ __('Kategóriák') }}
                        </x-nav-link>
                    </li>

                    <li class="nav-item">
                        <x-nav-link class="nav-link" :href="route('tools.create')" :active="request()->routeIs('tools.create')">
                            {{ __('Eszköz felvétele') }}
                        </x-nav-link>
                    </li>
                    <li class="nav-item">
                        <x-nav-link class="nav-link" :href="route('tools.index')" :active="request()->routeIs('tools.index')">
                            {{ __('Eszközök') }}
                        </x-nav-link>
                    </li>
                    @endif

                    @if(Auth::user()->hasRole('Operátor'))
                    <li class="nav-item">
                        <x-nav-link class="nav-link" :href="route('vegzettsegek.create')" :active="request()->routeIs('vegzettsegek.create')">
                            {{ __('Végzettség felvétele') }}
                        </x-nav-link>
                    </li>
                    <li class="nav-item">
                        <x-nav-link class="nav-link" :href="route('vegzettsegek.index')" :active="request()->routeIs('vegzettsegek.index')">
                            {{ __('Végzettségek') }}
                        </x-nav-link>
                    </li>
                    <li class="nav-item">
                        <x-nav-link class="nav-link" :href="route('karbantartok.getAllKarbantarto')" :active="request()->routeIs('karbantartok.getAllKarbantarto')">
                            {{ __('Karbantartók') }}
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
