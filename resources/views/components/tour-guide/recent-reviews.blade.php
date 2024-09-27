<div class="_wrapper mb-4">
    <div class="heading-buttons d-flex justify-content-between align-items-center">
        <div class="_headings">
            <h2 class="font-2 display-20 color-blue"> Recent Reviews </h2>
        </div>
        {{-- <div class="_slide_buttons">
            <button class="slick-prev-custom" data-slider="slider-4">
                <img src="{{ asset('assets/images/icons/arrow-left.svg') }}" alt="Arrow left" />
            </button>
            <button class="slick-next-custom ml-4" data-slider="slider-4">
                <img src="{{ asset('assets/images/icons/arrow-right.svg') }}" alt="Arrow right" />
            </button>
        </div> --}}
    </div>
    <hr />
    <x-website.slider :options="$options">
        <div class="slick-slider mt-5" id="slider-6">
            @forelse($data as $slide)
                <div class="slide border rounded">
                    <div class="extra-slide-content">
                        <div class="row">
                            <div class="_title_content">
                                <h3 class="font-4 display-20 color-blue">sara alghamian </h3>
                                <p class="font-4 display-16 color-black">  
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit
                                </p>
                                <hr />
                                <img src="{{ asset('assets/images/icons/stars.svg') }}" alt="stars" class="pt-2" />
                            </div>
                        </div>
                    </div>
                </div>
            @empty 
                <p>No Data Found!</p>
            @endforelse
        </div>
    </x-website.slider>   
</div>