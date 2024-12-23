<x-website-layout>
    @section('title', 'Tour Guide - Join us')
    <x-website.footer.footer-section>
        <div class="container-fluid">
            <div class="row px-md-5 d-flex justify-content-center align-items-center">
                <div class="banner flex-column p-5" style="background-image: url({{ asset('assets/images/join-us/banner.png') }})">
                    <h3 class="font-3 display-36 color-white">“Explore More, Discover Deeper
                       <br/>  Your Journey Begins Here!”</h3>
                </div>
                <div class="spacer m-5"></div>
                <div class="row">
                    <div class="col-md-2">
                        <img src="{{ asset('assets/images/logo/etga-logo.svg') }}" alt="etga logo"  class="logo" />
                    </div>  
                    <div class="spacer my-3 my-md-0"></div>
                    <div class="col-md-7 mt-5">
                        <p class="font-4 display-16 color-black mb-3 pe-md-5"> 
                            As Abu Dhabi is the capital of the UAE, it’s loaded with thousands of incredible-looking scenes, advanced technology features, and thousands of breathtaking activities. It’s one of the most visited and admired places in the country as it boasts the rich culture and history of the UAE. At the same time, it’s home to many artistic and cultural sites. Every single detail about this area is remarkably on point. 
                        </p>
                    </div>
                    <div class="col-md-3 mt-5">
                        <img src="{{ asset('assets/images/join-us/register-now.svg') }}" alt="etga logo"  class="logo" />
                    </div>
                </div>
            </div>
        </div>
        <div class="spacer py-5"></div>
        <div class="spacer py-5"></div>
        <div class="spacer py-5"></div>
      </x-website.footer.footer-section>
</x-website-layout>
