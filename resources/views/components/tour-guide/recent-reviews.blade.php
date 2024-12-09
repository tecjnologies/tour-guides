<div class="_wrapper mb-4 _dotted_nav_slider">
    <div class="heading-buttons d-flex justify-content-between align-items-center">
        <div class="_headings">
            <h2 class="font-2 display-20 color-blue"> {{ __('website.LABELS.RECENT_REVIEWS') }}  </h2>
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
  
    <div class="slider-container">
        <div class="slick-slider mt-5" id="slider-6" 
            @if(session('locale') === 'ar')
                dir="ltr"
            @endif>
            @forelse($data as $slide)
                <div class="slide border rounded">
                    <div class="extra-slide-content">
                        <div class="row">
                            <div class="_title_content">
                                <h3 class="font-4 display-20 color-blue">sara alghamian </h3>
                                <p class="font-4 display-16 color-black">  
                                    {{ __('website.LABELS.RECENT_REVIEWS') }}
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
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function() {
            
            $('.slick-slider').slick({
                dots: false,
                infinite: true,
                autoplay: true,
                arrows: false,
                centerMode: false,
                centerPadding: '0px',
                autoplaySpeed: 3000,
                slidesToShow: 3,
                slidesToScroll: 1,
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