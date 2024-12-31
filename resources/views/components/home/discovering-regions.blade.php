<div class="_wrapper _descovering_regions pb-4 _dotted_nav_slider">
    <div class="heading-buttons d-flex justify-content-between align-items-center">
        <div class="_headings">
            <h2 class="font-2 display-26 color-blue"> {{ __('website.HEADINGS.DISCOVERING_REGIONS') }} </h2>
            <p class="font-4 display-16 color-blue"> {{ __('website.TEXT.DISCOVERING_REGIONS') }} </p>
        </div>
    </div>
    <div class="slider-container">
        <div class="discovering-slider _discovering_regions mt-5" id="slider-5">
            <div class="slide">
                <div class="extra-slide-content">
                    <div class="row">
                        <div class="col-md-3 position-relative">
                            <img src="{{ asset('assets/images/homepage/meseum.png') }}" alt="Museum of the Future"
                                width="100%" />
                            <h3 class="font-2 display-20 color-white _title">
                                {{ __('website.DESTINATIONS.MESUEM_OF_THE_FUTURE') }} </h3>
                        </div>

                        <div class="col-md-3 _small_images">
                            <div class="im position-relative">
                                <img src="{{ asset('assets/images/homepage/tower-2.png') }}" alt="Downtown"
                                    width="100%" />
                                <h3 class="font-2 display-20 color-white _title">
                                    {{ __('website.DESTINATIONS.DOWNTOWN') }} </h3>
                            </div>

                            <div class="im position-relative">
                                <img src="{{ asset('assets/images/homepage/burj-arab.png') }}" alt="Burj Al Arab"
                                    width="100%" />
                                <h3 class="font-2 display-20 color-white _title">
                                    {{ __('website.DESTINATIONS.BURJ_AL_ARAB') }} </h3>
                            </div>

                        </div>

                        <div class="col-md-3 position-relative">
                            <img src="{{ asset('assets/images/homepage/tower-1.png') }}" alt="Etihad Towers"
                                width="100%" />
                            <h3 class="font-2 display-20 color-white _title">
                                {{ __('website.DESTINATIONS.ETIHAD_TOWERS') }} </h3>
                        </div>

                        <div class="col-md-3 _small_images">
                            <div class="im position-relative">
                                <img src="{{ asset('assets/images/homepage/meseum-1.png') }}" alt="Alseef"
                                    width="100%" />
                                <h3 class="font-2 display-20 color-white _title">
                                    {{ __('website.DESTINATIONS.AL_SEEF') }}</h3>
                            </div>

                            <div class="im position-relative ">
                                <img src="{{ asset('assets/images/homepage/frame.png') }}" alt="Dubai Frame"
                                    width="100%" />
                                <h3 class="font-2 display-20 color-white _title">
                                    {{ __('website.DESTINATIONS.DUBAI_FRAME') }} </h3>
                            </div>

                        </div>


                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


@push('scripts')
    <script>
        $(document).ready(function() {

            $('.discovering-slider').slick({
                dots: false,
                infinite: true,
                autoplay: true,
                arrows: false,
                centerMode: false,
                centerPadding: '0px',
                autoplaySpeed: 3000,
                slidesToShow: 1,
                slidesToScroll: 1,
                responsive: [{
                        breakpoint: 1290,
                        settings: {
                            slidesToShow: 1,
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
