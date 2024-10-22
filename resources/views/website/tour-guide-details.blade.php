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
        ],
    ];



    $sliderOptions = [
        'dots' => false,
        'infinite' => true,
        'autoplay' => true,
        'arrows' => false,
        'centerMode' => false,
        'centerPadding' => '0px',
        'autoplaySpeed' => 3000,
        'slidesToShow' => 3,
        'slidesToScroll' => 1,
        'responsive' => [
            ['breakpoint' => 1024, 'settings' => ['slidesToShow' => 2, 'slidesToScroll' => 2]],
            ['breakpoint' => 768, 'settings' => ['slidesToShow' => 1, 'slidesToScroll' => 1]],
            ['breakpoint' => 480, 'settings' => ['slidesToShow' => 1, 'slidesToScroll' => 1]],
        ]
    ];

@endphp

@push('css')
    <link href="{{ asset('css/flatpickr.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">

    <style>
        .slick-prev,
        .slick-next {
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
                    <div class="row py-3 tour-guide-details pt-5"
                        style="background-image: url({{ asset('assets/images/homepage/blue-bar-background.png') }});">
                        <div class="col-md-8  d-flex justify-content-start align-items-end flex-wrap pt-3">
                            <div class="profile-iamge me-4">
                                <img src="{{ $tourGuide->image }}" alt="{{ $tourGuide->name }}" />
                            </div>
                            <div class="detials">
                                <h3 class="font-2 display-20 color-blue pt-3"> {{ $tourGuide->name }} </h3>
                                <p class="font-4 display-20 color-blue"> Specialized in tourist guides </p>
                                <div class="button d-flex justify-content-start align-items-center flex-wrap pt-3">
                                    @if ($tourGuide->description?->isCertified)
                                        <a href="#"
                                            class="font-4 display-16 bg-light-blue color-blue color-primary d-flex justify-content-start 
                                    align-items-center text-decoration-none me-3 px-3 py-2 rounded">
                                            <img src="{{ asset('assets/images/tour-guide/certified.svg') }}"
                                                alt="mohammad" class="me-3" />
                                            Certified
                                        </a>
                                    @endif
                                    @if ($tourGuide->description?->highRatings)
                                        <a href="#"
                                            class="bg-green color-lavender font-4 display-16 d-flex justify-content-start align-items-center 
                                        text-decoration-none me-3 px-3 py-2 rounded">
                                            <img src="{{ asset('assets/images/tour-guide/high-rates.svg') }}"
                                                alt="mohammad" class="me-3" />
                                            High Ratings
                                        </a>
                                    @endif
                                    @if ($tourGuide->description?->responsiveGuide)
                                        <a href="#"
                                            class="bg-pink color-pink font-4 display-16  d-flex justify-content-start align-items-center text-decoration-none me-3
                                     px-3 py-2 rounded">
                                            <img src="{{ asset('assets/images/tour-guide/responsive-tour-guide.svg') }}"
                                                alt="mohammad" class="me-3" />
                                            Responsive Tourist Guide
                                        </a>
                                    @endif

                                </div>
                            </div>
                        </div>
                        <div
                            class="col-md-4 d-flex justify-content-between align-items-center flex-column banner-right-column">
                            <h2 class="color-white font-2 display-20"> TruTour guide </h2>
                            <div class="buttons d-flex justify-content-start align-items-center flex-wrap">
                                <a href="#"
                                    class="font-4 display-16  bg-light-blue color-blue color-primary d-flex justify-content-start align-items-center 
                                text-decoration-none me-3 px-3 py-2 rounded">
                                    <img src="{{ asset('assets/images/tour-guide/share.svg') }}" alt="mohammad"
                                        class="me-3" />
                                    Share Profile
                                </a>
                                <a href="tel:{{ $tourGuide->contact }}"
                                    class="font-4 display-16  bg-light-blue color-blue color-primary d-flex justify-content-start align-items-center 
                                text-decoration-none me-3 px-3 py-2 rounded">
                                    <img src="{{ asset('assets/images/tour-guide/call.svg') }}" alt="mohammad"
                                        class="me-3" />
                                    Call
                                </a>
                                <a href="mailto:{{ $tourGuide->email }}"
                                    class="font-4 display-16  bg-light-blue color-blue color-primary d-flex justify-content-start align-items-center 
                                text-decoration-none me-3 px-3 py-2 rounded">
                                    <img src="{{ asset('assets/images/tour-guide/email.svg') }}" alt="mohammad"
                                        class="me-3" />
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
                            <img src="{{ asset('assets/images/tour-guide/ref-number.svg') }}" alt="mohammad"
                                class="me-3" />
                            <h3 class="me-3 font-2 display-16 color-blue mb-0"> Reference Number : </h3>
                            <span class="font-5 display-16 color-black"> TG - 00{{ $tourGuide->id }} </span>
                        </div>

                        <div class="_ref_number d-flex justify-content-start align-items-center flex-wrap me-5 my-3">
                            <img src="{{ asset('assets/images/tour-guide/clock.svg') }}" alt="mohammad"
                                class="me-3" />
                            <h3 class="me-3 font-2 display-16 color-blue mb-0"> Start time: </h3>
                            <span class="font-5 display-16 color-black"> {{ $tourGuide->created_at->format('Y') }}
                            </span>
                        </div>

                        <div class="_ref_number d-flex justify-content-start align-items-center flex-wrap me-5 my-3">
                            <img src="{{ asset('assets/images/tour-guide/language.svg') }}" alt="mohammad"
                                class="me-3" />
                            <h3 class="me-3 font-2 display-16 color-blue mb-0">Languages: </h3>
                            @if ($tourGuide->guideLanguages)
                                @forelse($tourGuide->guideLanguages as  $language)
                                    <span class="font-5 display-16 color-black"> {{ $language->name }} </span>
                                @empty
                                @endforelse
                            @endif
                        </div>
                    </div>

                    <div class="_more d-flex justify-content-start align-items-center  flex-wrap">

                        <div class="_ref_number d-flex justify-content-start align-items-center flex-wrap me-5 my-3">
                            <img src="{{ asset('assets/images/tour-guide/map-active.svg') }}" alt="mohammad"
                                class="me-3" />
                            <h3 class="me-3 font-2 display-16 color-blue mb-0"> Private Tour Guide in : </h3>

                            @if ($tourGuide->privateDestinations)
                                @forelse($tourGuide->privateDestinations as  $privateDestination)
                                    <span class="font-5 display-16 color-black"> {{ $privateDestination->name }}
                                        @if (!$loop->last)
                                            <span> , </span>
                                        @endif
                                    </span>
                                @empty
                                @endforelse
                            @endif


                        </div>

                        <div class="_ref_number d-flex justify-content-start align-items-center flex-wrap me-5 my-3">
                            <img src="{{ asset('assets/images/tour-guide/map-active.svg') }}" alt="mohammad"
                                class="me-3" />
                            <h3 class="me-3 font-2 display-16 color-blue mb-0"> Other Guiding Areas: </h3>


                            @if ($tourGuide->otherDestinations)
                                @forelse($tourGuide->otherDestinations as  $privateDestination)
                                    <span class="font-5 display-16 color-black"> {{ $privateDestination->name }}
                                        @if (!$loop->last)
                                            <span> , </span>
                                        @endif
                                    </span>
                                @empty
                                @endforelse
                            @endif
                        </div>

                    </div>

                    <div class="_more my-3">
                        <p class="font-4 display-16 color-black">
                            {!! $tourGuide->description?->description !!}
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="_about_me_text  py-3">
                        <h3 class="font-2 display-20 color-blue"> Top Activities</h3>
                        <hr />
                    </div>
                    <div class="items d-flex justify-content-between align-items-center flex-wrap">

                        @if ($tourGuide->activities)
                            @forelse($tourGuide->activities as  $activity)
                                <div class="item">
                                    <div class="_icon text-cetner p-3">
                                        <img src="{{ $activity->image }}" alt="{{ $activity->title }}"
                                            class="mx-auto" />
                                    </div>
                                    <div class="title pt-3 font-4 display-16 color-blue text-center">
                                        {{ $activity->title }}
                                    </div>
                                </div>
                            @empty
                            @endforelse
                        @endif
                    </div>
                </div>
                <div class="row pt-3">
                    <x-tour-guide.top-destination-list :data="$tourGuide->privateDestinations" :options="$sliderOptions" class="w-auto" />
                </div>
                <div class="row">
                    <x-tour-guide.recent-reviews :data="$topDestinations" :options="$sliderOptions" class="w-auto" />
                </div>
            </div>
            <div class="col-md-3">
                <div class="_sidebar p-4">
                    <div class="d-flex justify-content-start align-items-center">
                        <div class="profile-rounded">
                            <img src="{{ $tourGuide->image }}" alt="{{ $tourGuide->name }}" class="me-3" />
                        </div>
                        <div class="title">
                            <h3 class="font-2 display-20"> {{ $tourGuide->name }} </h3>
                            <div class="reviews d-flex justify-content-start align-items-center">
                                <img src="{{ asset('assets/images/icons/stars.svg') }}" alt="Arrow right"
                                    class="me-3" />
                                <p class="fotn-4 display-12 m-0"> 5.0 / 5 <span class="color-blue"> (2 reviews)
                                    </span> </p>
                            </div>
                        </div>
                    </div>
                    <hr />
                    <div class="wrapper">
                        @include('partial.errors')
                        @include('partial.successMessage')
                        <form action="{{ route('store.package.booking') }}" method="get">
                            @csrf
                            <div class="form-group my-3">
                                <label for="place_id"> Select Place</label>
                                <select name="place_id"  class="form-control w-full p-2 rounded-md border border-gray-300">
                                    <option value="" class="font-5 displaty-14 color-blue"> Select Places
                                    </option>
                                    @foreach ($places as $place)
                                        <option value="{{ $place->id }}">{{ $place->name }}</option>
                                    @endforeach
                                </select>
                                </select>
                            </div>

                            <div class="form-group my-3">
                                <label for="date">Select a date</label>
                                <input type="text" name="date" id="date" class="form-control"
                                    value="{{ old('date') }}">
                            </div>

                            <div class="form-group my-3">
                                <label for="no_of_adults"> Select No of Adults </label>
                                <select name="no_of_adults" class="w-full p-2 rounded-md border border-gray-300">
                                    <option value="0" class="font-5 displaty-14 color-blue">Adults</option>
                                    <option value="1" class="font-5 displaty-14 color-blue">1</option>
                                    <option value="2" class="font-5 displaty-14 color-blue">2</option>
                                    <option value="3" class="font-5 displaty-14 color-blue">3</option>
                                    <option value="4" class="font-5 displaty-14 color-blue">4</option>
                                    <option value="5" class="font-5 displaty-14 color-blue">5</option>
                                </select>
                            </div>

                            <div class="form-group my-3">
                                <label for="day"> No of days </label>
                                <input type="text" name="day" id="day" class="form-control"
                                    value="{{ old('day') }}">
                            </div>
                            <input type="hidden" name="guide" value="{{ $tourGuide->id }}">
                            <input type="hidden" name="price" value="{{ $tourGuide->price }}">
                            <hr />
                            <div class="notification d-flex justify-content-center align-items-center my-3">
                                <img src="{{ asset('assets/images/tour-guide/notification.svg') }}"
                                    alt="{{ $tourGuide->name }}" class="me-3" />
                                <span class="color-red font-3 display-16"> {{ \Carbon\Carbon::now()->format('F') }} :
                                    Only
                                    {{ $tourGuide->description?->no_of_slots ?? 0 }} slots left! </span>
                            </div>

                            @auth
                                @if($tourGuide?->description?->id > 0)
                                    <div class="form-group my-3">
                                        <button type="submit"
                                            class="btn btn-lg bg-blue color-white w-100 my-2 font-2 display-16"> Book Now
                                        </button>
                                    </div>
                                @endif
                            @else
                                <button class="btn btn-lg bg-blue color-black border w-100 my-2 font-2 display-16" disabled
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Please login to book the trip">
                                    Login for booking !
                                </button>
                            @endauth

                        </form>
                    </div>
                    <hr />
                    <div class="wrapper d-flex justify-content-start align-items-center py-2">
                        <div class="icon me-2">
                            <img src="{{ asset('assets/images/menu/destinations.svg') }}" alt="destinations"
                                class="me-3" />
                        </div>
                        <div class="title">
                            <h4 class=" font-2 display-16"> Living At </h4>
                            <p class="font-4 display-16"> {{ $tourGuide->address }} </p>
                        </div>
                    </div>
                    <hr />
                    <div class="wrapper d-flex justify-content-start align-items-center py-2">
                        <div class="icon me-2">
                            <img src="{{ asset('assets/images/icons/language.svg') }}" alt="languages"
                                class="me-3" />
                        </div>
                        <div class="title">
                            <h4 class=" font-2 display-16"> Languages </h4>
                            @if ($tourGuide->guideLanguages)
                                @forelse($tourGuide->guideLanguages as  $language)
                                    <p class="font-4 display-16"> {{ $language->name }} </p>
                                @empty
                                @endforelse
                            @endif
                        </div>
                    </div>
                    <hr />
                    <div class="wrapper d-flex justify-content-start align-items-center  py-2">
                        <div class="icon me-2">
                            <img src="{{ asset('assets/images/tour-guide/response-time.svg') }}" alt="response time"
                                class="me-3" />
                        </div>
                        <div class="title">
                            <h4 class=" font-2 display-16"> Response Time </h4>
                            <p class="font-4 display-16"> {{ $tourGuide->description?->response_time }} Hours on
                                average </p>
                        </div>
                    </div>
                    <hr />

                    <div class="wrapper d-flex justify-content-start align-items-center  py-2">
                        <div class="icon me-2">
                            <img src="{{ asset('assets/images/tour-guide/calendar.svg') }}" alt="calendar"
                                class="me-3" />
                        </div>
                        <div class="title">
                            <h4 class=" font-2 display-16">Availability Updated </h4>
                            <p class="font-4 display-16"> - </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="{{ asset('js/flatpickr.js') }}"></script>
        <script>
            flatpickr('#date', {
                minDate: "today",
                dateFormat: "F d, Y",
            })
        </script>
    @endpush

</x-website-layout>
