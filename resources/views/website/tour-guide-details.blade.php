@php 
    
    $topDestinations = [
        [
            'image' => asset('assets/images/destinations/love-lake.svg'), 
            'title' => 'love lake',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        ],
        [
            'image' => asset('assets/images/destinations/museum-of-future.svg'), 
            'title' => 'Museum of the future',
           'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        ],
        [
            'image' => asset('assets/images/destinations/burj-khalifa.svg'), 
            'title' => 'Burj Khalifa',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        ],
            [
            'image' => asset('assets/images/destinations/hatta.svg'), 
            'title' => 'Hatta Hub',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        ],
        [
            'image' => asset('assets/images/destinations/burj-al-arab.svg'), 
            'title' => 'Burj Al Arab',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        ]
    ];

   
    $sliderOptions = [
        'dots' => false,
        'infinite' => false,
        'autoplay' => false,
        'arrows' => false,
        'centerMode' => false,
        'centerPadding' => '0px',
        'autoplaySpeed' => 3000,
        'slidesToShow' => 3,
        'slidesToScroll' => 3,
        'responsive' => [
            ['breakpoint' => 1024, 'settings' => ['slidesToShow' => 2, 'slidesToScroll' => 2]],
            ['breakpoint' => 768, 'settings' => ['slidesToShow' => 1, 'slidesToScroll' => 1]],
            ['breakpoint' => 480, 'settings' => ['slidesToShow' => 1, 'slidesToScroll' => 1]],
        ]
    ];

    
@endphp

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">

    <style>
        .slick-prev, .slick-next {
            display: none !important;
         }
    </style>
@endpush

<x-website-layout>
    @section('title', 'Tour Guide - Mohammad')
    <div class="mx-auto">
        <div class="overflow-hidden">
            <div class="text-gray-900">
                <div class="tour-guide-banner px-5">
                    <div class="row py-3 tour-guide-details pt-5" style="background-image: url({{ asset('assets/images/homepage/blue-bar-background.png')}});">
                        <div class="col-md-8  d-flex justify-content-start align-items-end flex-wrap pt-3">
                            <div class="profile-iamge me-4">
                                <img src="{{ asset('assets/images/tour-guide/mohammad.png') }}" alt="mohammad" />
                            </div>
                            <div class="detials">
                                <h3 class="font-2 display-20 color-blue pt-3"> Mohammed Othman </h3>
                                <p class="font-4 display-20 color-blue"> Specialized in tourist guides </p>
                                <div class="button d-flex justify-content-start align-items-center flex-wrap pt-3">
                                    <a href="#" class="font-4 display-16 bg-light-blue color-blue color-primary d-flex justify-content-start 
                                    align-items-center text-decoration-none me-3 px-3 py-2 rounded"> 
                                        <img src="{{ asset('assets/images/tour-guide/certified.svg') }}" alt="mohammad" class="me-3"/>
                                        certified 
                                    </a>
                                    <a href="#" class="bg-green color-lavender font-4 display-16 d-flex justify-content-start align-items-center 
                                        text-decoration-none me-3 px-3 py-2 rounded"> 
                                        <img src="{{ asset('assets/images/tour-guide/high-rates.svg') }}" alt="mohammad" class="me-3"/>
                                        Hight Ratings 
                                    </a>
                                    <a href="#" class="bg-pink color-pink font-4 display-16  d-flex justify-content-start align-items-center text-decoration-none me-3
                                     px-3 py-2 rounded">
                                        <img src="{{ asset('assets/images/tour-guide/responsive-tour-guide.svg') }}" alt="mohammad" class="me-3"/>
                                         Responsive Tourist Guide  
                                    </a>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 d-flex justify-content-between align-items-center flex-column banner-right-column">
                            <h2 class="color-white font-2 display-20"> TruTour guide </h2>
                            <div class="buttons d-flex justify-content-start align-items-center flex-wrap">
                                <a href="#" class="font-4 display-16  bg-light-blue color-blue color-primary d-flex justify-content-start align-items-center 
                                text-decoration-none me-3 px-3 py-2 rounded"> 
                                    <img src="{{ asset('assets/images/tour-guide/share.svg') }}" alt="mohammad" class="me-3"/>
                                    Share Profile
                                </a>
                                <a href="#" class="font-4 display-16  bg-light-blue color-blue color-primary d-flex justify-content-start align-items-center 
                                text-decoration-none me-3 px-3 py-2 rounded"> 
                                    <img src="{{ asset('assets/images/tour-guide/call.svg') }}" alt="mohammad" class="me-3"/>
                                    Call 
                                </a>
                                <a href="#" class="font-4 display-16  bg-light-blue color-blue color-primary d-flex justify-content-start align-items-center 
                                text-decoration-none me-3 px-3 py-2 rounded"> 
                                    <img src="{{ asset('assets/images/tour-guide/email.svg') }}" alt="mohammad" class="me-3"/>
                                    Email 
                                </a>
                            </div>
                        </div>
                    </div>
                    <hr />
                </div>
            </div>
        </div>
        <div class="row px-5">
            <div class="col-md-9 _about_me pe-4">
                <div class="_about_me_text">
                    <h3 class="font-2 display-20 color-blue"> About me </h3>
                    <hr />      
                    <div class="_more d-flex justify-content-start align-items-center  flex-wrap">

                        <div class="_ref_number d-flex justify-content-start align-items-center flex-wrap me-5 my-3">
                            <img src="{{ asset('assets/images/tour-guide/ref-number.svg') }}" alt="mohammad" class="me-3"/>
                            <h3 class="me-3 font-2 display-16 color-blue mb-0"> Reference Number :  </h3>
                            <span class="font-5 display-16 color-black"> 2779687 </span> 
                        </div>
                        
                        <div class="_ref_number d-flex justify-content-start align-items-center flex-wrap me-5 my-3">
                            <img src="{{ asset('assets/images/tour-guide/clock.svg') }}" alt="mohammad" class="me-3"/>
                            <h3 class="me-3 font-2 display-16 color-blue mb-0"> Start time:  </h3>
                            <span class="font-5 display-16 color-black"> 2019 </span> 
                        </div>
                        
                        <div class="_ref_number d-flex justify-content-start align-items-center flex-wrap me-5 my-3">
                            <img src="{{ asset('assets/images/tour-guide/language.svg') }}" alt="mohammad" class="me-3"/>
                            <h3 class="me-3 font-2 display-16 color-blue mb-0">Languages:  </h3>
                            <span class="font-5 display-16 color-black"> Arabic, Indian, Pakistani, English, French </span> 
                        </div>

                    </div>

                    <div class="_more d-flex justify-content-start align-items-center  flex-wrap">
                        
                        <div class="_ref_number d-flex justify-content-start align-items-center flex-wrap me-5 my-3">
                            <img src="{{ asset('assets/images/tour-guide/ref-number.svg') }}" alt="mohammad" class="me-3"/>
                            <h3 class="me-3 font-2 display-16 color-blue mb-0"> Private Tour Guide in :  </h3>
                            <span class="font-5 display-16 color-black"> Dubai , abu Dhabi </span> 
                        </div>
                        
                        <div class="_ref_number d-flex justify-content-start align-items-center flex-wrap me-5 my-3">
                            <img src="{{ asset('assets/images/tour-guide/clock.svg') }}" alt="mohammad" class="me-3"/>
                            <h3 class="me-3 font-2 display-16 color-blue mb-0"> Other Guiding Areas:  </h3>
                            <span class="font-5 display-16 color-black"> hatta , khourfakun   </span> 
                        </div>

                    </div>

                    <div class="_more my-3">
                        <p class="font-4 display-16 color-black">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever 
                            since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
                            It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. 
                            It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop 
                            publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="_about_me_text  py-3">
                        <h3 class="font-2 display-20 color-blue"> Top Activities</h3>
                        <hr />      
                    </div>
                    <div class="items d-flex justify-content-between align-items-center flex-wrap">

                        <div class="item">
                            <div class="_icon text-cetner p-3">
                                <img src="{{ asset('assets/images/tour-guide/kayaking.svg') }}" alt="kayaking" class="mx-auto"/>
                            </div>
                            <div class="title pt-3 font-4 display-16 color-blue text-center">
                                Kayaking
                            </div>
                        </div>

                        <div class="item">
                            <div class="_icon text-cetner p-3">
                                <img src="{{ asset('assets/images/tour-guide/tent.svg') }}" alt="Tent" class="mx-auto"/>
                            </div>
                            <div class="title pt-3 font-4 display-16 color-blue text-center">
                                Tent
                            </div>
                        </div>

                        <div class="item">
                            <div class="_icon text-cetner p-3">
                                <img src="{{ asset('assets/images/tour-guide/ballooning.svg') }}" alt="ballooning" class="mx-auto" />
                            </div>
                            <div class="title pt-3 font-4 display-16 color-blue text-center">
                                Ballooning
                            </div>
                        </div>

                        <div class="item">
                            <div class="_icon text-cetner p-3">
                                <img src="{{ asset('assets/images/tour-guide/sailboat.svg') }}" alt="Sailboat" class="mx-auto"/>
                            </div>
                            <div class="title pt-3 font-4 display-16 color-blue text-center">
                                Sailboat
                            </div>
                        </div>

                        <div class="item">
                            <div class="_icon text-cetner p-3">
                                <img src="{{ asset('assets/images/tour-guide/mountains.svg') }}" alt="Mountain" class="mx-auto"/>
                            </div>
                            <div class="title pt-3 font-4 display-16 color-blue text-center">
                                Mountain
                            </div>
                        </div>

                        <div class="item">
                            <div class="_icon text-cetner p-3">
                                <img src="{{ asset('assets/images/tour-guide/fishing.svg') }}" alt="Fishing" class="mx-auto"/>
                            </div>
                            <div class="title pt-3 font-4 display-16 color-blue text-center">
                                Fishing
                            </div>
                        </div>

                        <div class="item">
                            <div class="_icon text-cetner p-3">
                                <img src="{{ asset('assets/images/tour-guide/hunting.svg') }}" alt="Hunting" class="mx-auto"/>
                            </div>
                            <div class="title pt-3 font-4 display-16 color-blue text-center">
                                Hunting
                            </div>
                        </div>

                        <div class="item">
                            <div class="_icon text-cetner p-3">
                                <img src="{{ asset('assets/images/tour-guide/fishing.svg') }}" alt="Fishing" class="mx-auto"/>
                            </div>
                            <div class="title pt-3 font-4 display-16 color-blue text-center">
                                Fishing
                            </div>
                        </div>


                        <div class="item">
                            <div class="_icon text-cetner p-3">
                                <img src="{{ asset('assets/images/tour-guide/hunting.svg') }}" alt="Hunting" class="mx-auto"/>
                            </div>
                            <div class="title pt-3 font-4 display-16 color-blue text-center">
                                Hunting
                            </div>
                        </div>


                    </div>
                </div>
                <div class="row pt-3">
                    <x-tour-guide.top-destination-list :data="$topDestinations" :options="$sliderOptions" class="w-auto" />
                </div>
                <div class="row">
                    <x-tour-guide.recent-reviews :data="$topDestinations" :options="$sliderOptions" class="w-auto" />
                </div>
            </div>
            <div class="col-md-3">
                <div class="_sidebar p-4">
                    <div class="d-flex justify-content-start align-items-center">
                        <div class="profile-rounded">
                            <img src="{{ asset('assets/images/tour-guide/mohammad-rounded.svg') }}" alt="mohammad" class="me-3"/>
                        </div>
                        <div class="title">
                            <h3 class="font-2 display-20"> Mohammed Othman </h3>
                            <div class="reviews d-flex justify-content-start align-items-center">
                                <img src="{{ asset('assets/images/icons/stars.svg') }}" alt="Arrow right" class="me-3"/>
                                <p class="fotn-4 display-12 m-0"> 5.0 / 5  <span class="color-blue"> (2 reviews) </span> </p>
                            </div>
                        </div>
                    </div>
                    <hr/>
                    <div class="wrapper">
                         <div>
                            <select name="type_of_places" class="w-full p-2 rounded-md border border-gray-300">
                                <option value="" class="font-5 displaty-14 color-blue">Type of Places</option>
                                <option value="beach" class="font-5 displaty-14 color-blue">Beach</option>
                                <option value="mountain" class="font-5 displaty-14 color-blue">Mountain</option>
                                <option value="city" class="font-5 displaty-14 color-blue">City</option>
                            </select>
                        </div>
                        <div class="my-3">
                            <input type="date" name="start_date" required class="w-full p-2 rounded-md border border-gray-300">
                        </div>
                        <div>
                            <select name="type_of_places" class="w-full p-2 rounded-md border border-gray-300">
                                <option value="" class="font-5 displaty-14 color-blue">Adults</option>
                                <option value="beach" class="font-5 displaty-14 color-blue">1</option>
                                <option value="mountain" class="font-5 displaty-14 color-blue">2</option>
                                <option value="city" class="font-5 displaty-14 color-blue">3</option>
                                <option value="city" class="font-5 displaty-14 color-blue">4</option>
                                <option value="city" class="font-5 displaty-14 color-blue">5</option>
                            </select>
                        </div>
                        <hr />
                        <div class="notification d-flex justify-content-center align-items-center">
                            <img src="{{ asset('assets/images/tour-guide/notification.svg') }}" alt="mohammad" class="me-3"/>
                            <span class="color-red font-3 display-16"> September: Only 13 slots left! </span>
                        </div>
                        <button class="btn btn-lg bg-blue color-white w-100 my-2 font-2 display-16"> Book  Now </button>
                    </div>
                    <hr/>                    
                    <div class="wrapper d-flex justify-content-start align-items-center py-2">
                        <div class="icon me-2">
                            <img src="{{ asset('assets/images/menu/destinations.svg') }}" alt="mohammad" class="me-3"/>
                        </div>
                        <div class="title">
                           <h4 class=" font-2 display-16"> Available Areas </h4>
                           <p class="font-4 display-16"> Dubai (Living) , Hatta  </p> 
                        </div>
                    </div>
                    <hr/>
                    <div class="wrapper d-flex justify-content-start align-items-center py-2">
                        <div class="icon me-2">
                            <img src="{{ asset('assets/images/icons/language.svg') }}" alt="mohammad" class="me-3"/>
                        </div>
                        <div class="title">
                           <h4 class=" font-2 display-16"> Languages </h4>
                           <p class="font-4 display-16"> English , arabic (Native)  </p> 
                        </div>
                    </div>
                    <hr/>
                    <div class="wrapper d-flex justify-content-start align-items-center  py-2">
                        <div class="icon me-2">
                            <img src="{{ asset('assets/images/tour-guide/response-time.svg') }}" alt="mohammad" class="me-3"/>
                        </div>
                        <div class="title">
                           <h4 class=" font-2 display-16"> Response Time  </h4>
                           <p class="font-4 display-16"> 7 Hours on average  </p> 
                        </div>
                    </div>
                    <hr/>

                    <div class="wrapper d-flex justify-content-start align-items-center  py-2">
                        <div class="icon me-2">
                            <img src="{{ asset('assets/images/tour-guide/calendar.svg') }}" alt="mohammad" class="me-3"/>
                        </div>
                        <div class="title">
                           <h4 class=" font-2 display-16">Availability Updated </h4>
                           <p class="font-4 display-16">  - </p> 
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</x-website-layout>
