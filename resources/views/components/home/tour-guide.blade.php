<div class="_wrapper px-5">
    <div class="heading-buttons pt-5 d-flex justify-content-between align-items-center">
        <div class="_headings">
            <h2 class="font-2 display-26 color-blue"> Tour guide </h2>
            <p class="font-4 display-16 color-blue"> Find trusted tour guides awarded for their Excellent performance </p>
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
            <a  href="{{ route('show.tourguide', $slide->id) }}">
                <div class="slide">
                    <div class="extra-slide-content">
                        <div class="row _tour_guide">
                            <div class="col-md-5 pe-0 image position-relative">
                                <img src="{{ $slide->image  }}" alt="tour guide" width="100%" />
                                <p class="_price font-4 display-12 color-white" 
                                 style="background-image: url({{ asset('assets/images/homepage/price-background.svg') }})">
                                    {{ $slide->price }} AED <br/> per hour 
                                </p>
                            </div>
                            <div class="_tour_content col-md-7 border-top border-end border-bottom rounded-end 
                                        d-flex justify-content-center 
                                        align-items-center flex-column">
                                <div class="detail pt-2">
                                    <h3 class="font-2 display-20 color-blue"> {{ $slide->name }} </h3>
                                    <p class="font-4 display-14 color-black py-3">Emirate: {{ $slide->address }}</p>
                                    <p class="font-4 display-14 color-black">Experience: {{ $slide->experience }} years</p>
                                    <p class="font-4 display-14 color-black py-3">Languages: 
                                        @if($slide->guideLanguages)
                                            @php
                                                $languages = $slide->guideLanguages;
                                                $extraLanguagesCount = $languages->count() - 2;
                                            @endphp
                                            @foreach($languages->take(2) as $language)
                                                <span>{{ $language->name }}</span>
                                            @endforeach
                                    
                                            @if($extraLanguagesCount > 0)
                                                <span>+{{ $extraLanguagesCount }} Languages </span>
                                            @endif
                                        @endif
                                    </p>
                                </div>
                                <div class="row w-100 border-top ml-2 py-2">
                                    <div class="col-md-6 text-center border-end">
                                        <p class="font-4 display-14 color-blue">Reviews</p>
                                        <p class="font-4 display-14 color-secondary pt-2">  08 </p>
                                    </div>
                                    <div class="col-md-6 text-center">
                                        <p class="font-4 display-14 color-blue"> Ratings </p>
                                        <img src="{{ asset('assets/images/icons/stars.svg') }}" alt="Arrow right" class="text-cetner mx-auto pt-2" />
                                    </div>
                                </div>
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