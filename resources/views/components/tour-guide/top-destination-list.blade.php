<style>
    .slide._top_destinations {
        width: 91%;
    }

    ._top_destinations .image {
        aspect-ratio: 3 / 2;
    }

    ._top_destinations .image img{
        width: 100%;
        height: 100%;
    }

</style>


<div class="_wrapper py-5 _dotted_nav_slider _top_destinations">
    <div class="heading-buttons d-flex justify-content-between align-items-center">
        <div class="_headings">
            <h2 class="font-2 display-20 color-blue"> {{ __('website.LABELS.TOP_DESTINATIONS') }}</h2>
        </div>
    </div>
    <hr />

    <div class="slider-container">
        <div class="slick-slider mt-3" id="slider-4">
            @forelse($data as $destination)
                <a href="{{ route('show.tourdestination', $destination->id) }}">
                    <div class="slide _top_destinations">
                        <div class="extra-slide-content">
                            <div class="row">
                                <div class="image p-0">
                                    <img src="{{ $destination->image }}" alt="{{ $destination->name }}"
                                        width="100%" />
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
                slidesToShow: 4,
                slidesToScroll: 1,
                responsive: [{
                        breakpoint: 1290,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2,
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
