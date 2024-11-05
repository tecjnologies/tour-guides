<div class="_wrapper _descovering_regions pb-4 px-5 _dotted_nav_slider">
    <div class="heading-buttons d-flex justify-content-between align-items-center">
        <div class="_headings">
            <h2 class="font-2 display-26 color-blue"> {{ __('website.HEADINGS.DISCOVERING_REGIONS') }} </h2>
            <p class="font-4 display-16 color-blue"> {{ __('website.TEXT.DISCOVERING_REGIONS') }}  </p>
        </div>
        <div class="_slide_buttons">
            <button class="slick-prev-custom"  data-slider="slider-5">
                <img src="{{ asset('assets/images/icons/arrow-left.svg') }}" alt="Arrow left" />
            </button>
            <button class="slick-next-custom ml-4"  data-slider="slider-5">
                <img src="{{ asset('assets/images/icons/arrow-right.svg') }}" alt="Arrow right" />
            </button>
        </div>
    </div>
    <x-website.slider :options="$options">
        <div class="slick-slider11 _discovering_regions mt-5" id="slider-5">
            {{-- @forelse($data as $slide) --}}
                <div class="slide">
                    <div class="extra-slide-content">
                        <div class="row">
                            <div class="col-md-3 position-relative">
                                <img src="{{ asset('assets/images/homepage/meseum.png') }}" alt="Museum of the Future" width="100%" />
                                <h3 class="font-2 display-20 color-white _title"> {{ __('website.DESTINATIONS.MESUEM_OF_THE_FUTURE') }} </h3>
                            </div>
                            
                            <div class="col-md-3">
                                <div class="im position-relative">
                                    <img src="{{ asset('assets/images/homepage/tower-2.png') }}" alt="Downtown" width="100%"/>
                                    <h3 class="font-2 display-20 color-white _title"> {{ __('website.DESTINATIONS.DOWNTOWN') }} </h3>
                                </div>

                                <div class="im mt-5 position-relative">
                                    <img src="{{ asset('assets/images/homepage/burj-arab.png') }}" alt="Burj Al Arab" width="100%"/>
                                    <h3 class="font-2 display-20 color-white _title"> {{ __('website.DESTINATIONS.BURJ_AL_ARAB') }} </h3>
                                </div>

                            </div>

                            <div class="col-md-3 position-relative">
                                <img src="{{ asset('assets/images/homepage/tower-1.png') }}" alt="Etihad Towers" width="100%"/>
                                <h3 class="font-2 display-20 color-white _title"> {{ __('website.DESTINATIONS.ETIHAD_TOWERS') }} </h3>
                            </div>

                            <div class="col-md-3 ">
                                <div class="im position-relative">
                                    <img src="{{ asset('assets/images/homepage/meseum-1.png') }}" alt="Alseef" width="100%"/>
                                    <h3 class="font-2 display-20 color-white _title">{{ __('website.DESTINATIONS.AL_SEEF') }}</h3>
                                </div>

                                <div class="im position-relative mt-5">
                                    <img src="{{ asset('assets/images/homepage/frame.png') }}" alt="Dubai Frame" width="100%"/>
                                    <h3 class="font-2 display-20 color-white _title"> {{ __('website.DESTINATIONS.DUBAI_FRAME') }} </h3>
                                </div>

                            </div>


                        </div>
                    </div>
                </div>
            {{-- @empty 
                <p>No Data Found!</p>
            @endforelse --}}
        </div>

    </x-website.slider>   
</div>   