


<div class="_wrapper py-5 px-5 _popular_destinations _dotted_nav_slider">
    <div class="heading-buttons d-flex justify-content-between align-items-center">
        <div class="_headings">
            <h2 class="font-2 display-26 color-blue">{{ __('website.HEADINGS.POPULAR_DESTINATION') }}</h2>
        </div>
        <div class="_slide_buttons">
            <button class="slick-prev-custom" data-slider="slider-4">
                <img src="{{ asset('assets/images/icons/arrow-left.svg') }}" alt="Arrow left" />
            </button>
            <button class="slick-next-custom ml-4" data-slider="slider-4">
                <img src="{{ asset('assets/images/icons/arrow-right.svg') }}" alt="Arrow right" />
            </button>
        </div>
    </div>
    @php
        $sliderWithDotsOptions = array_merge($options, ['dots' => false]);
    @endphp
    <div class="slider-container">
        <div class="popular-destinations mt-3" id="slider-4">
            @forelse($data as $slide)
                <div class="slide ">
                    <div class="extra-slide-content">
                        <div class="row">
                            <a href="{{ route('show.tourdestination', $slide->id) }}">
                                <div class="image p-0">
                                    <img src="{{ $slide->image }}" alt="kalba" width="100%" class="_place_image" />
                                </div>
                                <div class="details">
                                    <h3 class="font-5 display-16 color-blue"> {{ substr($slide->name, 0, 20) }} </h3>
                                    <p class="font-5 display-16 color-black"> 
                                        Lorem Ipsum is simply dummy text of the printing 
                                    </p>
                                </div>
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