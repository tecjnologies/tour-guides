@push('css')
    <link rel="stylesheet" href="{{ asset('assets/css/vip-service.css') }}">
@endpush

<div class="wrapper px-5 _vip_services _dotted_nav_slider">
    <div class="heading-buttons d-flex justify-content-between align-items-center">
        <div class="_headings">
            <h2 class="font-2 display-26 color-blue">{{ __('website.HEADINGS.VIP_SERVICE') }}</h2>
            <p class="font-4 display-16 color-blue"> {{ __('website.TEXT.VIP_SERVICE') }}</p>
        </div>
        <div class="_slide_buttons">
            <button class="slick-prev-custom" data-slider="slider-3">
                <img src="{{ asset('assets/images/icons/arrow-left.svg') }}" alt="Arrow left" />
            </button>
            <button class="slick-next-custom ml-4" data-slider="slider-3">
                <img src="{{ asset('assets/images/icons/arrow-right.svg') }}" alt="Arrow right" />
            </button>
        </div>
    </div>
    <div class="spacer mt-3"></div>
    <div class="vipservices-slider" id="slider-3">
        @forelse($data as $index => $slide)
            <div class="image-with-text-{{$index}}">
                <x-home.text-with-image
                    heading="{{ $slide['title'] }}" 
                    text="{{ $slide['content'] }}"  
                    imageUrl="{{ $slide['image'] }}" />
            </div>
        @empty
            <p>No Data Found!</p>
        @endforelse
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.vipservices-slider').slick({
                dots: false,
                infinite: true,
                autoplay: false,
                arrows: false,
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
