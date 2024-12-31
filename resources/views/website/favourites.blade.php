
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/css/tour-guide.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/banner.css') }}">
@endpush

<x-website-layout>
    @section('title', 'Tour Guide - Favourites')
    <x-website.footer.footer-section :image="'favourties.svg'">
        <div class="row px-md-2 _popular_destinations">
            <div class="col-md-12"> 
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                      <button class="nav-link active" id="nav-destinations-tab" data-bs-toggle="tab" data-bs-target="#nav-destinations" type="button" role="tab" 
                              aria-controls="nav-destinations" aria-selected="true"> Destinations  </button>
                      <button class="nav-link" id="nav-tour-guide-tab" data-bs-toggle="tab" data-bs-target="#nav-tour-guide" type="button" role="tab" 
                                aria-controls="nav-tour-guide" aria-selected="false"> Tour guide  </button>
                      <button class="nav-link" id="nav-trips-tab" data-bs-toggle="tab" data-bs-target="#nav-trips" type="button" role="tab" 
                                aria-controls="nav-trips" aria-selected="false"> Trips </button>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-destinations" role="tabpanel" aria-labelledby="nav-destinations-tab">
                    <div class="spacer py-4"></div>
                    <div class="row">
                        @forelse ($favouritePlaces as $favouritePlace)
                            <div class="col-md-3 mb-5 ">
                                <a href="{{ route('show.destination', $favouritePlace->place->id) }}">
                                    <div class="place image">
                                        <img src="{{ $favouritePlace->place->image }}" alt="{{ $favouritePlace->place->name }}" class="_place_image" />
                                        <a href="javascript:void(0);" class="toggle-favorite"
                                                data-place-id="{{$favouritePlace->place->id }}">
                                                @if ($favouritePlace->place->is_favorite)
                                                    <img src="{{ asset('assets/images/icons/favourites.svg') }}"
                                                        alt="like-dislike" class="_like_dislike" />
                                                @else
                                                    <img src="{{ asset('assets/images/icons/favourites-gray.svg') }}"
                                                        alt="like-dislike" class="_like_dislike" />
                                                @endif
                                        </a> 
                                        <div class="spacer my-3"></div>
                                        <h3 class="font-2 display-20 {{ $loop->first ? '' :  'ps-md-4'}}"> {{ $favouritePlace->place->name }} </h3>
                                        <p class="{{ $loop->first ? '' :  'ps-md-4'}}"> {{ $favouritePlace->place?->district?->name }} </p>
                                    </div>
                                </a>
                            </div>
                        @empty
                            @if(Auth::check())
                                @if(Auth::user()->role === 'tourist') 
                                    <p>Welcome to the tourist page!</p>
                                @else
                                    <p>There is no data to show. This page is only for tourist accounts.</p>
                                @endif
                            @else
                                <p>There is no data to show. please login to view Data!</p>
                            @endif
                         @endforelse
                    </div>
                </div>
                <div class="tab-pane fade _tour_guide" id="nav-tour-guide" role="tabpanel" aria-labelledby="nav-tour-guide-tab">
                    <div class="spacer py-4"></div>
                    <div class="row slick-slide">
                        @forelse($favouriteGuides as $favouriteGuides)
                            @php
                                $currentCurrency = session('currency', config('currency.default'));
                                $priceInCurrency = \App\Helpers\CurrencyHelper::convert($favouriteGuides->guide->price, $currentCurrency);
                            @endphp
                            <div class="col-xl-3 col-lg-4 mb-5 tourguide-grid">
                                    <div class="_wrapper position-relative">
                                        <div class="image">
                                            <img src="{{ $favouriteGuides->guide->image }}" alt="tour guide" width="100%" />
                                        </div>
                                        <button href="javascript:void(0);" class="toggle-favorite"
                                            data-guide-id="{{ $favouriteGuides->guide->id }}">
                                                <img src="{{ asset('assets/images/icons/favourites.svg') }}" alt="like-dislike"
                                                    class="_like_dislike" />
                                        </button>
                                        <div class="title">
                                            <h3 class="">
                                                {{ substr($favouriteGuides->guide->name, 0, 15) }}
                                            </h3>
                                        </div>
                                        <div class="overlay">
                                            <div class="_content">
                                                <h3 class="color-white">
                                                    {{ substr($favouriteGuides->guide->name, 0, 15) }}
                                                </h3>
                                                <p class="font-4 display-14 color-white">
                                                    {{ trans_choice('website.LABELS.EMIRATE', 1) }} : {{ $favouriteGuides->guide->address }}
                                                </p>
                                                <p class="font-4 display-14 color-white">
                                                    {{ trans_choice('website.LABELS.LANGUAGE', 2) }}:
                                                    @if ($favouriteGuides->guide->guideLanguages)
                                                        @php
                                                            $languages = $favouriteGuides->guide->guideLanguages;
                                                            $extraLanguagesCount = $languages->count() - 1;
                                                        @endphp
                                                        @foreach ($languages->take(1) as $language)
                                                            <span>{{ $language->name }}</span>
                                                        @endforeach
        
                                                        @if ($extraLanguagesCount > 1)
                                                            <span>+{{ $extraLanguagesCount }}
                                                                {{ trans_choice('website.LABELS.LANGUAGE', 2) }} </span>
                                                        @endif
                                                    @endif
                                                </p>
                                                <img src="{{ asset('assets/images/icons/stars.svg') }}" alt="Arrow right"
                                                    class="text-cetner mx-auto pt-2" />
                                            </div>
        
                                            <div class="buttons">
                                                <div class="_button">
                                                    <a class="w-100 btn color-white" href="{{ route('show.tourguide', $favouriteGuides->guide->id) }}">
                                                        Start the Adventure
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                
                            </div>
                        @empty
                            @if(Auth::check())
                                @if(Auth::user()->role === 'tourist') 
                                    <p>Welcome to the tourist page!</p>
                                @else
                                    <p>There is no data to show. This page is only for tourist accounts.</p>
                                @endif
                            @else
                                <p>There is no data to show. please login to view Data!</p>
                            @endif
                            @endforelse
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-trips" role="tabpanel" aria-labelledby="nav-trips-tab">
                    <div class="spacer py-4"></div>
                    <div class="row">
                        @forelse ($favouritePlaces as $favouritePlace)
                            <div class="col-md-3 mb-5">
                                <a href="{{ route('show.destination', $favouritePlace->place->id) }}">
                                    <div class="place image">
                                        <img src="{{ $favouritePlace->place->image }}" alt="{{ $favouritePlace->place->name }}" class="_place_image" />
                                        <a href="javascript:void(0);" class="toggle-favorite"
                                                data-place-id="{{$favouritePlace->place->id }}">
                                                @if ($favouritePlace->place->is_favorite)
                                                    <img src="{{ asset('assets/images/icons/favourites.svg') }}"
                                                        alt="like-dislike" class="_like_dislike" />
                                                @else
                                                    <img src="{{ asset('assets/images/icons/favourites-gray.svg') }}"
                                                        alt="like-dislike" class="_like_dislike" />
                                                @endif
                                        </a> 
                                        <div class="spacer my-3"></div>
                                        <h3 class="font-2 display-20 {{ $loop->first ? '' :  'ps-md-4'}}"> {{ $favouritePlace->place->name }} </h3>
                                        <p class="{{ $loop->first ? '' :  'ps-md-4'}}"> {{ $favouritePlace->place?->district?->name }} </p>
                                    </div>
                                </a>
                            </div>
                        @empty
                            @if(Auth::check())
                                @if(Auth::user()->role === 'tourist') 
                                    <p>Welcome to the tourist page!</p>
                                @else
                                    <p>There is no data to show. This page is only for tourist accounts.</p>
                                @endif
                            @else
                                <p>There is no data to show. please login to view Data!</p>
                            @endif
                        @endforelse
                    </div>
                </div>
                </div>
    
            </div>
        </div>

        <div class="sapcer py-5"></div>
        <div class="sapcer py-5"></div>
    
    </x-website.footer.footer-section>
</x-website-layout>
