<div class="_wrapper py-5 ">
    <div class="heading-buttons d-flex justify-content-between align-items-center">
        <div class="_headings">
            <h2 class="font-2 display-20 color-blue"> Top Destinations </h2>
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
    @php 
        $options['slidesToShow'] = 4; 
    @endphp
    <x-website.slider :options="$options">
        <div class="slick-slider mt-3" id="slider-4">
            @forelse($data as $slide)
            <a href="{{ route('destination-details') }}">
                    <div class="slide _top_destinations">
                        <div class="extra-slide-content">
                            <div class="row">
                                <div class="image p-0">
                                    <img src="{{  $slide['image'] }}" alt="kalba"  width="100%"/>
                                </div>
                                <div class="_title_content">
                                    <h3 class="font-4 display-16 color-black"> {{  $slide['title'] }} </h3>
                                    <p class="font-4 display-12 color-black">  
                                        {{  $slide['content'] }}
                                    </p>
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