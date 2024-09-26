<div class="wrapper px-5">
    <div class="heading-buttons d-flex justify-content-between align-items-center">
        <div class="_headings">
            <h2 class="font-2 display-26 color-blue"> VIP Service </h2>
            <p class="font-4 display-16 color-blue"> VIP tourism is a high level services of all spheres of tourism. </p>
        </div>
        <div class="_slide_buttons">
            <button class="slick-prev-custom"  data-slider="slider-3">
                <img src="{{ asset('assets/images/icons/arrow-left.svg') }}" alt="Arrow left" />
            </button>
            <button class="slick-next-custom ml-4"  data-slider="slider-3">
                <img src="{{ asset('assets/images/icons/arrow-right.svg') }}" alt="Arrow right" />
            </button>
        </div>
    </div>
    <x-website.slider :options="$options">
        <div class="slick-slider" id="slider-3">
            @forelse($data as $slide)
                <div class="slide mt-5">
                    <div class="extra-slide-content">
                        <div class="row">
                            <div class="col-md-5 p-0 h-100">
                                <img src="{{ asset('assets/images/homepage/man-woman.png') }}" alt="vip service"  width="100%"/>
                            </div>
                            <div class="col-md-7 border-top border-bottom border-end rounded-end">
                                <div class="h-100 d-flex justify-content-center algin-items-center flex-column">
                                    <h3 class="font-2 display-24 color-blue">Seniors’ tourism</h3>
                                    <p class="font-4 display-14 color-black">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                </div>
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