@push('css')
    <link rel="stylesheet" href="{{ asset('assets/css/tour-guide.css') }}">
@endpush

<div class="px-5 _tour_guide">
    <div class="heading-buttons pt-5 d-flex justify-content-between align-items-center">
        <div class="_headings">
            <h2 class="font-2 display-26 color-blue"> {{ __('website.HEADINGS.TOUR_GUIDE') }} </h2>
            <p class="font-4 display-16 color-blue"> {{ __('website.TEXT.TOUR_GUIDE') }} </p>
        </div>
        <div class="_slide_buttons">
            <button class="slick-prev-custom" data-slider="slider-1">
                <img src="{{ asset('assets/images/icons/arrow-left.svg') }}" alt="Arrow left" />
            </button>
            <button class="slick-next-custom ml-4" data-slider="slider-1">
                <img src="{{ asset('assets/images/icons/arrow-right.svg') }}" alt="Arrow right" />
            </button>
        </div>
    </div>
    <div class="slider-container">
        <div class="tourguide-slider mt-5 tourguide-grid" id="slider-1">
            @forelse($data as $guide)

                @php
                    $currentCurrency = session('currency', config('currency.default'));
                    $priceInCurrency = \App\Helpers\CurrencyHelper::convert($guide->price, $currentCurrency);
                @endphp

                <div class="_wrapper position-relative">
                    <div class="image">
                        <img src="{{ $guide->image }}" alt="tour guide" width="100%" />
                    </div>
                    <button href="javascript:void(0);" class="toggle-favorite" data-guide-id="{{ $guide->id }}">
                        @if ($guide->is_favoriteGuide)
                            <img src="{{ asset('assets/images/icons/favourites.svg') }}" alt="like-dislike"
                                class="_like_dislike" />
                        @else
                            <img src="{{ asset('assets/images/icons/favourites-gray.svg') }}" alt="like-dislike"
                                class="_like_dislike" />
                        @endif
                    </button>
                    <div class="title">
                        <h3 class="">
                            {{ substr($guide->name, 0, 15) }}
                        </h3>
                    </div>

                    <div class="overlay">

                        <div class="_content">
                            <h3 class="color-white">
                                {{ substr($guide->name, 0, 15) }}
                            </h3>
                            <p class="font-4 display-14 color-white">
                                {{ trans_choice('website.LABELS.EMIRATE', 1) }} : {{ $guide->address }}
                            </p>
                            <p class="font-4 display-14 color-white">
                                {{ trans_choice('website.LABELS.LANGUAGE', 2) }}:
                                @if ($guide->guideLanguages)
                                    @php
                                        $languages = $guide->guideLanguages;
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
                        <div class="_button">
                            <a class="w-100 btn color-white" href="{{ route('show.tourguide', $guide->id) }}">
                                Start the Adventure
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <p>No Data Found!</p>
            @endforelse
        </div>
    </div>
</div>
<x-website.book-guide />