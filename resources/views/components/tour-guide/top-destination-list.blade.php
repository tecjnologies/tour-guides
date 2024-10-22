<div class="_wrapper py-5 _dotted_nav_slider">
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
        $options = array_merge($options, ['dots' => true]);
    @endphp
    <x-website.slider :options="$options">
        <div class="slick-slider mt-3" id="slider-4">
            @forelse($data as $destination)
            <a href="{{ route('show.destination', $destination->id) }}">
                    <div class="slide _top_destinations">
                        <div class="extra-slide-content">
                            <div class="row">
                                <div class="image p-0">
                                    <img src="{{  $destination->image }}" alt="{{ $destination->name }}"  width="100%"/>
                                </div>
                                <div class="_title_content">
                                    <h3 class="font-4 display-16 color-black"> {{ $destination->name }} </h3>
                                    <p class="font-4 display-12 color-black">  
                                         {{ $destination?->district?->name }} 
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