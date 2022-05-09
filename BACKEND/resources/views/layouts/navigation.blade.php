<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <a class="navbar-brand" >{{ Auth::user()->nev }}</a>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">

            <ul class="navbar-nav me-auto mb-2 mb-lg-0">


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
                    <li class="nav-item">
                        <x-nav-link class="nav-link" :href="route('karbantartasok.create')" :active="request()->routeIs('karbantartasok.create')">
                            {{ __('Rendkívüli karbantartás felvitele') }}
                        </x-nav-link>
                    </li>
                    <li class="nav-item">
                        <x-nav-link class="nav-link" :href="route('karbantartasok.index')" :active="request()->routeIs('karbantartasok.index')">
                            {{ __('Karbantartások') }}
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

                @if(Auth::user()->hasRole('Karbantartó'))
                    <li class="nav-item">
                        <x-nav-link class="nav-link" :href="route('feladatok.index')" :active="request()->routeIs('feladatok.index')">
                            {{ __('Feladatok') }}
                        </x-nav-link>
                    </li>
                @endif

                @if(Auth::user())
                    <li class="nav-item">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf



                            <x-responsive-nav-link class="nav-link btn btn-danger text-white" :href="route('logout')"
                                                   onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                {{ __('Kilépés') }}
                            </x-responsive-nav-link>
                        </form>
                    </li>
                @endif



            </ul>

        </div>
    </div>
</nav>
