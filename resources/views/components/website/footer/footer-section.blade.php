<div class="_footer px-5" style="background-image: url('{{ asset('assets/images/footer/' . ($image ?? 'background.png')) }}')">
    <div class="spacer py-4"></div>
    {!! $slot !!}
    <div class="spacer py-5"></div>
    <div class="row">
        <div class="col-md-4 col-lg-3">
        </div>
        <div class="col-md-4 col-lg-6 d-md-flex justify-content-end align-items-center flex-column">
            
            <div class="flex-md justify-center">
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

            <div class="social-links d-md-flex justify-content-center align-items-center py-2">
                <h3 class="font-4 display-14 color-white me-3">  {{ __('website.LABELS.LETSCONNECT') }}: </h3>
                <a href="https://www.facebook.com/YourPage" target="_blank" rel="noopener" title="Follow us on Facebook" class="float-start me-3">
                    <img src="{{ asset('assets/images/icons/facebook.svg') }}" alt="Facebook" width="24" height="24" />
                </a>
                <a href="https://www.twitter.com/YourProfile" target="_blank" rel="noopener" title="Follow us on Twitter" class="float-start me-3">
                    <img src="{{ asset('assets/images/icons/twitter.svg') }}" alt="Twitter" width="24" height="24" />
                </a>
                <a href="https://www.instagram.com/YourProfile" target="_blank" rel="noopener" title="Follow us on Instagram" class="float-start me-3">
                    <img src="{{ asset('assets/images/icons/instagram.svg') }}" alt="Instagram" width="24" height="24" />
                </a>
                <a href="https://www.linkedin.com/company/YourCompany" target="_blank" rel="noopener" title="Connect with us on LinkedIn" class="float-start me-3">
                    <img src="{{ asset('assets/images/icons/linkedin.svg') }}" alt="LinkedIn" width="24" height="24" />
                </a>
                <a href="https://www.linkedin.com/company/YourCompany" target="_blank" rel="noopener" title="Connect with us on LinkedIn" class="float-start me-3">
                    <img src="{{ asset('assets/images/icons/whatsapp.svg') }}" alt="LinkedIn" width="24" height="24" />
                </a>
            </div>
            <div class="spacer py-6 py-md-0"></div>
            <div class="flex-md justify-center py-2">
                <a href="https://technologies.ae" target="_blank">
                    <img src="{{ asset('assets/images/footer/powered-by.png') }}" alt="Technologies" />
                </a>
            </div>

        </div>
        <div class="col-md-4 col-lg-3 d-flex align-items-end flex-column">
            <div class="scrolltop d-flex justify-between align-items-center px-md-5">
                <p class="font-4 display-18 color-white me-4"> Top </p>
                <a id="scrollToTopButton" href="#" onClick="scrollToTop(); return false;" role="button" aria-label="Scroll to top" style="display: none;">
                    <img src="{{ asset('assets/images/icons/scrolltop.svg') }}" alt="Scroll to top" class="mx-auto" />
                </a>
            </div>
        
        </div>
    </div>
    <div class="spacer py-1"></div>
</div>