<div class="_wrapper bg-gray py-5 px-5">
    <div class="heading-buttons d-flex justify-content-between align-items-center">
        <div class="_headings">
            <h2 class="font-2 display-26 color-blue"> Popular Destinations Right Now </h2>
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
    <x-website.slider :options="$sliderWithDotsOptions">
        <div class="slick-slider mt-3" id="slider-4">
            @forelse($data as $slide)
                <div class="slide _popular_destinations">
                    <div class="extra-slide-content">
                        <div class="row">
                            <a href="{{ route('show.destination', $slide->id) }}">
                                <div class="image p-0">
                                    <img src="{{ $slide->image }}" alt="kalba"  width="100%"/>
                                    <img src="{{ asset('assets/images/icons/favourites.svg') }}" alt="lke-dislike"  class="_like_dislike"/>
                                    <ul class="p-0 d-flex justify-content-start align-items-center _tag">
                                        @php
                                              $tagsArray = json_decode($slide->tags, true);
                                        @endphp
                                        @forelse($tagsArray as $tag)
                                            <li class="py-3 font-4 display-16 color-black"> {{ $tag }} </li>
                                        @empty
                                        @endforelse
                                    </ul>
                                </div>
                                <div class="details">
                                        <h3 class="font-4 display-26 color-black"> {{ $slide->name }} </h3>
                                        <p class="font-4 display-16 color-black">  {{ $slide->district->name }}   </p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            @empty 
                <p>No Data Found!</p>
            @endforelse
        </div>
        <div class="button text-center mt-4">
            <button class="btn btn-md bg-blue color-white px-5 py-3"> Explore More </button>
        </div>
    </x-website.slider>   
</div>