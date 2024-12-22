@php 
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
         
        ._about_destination ._plan_list {
            list-style: disc;
        }
        ._about_destination ._plan_list li {
            position: relative;
        }

        ._about_destination ._plan_list li:before {
            content: ' ';
            border-left: 2px solid var(--color-primary);
            position: absolute;
            left: -16px;
            top: 20px;
            width: 2px;
            height: 86px;
        }


    </style>
@endpush

<x-website-layout>
    @section('title', 'Tour Guide - Destination Detail')
    <div class="mx-auto">
        <div class="row px-5 ">
            <div class="col-md-9 _about_destination pe-4">
                
                <div class="row d-flex justify-content-between align-items-center">
                    <div class="col-md-10 breadcrums border-bottom pb-3">
                        <p class="font-4 display-12 color-primary" >
                           <span class="_breadcrum border-bottom-2"> Tour guide profile </span> >  Mohammed Othman > Love Lake Dubai 
                        </p> 
                    </div>
                    <div class="col-md-2 actions d-flex  justify-content-end align-items-center">
                        <button class="share-button" data-id="1"> 
                            <img src="{{ asset('assets/images/icons/share.svg') }}" alt="share" />
                        </button>
                        <img src="{{ asset('assets/images/icons/like-button.svg') }}" alt="like" class="ms-2"/>
                    </div>
                </div>
                <div class="spacer m-4"></div>
                <div class="row">
                    <div class="col-md-12">
                        <img src="{{ asset('assets/images/destinations/destination-detail.png') }}" alt="Love Lake Dubai" class="w-100" />
                    </div>
                </div>
                <div class="spacer m-4"></div>
                <div class="row">
                    <div class="col-md-12 d-flex justify-content-between align-items-cetner">
                        <p class="font-2 display-16 color-blue"> Love Lake Dubai </p>
                        <p class="d-flex justify-content-start align-items-center font-2 display-16 color-blue">                             
                            <img src="{{ asset('assets/images/icons/money.svg') }}" alt="like" class="ms-2"/>
                            50AED <span class="font-5 display-12 ps-2"> per hour </span> 
                        </p>
                    </div>
                </div>
                <div class="spacer m-4"></div>
                <div class="_about_me_text">
                    <h3 class="font-2 display-20 color-blue">Basic information </h3>
                    <hr />
                    <div class="_more d-flex justify-content-start align-items-center  flex-wrap">

                        <div class="_ref_number d-flex justify-content-start align-items-center flex-wrap me-5 my-3">
                            <img src="{{ asset('assets/images/icons/location.svg') }}" alt="mohammad"
                                class="me-3" />
                            <span class="font-5 display-16 color-black"> Dubai </span>
                        </div>

                        <div class="_ref_number d-flex justify-content-start align-items-center flex-wrap me-5 my-3">
                            <img src="{{ asset('assets/images/icons/people.svg') }}" alt="mohammad"
                                class="me-3" />
                            <span class="font-5 display-16 color-black"> Individual </span>
                        </div>

                        <div class="_ref_number d-flex justify-content-start align-items-center flex-wrap me-5 my-3">
                            <img src="{{ asset('assets/images/icons/road.svg') }}" alt="mohammad" class="me-3" />
                            <span class="font-5 display-16 color-black"> Car </span>
                        </div>
                    </div>

                    <div class="_more d-flex justify-content-start align-items-center  flex-wrap">

                        <div class="_ref_number d-flex justify-content-start align-items-center flex-wrap me-5 my-3">
                            <img src="{{ asset('assets/images/icons/receipt.svg') }}" alt="mohammad"
                                class="me-3" />
                            <span class="font-5 display-16 color-black"> Driver•A/C Car•Guest pick-up </span>
                        </div>

                        <div class="_ref_number d-flex justify-content-start align-items-center flex-wrap me-5 my-3">
                            <img src="{{ asset('assets/images/icons/clock.svg') }}" alt="mohammad" class="me-3" />
                            <span class="font-5 display-16 color-black"> 9 hours  | In the morning or evening </span>

                        </div>
                       
                        <div class="_ref_number d-flex justify-content-start align-items-center flex-wrap me-5 my-3">
                            <img src="{{ asset('assets/images/icons/calendar-clock.svg') }}" alt="mohammad" class="me-3" />
                            <span class="font-5 display-16 color-black"> 1 Day </span>
                        </div>

                    </div>

                    <div class="_more my-3">
                        <h3 class="font-2 display-16 color-blue"> What you can expect </h3>
                        <p class="font-4 display-16 color-black">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                        </p>
                    </div>

                </div>
                
                <div class="image">
                    <img src="{{ asset('assets/images/destinations/destinations-detail-1.png') }}" alt="Love Lake Dubai" class="w-100" />
                </div>
                <div class="spacer my-4"></div>
                <div class="_plan">
                    <h3 class="font-2 display-16 color-blue"> This is the plan </h3>
                    <div class="spacer my-4"></div>
                    <ul class="_plan_list">
                        <li>
                            <h3 class="font-2 display-16 color-blue"> This is the plan </h3>
                            <p class="font-4 display-16 color-black">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy 
                                text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                            </p>
                        </li>
                        <div class="spacer my-4"></div>
                        <li>
                            <h3 class="font-2 display-16 color-blue"> This is the plan </h3>
                            <p class="font-4 display-16 color-black">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy 
                                text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                            </p>
                        </li>
                        <div class="spacer my-4"></div>
                        <li>
                            <h3 class="font-2 display-16 color-blue"> This is the plan </h3>
                            <p class="font-4 display-16 color-black">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy 
                                text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                            </p>
                        </li>
                        <div class="spacer my-4"></div>
                        <li>
                            <h3 class="font-2 display-16 color-blue"> This is the plan </h3>
                            <p class="font-4 display-16 color-black">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy 
                                text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                            </p>
                        </li>
                        <div class="spacer my-4"></div>
                        <li>
                            <h3 class="font-2 display-16 color-blue"> This is the plan </h3>
                            <p class="font-4 display-16 color-black">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy 
                                text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                            </p>
                        </li>
                        <div class="spacer my-4"></div>
                        <li>
                            <h3 class="font-2 display-16 color-blue"> This is the plan </h3>
                            <p class="font-4 display-16 color-black">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy 
                                text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                            </p>
                        </li>
                        <div class="spacer my-4"></div>
                        <li>
                            <h3 class="font-2 display-16 color-blue"> This is the plan </h3>
                            <p class="font-4 display-16 color-black">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy 
                                text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                            </p>
                        </li>
                    </ul>
                </div>
                <div class="row pt-3">
                    <x-tour-guide.top-destination-list :data="$places" :options="$sliderOptions" class="w-auto" />
                </div> 
            </div>
            <div class="col-md-3">
                @if($tourGuide)
                <div class="_sidebar">
                    <div class="_card">
                        <div class="_profile_details position-relative">
                            <div class="background-image">
                                <img src="{{ asset('assets/images/homepage/blue-bar-background.png')  }}" class="me-3" />
                            </div>
                            <div class="guide_info d-flex justify-content-between">
                                <div class="profile-rounded">
                                    <img src="{{ $tourGuide->image }}" alt="{{ $tourGuide->name }}" class="me-3" />
                                </div>
                                <div class="title d-flex flex-column justify-content-between align-items-center">
                                    <div class="reviews">
                                        <h3 class="font-2 display-20 color-white"> TruTour guide</h3>
                                        <div class="reviews d-flex justify-content-start align-items-center">
                                            <img src="{{ asset('assets/images/icons/stars-yellow.svg') }}" alt="Stars" class="me-3" />
                                            <p class="fotn-4 display-12 m-0 color-white"> 5.0 / 5 
                                                <span class="color-white"> (2 {{ trans_choice('website.LABELS.REVIEW', 2) }}) </span> </p>
                                        </div>                                    
                                    </div>
                                    <div class="headings">
                                        <h3 class="font-2 display-18"> 
                                            {{ \Illuminate\Support\Str::limit($tourGuide->name, 20, '...') }}
                                        </h3>
                                        <p class="fotn-4 display-12 m-0"> Specialized in tourist guides  </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="spacer py-1 my-5"></div>
                        <div class="contact-buttons px-4">
                            <div class="buttons d-flex justify-content-start align-items-center flex-wrap">
                                <button id="shareButton" data-id="2"
                                    class="share-button font-5 display-14  bg-light-blue color-blue color-primary d-flex justify-content-start align-items-center 
                                    text-decoration-none  px-3  me-2  py-2 rounded">
                                    <img src="{{ asset('assets/images/tour-guide/share.svg') }}" alt="mohammad"
                                        class="me-1" />
                                        {{ __('website.LABELS.SHARE_PROFILE') }}
                                </button>
                                <a href="tel:{{ $tourGuide->contact }}"
                                    class="font-5 display-14  bg-light-blue color-blue color-primary d-flex justify-content-start align-items-center 
                                text-decoration-none  px-3 py-2 me-2 rounded">
                                    <img src="{{ asset('assets/images/tour-guide/call.svg') }}" alt="mohammad"
                                        class="me-1" />
                                        {{ __('website.LABELS.CALL') }}
                                </a>
                                <a href="mailto:{{ $tourGuide->email }}"
                                    class="font-5 display-14  bg-light-blue color-blue color-primary d-flex justify-content-start align-items-center 
                                text-decoration-none my-md-4 px-3  my-lg-0  py-2 rounded">
                                    <img src="{{ asset('assets/images/tour-guide/email.svg') }}" alt="mohammad"
                                        class="me-1" />
                                        {{ __('website.LABELS.EMAIL') }}
                                </a>
                            </div>
    
                            <div class="button d-flex justify-content-start align-items-center flex-wrap pt-3">
                                @if ($tourGuide->description?->isCertified)
                                    <a href="#"
                                        class="font-4 display-12 bg-light-blue color-blue color-primary d-flex justify-content-start 
                                align-items-center text-decoration-none px-2  me-2 py-2 rounded">
                                        <img src="{{ asset('assets/images/tour-guide/certified.svg') }}"
                                            alt="mohammad" class="me-1" />
                                    {{ __('website.LABELS.CERTIFIED') }}
                                    </a>
                                @endif
                                @if ($tourGuide->description?->highRatings)
                                    <a href="#"
                                        class="bg-green color-lavender font-4 display-12 d-flex justify-content-start align-items-center 
                                    text-decoration-none me-2 py-2 px-2 rounded">
                                        <img src="{{ asset('assets/images/tour-guide/high-rates.svg') }}"
                                            alt="mohammad" class="me-1" />
                                            {{ __('website.LABELS.HIGH_RATINGS') }}
                                    </a>
                                @endif
                                @if ($tourGuide->description?->responsiveGuide)
                                    <a href="#"  class="bg-pink color-pink font-4 display-12   d-flex justify-content-start align-items-center text-decoration-none 
                                    me-3 py-2 rounded px-2">
                                        <img src="{{ asset('assets/images/tour-guide/responsive-tour-guide.svg') }}"
                                            alt="mohammad" class="me-1" />
                                            {{ __('website.LABELS.RESPONSIVE_TOURIST_GUIDE') }}
                                    </a>
                                @endif
    
                            </div>
                        </div>
                        <div class="wrapper p-4">
                            @include('partial.errors')
                            @include('partial.successMessage')
                            <form action="{{ route('store.package.booking') }}" method="get">
                                @csrf
                                <div class="form-group my-3">
                                    <select name="place_id"  class="form-control w-full p-2 rounded-md border border-gray-300">
                                        <option value="" class="font-5 displaty-14 color-blue"> {{ __('website.LABELS.SELECT_PLACE') }}
                                        </option>
                                        @foreach ($places as $place)
                                            <option value="{{ $place->id }}">{{ $place->name }}</option>
                                        @endforeach
                                    </select>
                                    </select>
                                </div>
    
                                <div class="form-group my-3">
                                   <input type="text" name="date" placeholder="Date" id="date" class="form-control"
                                        value="{{ old('date') }}">
                                </div>
    
                                <div class="form-group my-3">
                                    <label for="no_of_adults"> {{ __('website.LABELS.SELECT_NO_OF_ADULTS') }} </label>
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
                                    <label for="day"> {{ __('website.LABELS.NO_OF_DAYS') }} </label>
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
                                        {{ __('website.LABELS.ONLY') }}
                                        {{ $tourGuide->description?->no_of_slots ?? 0 }} {{ __('website.LABELS.SLOTS_LEFT') }} </span>
                                </div>
    
                                @auth
                                    @if($tourGuide?->description?->id > 0)
                                        <div class="form-group my-3">
                                            <button type="submit"
                                                class="btn btn-lg bg-blue color-white w-100 my-2 font-2 display-16"> {{ __('website.LABELS.BOOK_NOW') }}
                                            </button>
                                        </div>
                                    @endif
                                @else
                                    <button class="btn btn-lg bg-blue color-black border w-100 my-2 font-2 display-16" disabled
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Please login to book the trip">
                                            {{ __('website.LABELS.LOGIN_FOR_BOOKING') }}
                                    </button>
                                @endauth
    
                            </form>
                        </div>
                    </div>
                    <div class="spacer my-4"></div>
                    <div class="_card">
                        <div class="wrapper d-flex justify-content-start align-items-center py-2 p-4">
                            <div class="title pt-4">
                                <h4 class=" font-2 display-16"> Get to know {{ \Illuminate\Support\Str::before($tourGuide->name, ' ') }}  </h4>
                            </div>
                        </div>
                        <hr />
                        <div class="wrapper d-flex justify-content-start align-items-center py-2 p-4">
                            <div class="icon me-2">
                                <img src="{{ asset('assets/images/menu/destinations.svg') }}" alt="destinations"
                                    class="me-3" />
                            </div>
                            <div class="title">
                                <h4 class=" font-2 display-16">  {{ __('website.LABELS.LIVING_AT') }} </h4>
                                <p class="font-4 display-16"> {{ $tourGuide->address }} </p>
                            </div>
                        </div>
                        <hr />
                        <div class="wrapper d-flex justify-content-start align-items-center py-2 p-4">
                            <div class="icon me-2">
                                <img src="{{ asset('assets/images/icons/language.svg') }}" alt="languages"
                                    class="me-3" />
                            </div>
                            <div class="title">
                                <h4 class=" font-2 display-16"> {{ trans_choice('website.LABELS.LANGUAGE', 2) }} </h4>
                                @if ($tourGuide->guideLanguages)
                                    @forelse($tourGuide->guideLanguages as  $language)
                                        <p class="font-4 display-16"> {{ $language->name }} </p>
                                    @empty
                                    @endforelse
                                @endif
                            </div>
                        </div>
                        <hr />
                        <div class="wrapper d-flex justify-content-start align-items-center  py-2 p-4">
                            <div class="icon me-2">
                                <img src="{{ asset('assets/images/tour-guide/response-time.svg') }}" alt="response time"
                                    class="me-3" />
                            </div>
                            <div class="title">
                                <h4 class=" font-2 display-16"> {{ __('website.LABELS.RESPONSE_TIME') }} </h4>
                                <p class="font-4 display-16"> {{ $tourGuide->description?->response_time }} {{ __('website.LABELS.HOURS_ON_AVERAGE') }}  </p>
                            </div>
                        </div>
                        <hr />
                        <div class="wrapper d-flex justify-content-start align-items-center p-4  py-2">
                            <div class="icon me-2">
                                <img src="{{ asset('assets/images/tour-guide/calendar.svg') }}" alt="calendar"
                                    class="me-3" />
                            </div>
                            <div class="title">
                                <h4 class=" font-2 display-16"> {{ __('website.LABELS.AVAILABILITY_UPDATED') }} </h4>
                                <p class="font-4 display-16"> - </p>
                            </div>
                        </div>
                    </div>
                    <div class="spacer my-4"></div>
                    <div class="_personalized_offer _card bg-gray p-4 d-flex justify-content-center align-items-center flex-column">
                        <div class="_image">
                            <img src="{{ $tourGuide->image }}" alt="{{ $tourGuide->name }}" class="_image_rounded me-3" />
                        </div>
                        <div class="spacer my-4"></div>
                        <div class="_details text-center">
                            <h3 class="font-2 display-18"> 
                                {{ \Illuminate\Support\Str::limit($tourGuide->name, 20, '...') }}
                            </h3>
                            <div class="reviews text-center">
                                <div class="reviews d-flex justify-content-center align-items-center">
                                    <img src="{{ asset('assets/images/icons/stars-yellow.svg') }}" alt="Stars" class="me-3" />
                                    <p class="fotn-4 display-12 m-0 color-primary"> 5.0 / 5 
                                        <span class="color-blue"> (2 {{ trans_choice('website.LABELS.REVIEW', 2) }}) </span> </p>
                                </div>                                    
                            </div>
                            <div class="spacer my-4"></div>
                            <h3 class="font-2 display-18"> 
                                Did you know that I can personalize your experience? 
                            </h3>
                            <div class="spacer my-4"></div>
                            <p class="fotn-4 display-12 ">I’m Ready to be completely customized to your needs. Just let me know your preferences for a private and personalized experience!</p>
                            <div class="spacer my-4"></div>
                            <button class="btn btn-lg bg-orange color-white border w-100 my-2 font-3 display-16">
                                    Request a personalized Offer
                            </button>
                        
                        </div>
                    </div>
                </div>
                @else
                @endif 
            </div>
        </div> 
    </div>  

    <x-website.footer.footer-section>
        <div class="spacer py-5"></div>
        <x-website.recent-reviews-slider />
        <div class="spacer py-5"></div>
        <div class="spacer py-5"></div>
    </x-website.footer.footer-section>

</x-website-layout>
