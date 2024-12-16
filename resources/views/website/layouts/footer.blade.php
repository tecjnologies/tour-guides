<style>
    footer._footer {
        background-size: cover;
        background-repeat: no-repeat;
        background-position: top center;
    }
    ._footer ._footer_menu a{
        position: relative;
    }
    ._footer ._footer_menu a+a:before {
        content: '|';
        position: absolute;
        left: -14%;
    }

</style>

<footer class="_footer px-5" style="background-image: url({{ asset('assets/images/footer/background.svg') }})">
    <div class="spacer py-4"></div>
    <x-home.discovering-regions /> 
    <div class="spacer py-5"></div>
    <div class="row">
        <div class="col-md-4">
        </div>
        <div class="col-md-4 d-flex justify-content-end align-items-center flex-column">
            
            <div class="flex justify-center">
                <x-website.application-light-logo class="h-12 w-auto" />
            </div>
            <div class="flex space-x-6 _footer_menu py-3">

                <x-nav-link :href="route('about-us')"  class="font-4 display-14 color-white">
                    {{ __('website.MENU.ABOUT_US') }}
                </x-nav-link>
                
                <x-nav-link :href="route('join-us')" class="font-4 display-14 color-white">
                    {{ __('website.MENU.JOIN_US') }}
                </x-nav-link>

                <x-nav-link :href="route('get-help')" class="font-4 display-14 color-white">
                    {{ __('website.MENU.GET_HELP') }}
                </x-nav-link>
                
                <x-nav-link :href="route('terms-and-conditions')" class="font-4 display-14 color-white">
                    {{ __('website.MENU.TERMSANDCONDITIONS') }}
                </x-nav-link>

            </div>

            <div class="social-links d-flex justify-content-center align-items-center py-2">
                <h3 class="font-4 display-14 color-white me-3">  {{ __('website.LABELS.LETSCONNECT') }}: </h3>
                <a href="https://www.facebook.com/YourPage" target="_blank" rel="noopener" title="Follow us on Facebook" class="me-3">
                    <img src="{{ asset('assets/images/icons/facebook.svg') }}" alt="Facebook" width="24" height="24" />
                </a>
                <a href="https://www.twitter.com/YourProfile" target="_blank" rel="noopener" title="Follow us on Twitter" class="me-3">
                    <img src="{{ asset('assets/images/icons/twitter.svg') }}" alt="Twitter" width="24" height="24" />
                </a>
                <a href="https://www.instagram.com/YourProfile" target="_blank" rel="noopener" title="Follow us on Instagram" class="me-3">
                    <img src="{{ asset('assets/images/icons/instagram.svg') }}" alt="Instagram" width="24" height="24" />
                </a>
                <a href="https://www.linkedin.com/company/YourCompany" target="_blank" rel="noopener" title="Connect with us on LinkedIn" class="me-3">
                    <img src="{{ asset('assets/images/icons/linkedin.svg') }}" alt="LinkedIn" width="24" height="24" />
                </a>
                <a href="https://www.linkedin.com/company/YourCompany" target="_blank" rel="noopener" title="Connect with us on LinkedIn" class="me-3">
                    <img src="{{ asset('assets/images/icons/whatsapp.svg') }}" alt="LinkedIn" width="24" height="24" />
                </a>
            </div>

            <div class="flex justify-center py-2">
                <a href="https://technologies.ae" target="_blank">
                    <img src="{{ asset('assets/images/footer/powered-by.png') }}" alt="Technologies" />
                </a>
            </div>

        </div>
        <div class="col-md-4 d-flex align-items-end flex-column">
            <div class="scrolltop d-flex justify-between align-items-center px-5">
                <p class="font-4 display-18 color-white me-4"> Top </p>
                <a id="scrollToTopButton" href="#" onClick="scrollToTop(); return false;" role="button" aria-label="Scroll to top" style="display: none;">
                    <img src="{{ asset('assets/images/icons/scrolltop.svg') }}" alt="Scroll to top" class="mx-auto" />
                </a>
            </div>
        
        </div>
    </div>
    <div class="spacer py-1"></div>

</footer>
{{-- <footer class="bg-blue text-white py-8 sm:px-6">
    <div class="_footer_wrapper max-width mx-auto px-4 lg:px-12 py-7 flex justify-between items-center">
        <div class="flex items-center space-x-8 _logo_menu">
            <div class="flex justify-center">
                <x-website.application-light-logo class="h-12 w-auto" />
            </div>
            <div class="flex space-x-6 _footer_menu">
                <x-nav-link :href="route('home')" class="font-4 display-14 color-white">Home</x-nav-link>
                <x-nav-link :href="route('tour-guides-profile')" class="font-4 display-14 color-white">Tour Guide Profile</x-nav-link>
                <x-nav-link :href="route('destinations')" class="font-4 display-14 color-white">Attractions</x-nav-link>
                <x-nav-link :href="route('join-us')" class="font-4 display-14 color-white">Join us</x-nav-link>
                <x-nav-link :href="route('get-help')" class="font-4 display-14 color-white">Get Help</x-nav-link>
            </div>
        </div>
        <div class="flex space-x-4 align-items-center _social_links">
            <h3 class="font-4 display-14 color-white m-0">  {{ __('website.LABELS.FOLLOW_US') }}: </h3>
            <a href="https://www.facebook.com/YourPage" target="_blank" rel="noopener" title="Follow us on Facebook">
                <img src="{{ asset('assets/images/icons/facebook.svg') }}" alt="Facebook" width="24" height="24" />
            </a>
            <a href="https://www.twitter.com/YourProfile" target="_blank" rel="noopener" title="Follow us on Twitter">
                <img src="{{ asset('assets/images/icons/twitter.svg') }}" alt="Twitter" width="24" height="24" />
            </a>
            <a href="https://www.instagram.com/YourProfile" target="_blank" rel="noopener" title="Follow us on Instagram">
                <img src="{{ asset('assets/images/icons/instagram.svg') }}" alt="Instagram" width="24" height="24" />
            </a>
            <a href="https://www.linkedin.com/company/YourCompany" target="_blank" rel="noopener" title="Connect with us on LinkedIn">
                <img src="{{ asset('assets/images/icons/linkedin.svg') }}" alt="LinkedIn" width="24" height="24" />
            </a>
            <a href="https://www.linkedin.com/company/YourCompany" target="_blank" rel="noopener" title="Connect with us on LinkedIn">
                <img src="{{ asset('assets/images/icons/whatsapp.svg') }}" alt="LinkedIn" width="24" height="24" />
            </a>
        </div>
    </div>
</footer> --}}

@push('scripts')
    <script>
        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }

        window.addEventListener('scroll', () => {
            const scrollButton = document.querySelector('#scrollToTopButton');
            if (window.scrollY > 300) {
                scrollButton.style.display = 'block';
            } else {
                scrollButton.style.display = 'none';
            }
        });
    </script>

@endpush