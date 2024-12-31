<nav x-data="{ open: false }" class="_main_menu px-4 py-4">
    <div class="width-7xl mx-auto px-4 sm:px-12 lg:px-12">
        <div class="flex justify-between items-center h-16">
            <div class="flex items-center me-md-4">
                <a href="{{ route('home') }}">
                    <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                </a>
            </div>
            <div class="hidden md:flex">
                <x-nav-link :href="route('home')" :active="request()->routeIs('home') || request()->routeIs('/')" class="me-3 font-4 display-14 color-blue">
                    <img src="{{ asset('assets/images/menu/home.svg') }}" alt="Home" class="mx-2"/>
                    {{ __('website.MENU.HOME') }}
                </x-nav-link>

                <x-nav-link :href="route('about-us')" :active="request()->routeIs('about-us')" class="font-4 display-14 color-blue">
                    <img src="{{ asset('assets/images/menu/about.svg') }}" alt="about-us" class="mx-2"/>
                    {{ __('website.MENU.ABOUT_US') }}
                </x-nav-link>
                 <x-nav-link :href="route('tour-guides-profile')" :active="request()->routeIs('tour-guides-profile')" class="font-4 display-14 color-blue">
                    <img src="{{ asset('assets/images/menu/tour-guide.svg') }}" alt="Tour Guide Profile" class="mx-2"/>
                    {{ __('website.MENU.TOURGUIDE_PROFILE') }}
                </x-nav-link>
                
                
                <x-nav-link :href="route('destinations')" :active="request()->routeIs('destinations')" class="font-4 display-14 color-blue">
                    <img src="{{ asset('assets/images/menu/destinations.svg') }}" alt="Destinations" class="mx-2"/>
                    {{ __('website.MENU.DESTINATIONS') }}
                </x-nav-link>
                
                <x-nav-link :href="route('favourites')" :active="request()->routeIs('favourites')" class="font-4 display-14 color-blue">
                    <img src="{{ asset('assets/images/menu/favourites.svg') }}" alt="favourites" class="mx-2"/>
                    {{ __('website.MENU.FAVOURITES') }}
                </x-nav-link>
                <x-nav-link :href="route('join-us')" :active="request()->routeIs('join-us')" class="font-4 display-14 color-blue">
                    <img src="{{ asset('assets/images/menu/join-us.svg') }}" alt="Join us" class="mx-2"/>
                    {{ __('website.MENU.JOIN_US') }}
                </x-nav-link>
                <x-nav-link :href="route('get-help')" :active="request()->routeIs('get-help')" class="font-4 display-14 color-blue">
                    <img src="{{ asset('assets/images/menu/get-help.svg') }}" alt="Get Help" class="mx-2"/>
                    {{ __('website.MENU.GET_HELP') }}
                </x-nav-link>
                @if(auth()->check())
                    <div class="hidden sm:flex sm:items-center sm:ms-6 _login">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="inline-flex items-center px-3 py-2  border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                    <div class="ms-1 d-flex justify-content-start align-items-center">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('storage/profile_photo/' . auth()->user()->image) }}" 
                                                alt="{{ auth()->user()->name }}" 
                                                class="mx-1 rounded-circle" @if(auth()->user()->image === 'default.png')  @else width="32px" height="32px" @endif>
                                            <span class="mx-1">{{ auth()->user()->username ?? auth()->user()->name }}</span>
                                        </div>
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                <x-dropdown-link :href="route('user.dashboard')">
                                    My Account
                                </x-dropdown-link>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link class="m-0" :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @else
                    <x-nav-link :href="route('login')" :active="request()->routeIs('login')" class="font-4 display-14 color-blue"> 
                        <img src="{{ asset('assets/images/menu/login.svg') }}" alt="Login" class="mx-2"/>
                        {{ __('website.MENU.LOGIN') }}
                    </x-nav-link>
                @endif
                {{-- <x-nav-link class="font-4 display-16 color-blue">
                    @if(request()->routeIs('cart'))
                        <img src="{{ asset('assets/images/menu/cart-active.svg') }}" alt="My Cart Active" class="mx-2"/>
                    @else
                        <img src="{{ asset('assets/images/menu/cart.svg') }}" alt="My Cart" class="mx-2"/>
                    @endif
                    My Cart
                </x-nav-link> --}}
            </div>
            <div class="-me-2 flex items-center md:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <div :class="{'block': open, 'hidden': ! open}" class="hidden md:hidden">
        <div class="pt-2 pb-3 space-y-1">

            <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">
                {{ __('website.MENU.HOME') }}
            </x-responsive-nav-link>
           
            <x-responsive-nav-link :href="route('about-us')" :active="request()->routeIs('about-us')">
                {{ __('website.MENU.ABOUT_US') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('tour-guides-profile')" :active="request()->routeIs('tour-guides-profile')">
                {{ __('website.MENU.TOURGUIDE_PROFILE') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('destinations')" :active="request()->routeIs('destinations')">
                {{ __('website.MENU.DESTINATIONS') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('favourites')" :active="request()->routeIs('favourites')">
                {{ __('website.MENU.FAVOURITES') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('join-us')" :active="request()->routeIs('join-us')">
                {{ __('website.MENU.JOIN_US') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('get-help')" :active="request()->routeIs('get-help')">
                {{ __('website.MENU.GET_HELP') }}
            </x-responsive-nav-link>
            
            <x-responsive-nav-link :href="route('login')" :active="request()->routeIs('login')">
                {{ __('website.MENU.LOGIN') }}
            </x-responsive-nav-link>
        
        </div>
        
        {{-- <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="mt-2 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>
            </div>
        </div> --}}
    </div>
</nav>
