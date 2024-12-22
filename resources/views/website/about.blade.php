<style>
   
</style>

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">
@endpush

<x-website-layout>
    @section('title', 'Tour Guide - About Us')
    <div class="container-fluid">
        <div class="row px-5" >
            <div class="banner flex-column p-5" style="background-image: url({{ asset('assets/images/about/about-banner.png') }})">
                <h3 class="font-3 display-36 color-white">“Explore More, Discover Deeper
                   <br/>  Your Journey Begins Here!”</h3>
            </div>
            <div class="text p-5">
                <p class="font-4 display-16 color-black mb-3"> Welcome to TourGuides.me, your premier destination for discovering the rich culture, stunning landscapes, and hidden gems of the United Arab Emirates. Whether you’re visiting for the first time or a seasoned traveler, we are here to provide you with authentic and unforgettable experiences.</p>
                <p class="font-4 display-16 color-black mb-3"> Our platform connects travelers with expert local guides who are passionate about sharing the UAE’s vibrant history, modern marvels, and breathtaking natural beauty. From the majestic deserts of Abu Dhabi to the towering skyscrapers of Dubai, from the serene beaches of Fujairah to the cultural treasures of Sharjah, we offer curated tours that showcase the very best the UAE has to offer. </p>
                <p class="font-4 display-16 color-black mb-3"> At TourGuides.me, we believe in providing more than just sightseeing. We create personalized journeys that allow you to immerse yourself in the traditions, flavors, and stories that make the UAE unique. Our guides are knowledgeable locals who bring every destination to life with fascinating insights and a deep love for their homeland. </p>
                <p class="font-4 display-16 color-black mb-3"> With years of experience, our team is dedicated to ensuring that your visit to the UAE is seamless, enjoyable, and full of adventure. Whether you’re seeking luxury, adventure, history, or relaxation, we have a tour for you. </p>
                <p class="font-4 display-16 color-black mb-3">  Let us take you beyond the typical tourist paths and help you explore the true essence of the UAE. Join us on a journey that will leave you with cherished memories and a deeper appreciation for this dynamic and diverse country. </p>
            </div>
        </div>
    </div>

    <x-website.footer.footer-section>
        <x-home.discovering-regions />
    </x-website.footer.footer-section>
</x-website-layout>
