<footer class="bg-blue text-white py-8 sm:px-6">
    <div class="_footer_wrapper max-width mx-auto px-4 lg:px-12 py-7 flex justify-between items-center">
        <div class="flex items-center space-x-8 _logo_menu">
            <div class="flex justify-center">
                <x-website.application-light-logo class="h-12 w-auto" />
            </div>
            <div class="flex space-x-6 _footer_menu">
                <x-nav-link :href="route('home')" class="font-4 display-14 color-white">Home</x-nav-link>
                <x-nav-link :href="route('book-your-guide')" class="font-4 display-14 color-white">Book your guide</x-nav-link>
                <x-nav-link :href="route('tour-guides-profile')" class="font-4 display-14 color-white">Tour Guide Profile</x-nav-link>
                <x-nav-link :href="route('destinations')" class="font-4 display-14 color-white">Destinations</x-nav-link>
                <x-nav-link :href="route('join-us')" class="font-4 display-14 color-white">Join us</x-nav-link>
                <x-nav-link :href="route('get-help')" class="font-4 display-14 color-white">Get Help</x-nav-link>
                <x-nav-link :href="route('login')" class="font-4 display-14 color-white">Login</x-nav-link>
            </div>
        </div>
        <div class="flex space-x-4 align-items-center _social_links">
            <h3 class="font-4 display-14 color-white m-0"> FOLLOW US: </h3>
            <a href="https://www.facebook.com/YourPage" target="_blank" rel="noopener" title="Follow us on Facebook">
                <img src="{{ asset('/public/assets/images/icons/facebook.svg') }}" alt="Facebook" width="24" height="24" />
            </a>
            <a href="https://www.twitter.com/YourProfile" target="_blank" rel="noopener" title="Follow us on Twitter">
                <img src="{{ asset('/public/assets/images/icons/twitter.svg') }}" alt="Twitter" width="24" height="24" />
            </a>
            <a href="https://www.instagram.com/YourProfile" target="_blank" rel="noopener" title="Follow us on Instagram">
                <img src="{{ asset('/public/assets/images/icons/instagram.svg') }}" alt="Instagram" width="24" height="24" />
            </a>
            <a href="https://www.linkedin.com/company/YourCompany" target="_blank" rel="noopener" title="Connect with us on LinkedIn">
                <img src="{{ asset('/public/assets/images/icons/linkedin.svg') }}" alt="LinkedIn" width="24" height="24" />
            </a>
            <a href="https://www.linkedin.com/company/YourCompany" target="_blank" rel="noopener" title="Connect with us on LinkedIn">
                <img src="{{ asset('/public/assets/images/icons/whatsapp.svg') }}" alt="LinkedIn" width="24" height="24" />
            </a>
        </div>
    </div>
</footer>
