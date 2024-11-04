<nav x-data="{ open: false }" class="_main_menu px-4 py-4">
    <div class="width-7xl mx-auto px-4 sm:px-12 lg:px-12">
        <div class="flex justify-between items-center h-16">
            <div class="flex items-center">
                <a href="{{ route('home') }}">
                    <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                </a>
            </div>
            <div class="hidden md:flex space-x-8">
                <x-nav-link :href="route('home')" :active="request()->routeIs('home')" class="font-4 display-16 color-blue">
                    @if(request()->routeIs('home'))
                        <img src="{{ asset('assets/images/menu/home-active.svg') }}" alt="Home Active" class="mx-2"/>
                    @else
                        <img src="{{ asset('assets/images/menu/home.svg') }}" alt="Home" class="mx-2"/>
                    @endif
                    Home
                </x-nav-link>

                <x-nav-link :href="route('about-us')" :active="request()->routeIs('about-us')" class="font-4 display-16 color-blue">
                    @if(request()->routeIs('about-us'))
                        <img src="{{ asset('assets/images/menu/about-active.svg') }}" alt="about-us Active" class="mx-2"/>
                    @else
                        <img src="{{ asset('assets/images/menu/about.svg') }}" alt="about-us" class="mx-2"/>
                    @endif
                    About us
                </x-nav-link>
                 <x-nav-link :href="route('tour-guides-profile')" :active="request()->routeIs('tour-guides-profile')" class="font-4 display-16 color-blue">
                    @if(request()->routeIs('tour-guides-profile'))
                        <img src="{{ asset('assets/images/menu/tour-guide-active.svg') }}" alt="Tour Guide Profile Active" class="mx-2"/>
                    @else
                        <img src="{{ asset('assets/images/menu/tour-guide.svg') }}" alt="Tour Guide Profile" class="mx-2"/>
                    @endif
                    Tour Guide Profile
                </x-nav-link>
                
                
                <x-nav-link :href="route('destinations')" :active="request()->routeIs('destinations')" class="font-4 display-16 color-blue">
                    @if(request()->routeIs('destinations'))
                        <img src="{{ asset('assets/images/menu/destinations-active.svg') }}" alt="Destinations Active" class="mx-2"/>
                    @else
                        <img src="{{ asset('assets/images/menu/destinations.svg') }}" alt="Destinations" class="mx-2"/>
                    @endif
                    Destinations
                </x-nav-link>
                
                <x-nav-link :href="route('favourites')" :active="request()->routeIs('favourites')" class="font-4 display-16 color-blue">
                    @if(request()->routeIs('favourites'))
                        <img src="{{ asset('assets/images/menu/favourites-active.svg') }}" alt="favourites Active" class="mx-2"/>
                    @else
                        <img src="{{ asset('assets/images/menu/favourites.svg') }}" alt="favourites" class="mx-2"/>
                    @endif
                    Favorites
                </x-nav-link>


                
                <x-nav-link :href="route('join-us')" :active="request()->routeIs('join-us')" class="font-4 display-16 color-blue">
                    @if(request()->routeIs('join-us'))
                        <img src="{{ asset('assets/images/menu/join-us-active.svg') }}" alt="Join us Active" class="mx-2"/>
                    @else
                        <img src="{{ asset('assets/images/menu/join-us.svg') }}" alt="Join us" class="mx-2"/>
                    @endif
                
                    Join us
                </x-nav-link>
                <x-nav-link :href="route('get-help')" :active="request()->routeIs('get-help')" class="font-4 display-16 color-blue">
                    @if(request()->routeIs('get-help'))
                        <img src="{{ asset('assets/images/menu/get-help-active.svg') }}" alt="Get Help Active" class="mx-2"/>
                    @else
                        <img src="{{ asset('assets/images/menu/get-help.svg') }}" alt="Get Help" class="mx-2"/>
                    @endif
                    Get Help
                </x-nav-link>
                @if(auth()->check())
                    <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('login')" class="font-4 display-16 color-blue">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('storage/profile_photo/' . auth()->user()->image) }}" 
                                alt="{{ auth()->user()->name }}" 
                                class="mx-2 rounded-circle" 
                                style="width: 32px; height: 32px;">
                            <span class="mx-2">{{ auth()->user()->name }}</span>
                        </div>
                    </x-nav-link>
                @else
                    <x-nav-link :href="route('login')" :active="request()->routeIs('login')" class="font-4 display-16 color-blue"> 
                        @if(request()->routeIs('login'))
                            <img src="{{ asset('assets/images/menu/login-active.svg') }}" alt="Login Active" class="mx-2"/>
                        @else
                            <img src="{{ asset('assets/images/menu/login.svg') }}" alt="Login" class="mx-2"/>
                        @endif
                        Login
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
                Home
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('tour-guides-profile')" :active="request()->routeIs('tour-guides-profile')">
                Tour Guide Profile
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('destinations')" :active="request()->routeIs('destinations')">
                Destinations
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('join-us')" :active="request()->routeIs('join-us')">
                Join us
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('get-help')" :active="request()->routeIs('get-help')">
                Get Help
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('login')" :active="request()->routeIs('login')">
                Login
            </x-responsive-nav-link>
            <x-responsive-nav-link>
                My Cart
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
