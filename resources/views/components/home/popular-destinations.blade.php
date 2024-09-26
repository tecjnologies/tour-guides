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

    <x-website.slider :slides="$data">
        <div class="slick-slider mt-3" id="slider-4">
            @forelse($data as $slide)
                <div class="slide _popular_destinations">
                    <div class="extra-slide-content">
                        <div class="row">
                            <div class="image p-0">
                                <img src="{{ asset('assets/images/homepage/kalba.png') }}" alt="kalba"  width="100%"/>
                                <img src="{{ asset('assets/images/icons/favourites.svg') }}" alt="lke-dislike"  class="_like_dislike"/>
                                <ul class="p-0 d-flex justify-content-start align-items-center _tag">
                                    <li class="py-3 font-4 display-16 color-black"> indidual </li>
                                    <li class="py-3 font-4 display-16 color-black"> Group </li>
                                </ul>
                            </div>
                            <div class="details">
                                <h3 class="font-4 display-26 color-black"> Top hanging garden kalba </h3>
                                <p class="font-4 display-16 color-black">  Alhafia - Sharjah  </p>
                            </div>
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