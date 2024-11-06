<div class="_wrapper px-5 _tour_guide">
    <div class="heading-buttons pt-5 d-flex justify-content-between align-items-center">
        <div class="_headings">
            <h2 class="font-2 display-26 color-blue"> {{ trans_choice('website.HEADINGS.TOUR_GUIDE', 1) }} </h2>
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
    @php 
        $sliderWithDotsOptions = array_merge($options, ['dots' => true]);
    @endphp
    <x-website.slider :options="$sliderWithDotsOptions">
        <div class="slick-slider mt-4" id="slider-1">
            @forelse($data as $slide)

            @php
                  $currentCurrency = session('currency', config('currency.default'));
                  $priceInCurrency = \App\Helpers\CurrencyHelper::convert($slide->price, $currentCurrency);
            @endphp
            <a  href="{{ route('show.tourguide', $slide->id) }}">
                <div class="slide">
                    <div class="extra-slide-content ">
                        <div class="row _tour_guide border border-rounded p-3 rounded">
                            <div class="col-md-5 image position-relative">
                                <img src="{{ $slide->image  }}" alt="tour guide" width="100%" />
                                <p class="_price font-4 display-12 color-white" 
                                 style="background-image: url({{ asset('assets/images/homepage/price-background.svg') }})">
                                    {{ \App\Helpers\CurrencyHelper::format($slide->price, $currentCurrency) }} <br/> {{ __('website.LABELS.PER_HOUR') }}
                                </p>
                            </div>
                            <div class="_tour_content col-md-7 position-relative d-flex justify-content-center flex-column pl-0 pl-md-2">
                                <div class="detail pt-2">
                                    <h3 class="font-2 display-20 color-blue"> 
                                        {{ substr($slide->name, 0, 15) }} 
                                    </h3>
                                    <p class="font-4 display-14 color-black py-3">{{ trans_choice('website.LABELS.EMIRATE', 1) }} : {{ $slide->address }}</p>
                                    <p class="font-4 display-14 color-black">{{ __('website.LABELS.EXPERIENCE') }}: {{ $slide->experience }} {{ trans_choice('website.LABELS.YEAR', 2) }}</p>
                                    <p class="font-4 display-14 color-black py-3">{{ trans_choice('website.LABELS.LANGUAGE', 2) }}: 
                                        @if($slide->guideLanguages)
                                            @php
                                                $languages = $slide->guideLanguages;
                                                $extraLanguagesCount = $languages->count() - 2;
                                            @endphp
                                            @foreach($languages->take(2) as $language)
                                                <span>{{ $language->name }}</span>
                                            @endforeach
                                    
                                            @if($extraLanguagesCount > 0)
                                                <span>+{{ $extraLanguagesCount }} {{ trans_choice('website.LABELS.LANGUAGE', 2) }} </span>
                                            @endif
                                        @endif
                                    </p>
                                </div>
                                <div class="row w-100 border-top ml-2 py-2">
                                    <div class="col-md-6 text-center border-end">
                                        <p class="font-4 display-14 color-blue">{{ trans_choice('website.LABELS.REVIEW', 2) }}</p>
                                        <p class="font-4 display-14 color-secondary pt-2">  08 </p>
                                    </div>
                                    <div class="col-md-6 text-center">
                                        <p class="font-4 display-14 color-blue"> {{ trans_choice('website.LABELS.RATING', 2) }} </p>
                                        <img src="{{ asset('assets/images/icons/stars.svg') }}" alt="Arrow right" class="text-cetner mx-auto pt-2" />
                                    </div>
                                </div>
                                <button href="javascript:void(0);" class="toggle-favorite" data-guide-id="{{ $slide->id }}">
                                    @if ($slide->is_favoriteGuide)
                                        <img src="{{ asset('assets/images/icons/favourites.svg') }}"
                                            alt="like-dislike" class="_like_dislike" />
                                    @else
                                        <img src="{{ asset('assets/images/icons/favourites-gray.svg') }}" alt="like-dislike"
                                            class="_like_dislike" />
                                    @endif
                                </button>
                            </div>
                         </div>
                    </div>
                </div>
            </a>
            @empty 
                <p>No Data Found!</p>
            @endforelse
        </div>
    </x-website.slider>   
</div>