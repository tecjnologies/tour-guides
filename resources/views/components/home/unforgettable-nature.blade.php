<div class="_wrapper py-5 px-5 bg-gray _unforgettable_slider _dotted_nav_slider">  
    <div class="heading-buttons d-flex justify-content-between align-items-center">
        <div class="_headings">
            <h2 class="font-2 display-26 color-blue"> {{ __('website.HEADINGS.UNFORGETTABLE_NATURE') }} </h2>
        </div>
        <div class="_slide_buttons">
            <button class="slick-prev-custom"  data-slider="slider-2">
                <img src="{{ asset('assets/images/icons/arrow-left.svg') }}" alt="Arrow left" />
            </button>
            <button class="slick-next-custom ml-4"  data-slider="slider-2">
                <img src="{{ asset('assets/images/icons/arrow-right.svg') }}" alt="Arrow right" />
            </button>
        </div>
    </div>
    <div class="slider-container">
        <div class="unforgettable-slider mt-4" id="slider-2" >
            @forelse($data as $slide)
                <div class="slide">
                    <div class="extra-slide-content">
                        <div class="row p-4 card border-0">
                            <div class="_details pb-3">
                                <img src="{{ $slide['image'] }}" alt="ETGA Logo" width="100%"/>
                                <p class="pt-3 font-2 display-16 color-blue"> {{ $slide['title'] }} </p>
                                <p class="pt-3 font-4 display-16 color-blue"> {{ $slide['content'] }} </p>
                            </div>
                        </div>
                    </div>
                </div>
            @empty 
                <p>No Data Found!</p>
            @endforelse
        </div>
    </div>
</div>


@push('scripts')
    <script>
        $(document).ready(function() {
            
            $('.unforgettable-slider').slick({
                dots: false,
                infinite: true,
                autoplay: true,
                arrows: false,
                centerMode: false,
                centerPadding: '0px',
                autoplaySpeed: 3000,
                slidesToShow: 4,
                slidesToScroll: 4,
                responsive: [{
                        breakpoint: 1290,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });

            $('.slick-prev-custom').on('click', function() {
                const sliderId = $(this).data('slider');
                $('#' + sliderId).slick('slickPrev');
            });

            $('.slick-next-custom').on('click', function() {
                const sliderId = $(this).data('slider');
                $('#' + sliderId).slick('slickNext');
            });
        });
    </script>
@endpush