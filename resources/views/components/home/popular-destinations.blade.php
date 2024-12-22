


<div class="_wrapper py-5 px-5 _popular_destinations _dotted_nav_slider">
    <div class="heading-buttons d-flex justify-content-between align-items-center">
        <div class="_headings">
            <h2 class="font-2 display-26 color-blue">{{ __('website.HEADINGS.POPULAR_DESTINATION') }}</h2>
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
    <div class="slider-container">
        <div class="popular-destinations mt-3" id="slider-4">
            @forelse($data as $slide)
                <div class="slide ">
                    <div class="extra-slide-content">
                        <div class="row">
                            <a href="{{ route('show.tourdestination', $slide->id) }}">
                                <div class="image p-0">
                                    <img src="{{ $slide->image }}" alt="kalba" width="100%" class="_place_image" />
                                    {{-- <a href="javascript:void(0);" class="toggle-favorite"
                                        data-place-id="{{ $slide->id }}">
                                        @if ($slide->is_favorite)
                                            <img src="{{ asset('assets/images/icons/favourites.svg') }}"
                                                alt="like-dislike" class="_like_dislike" />
                                        @else
                                            <img src="{{ asset('assets/images/icons/favourites-gray.svg') }}"
                                                alt="like-dislike" class="_like_dislike" />
                                        @endif
                                    </a> --}}
                                    {{-- <ul class="p-0 d-flex justify-content-start align-items-center _tag">
                                        @php
                                            $tagsArray = json_decode($slide->tags, true);
                                        @endphp
                                        @forelse($tagsArray as $tag)
                                            <li class="py-3 font-4 display-16 color-black"> {{ $tag }} </li>
                                        @empty
                                        @endforelse
                                    </ul> --}}
                                </div>
                                <div class="details">
                                    <h3 class="font-5 display-16 color-blue"> {{ substr($slide->name, 0, 20) }} </h3>
                                    {{-- <p class="font-4 display-16 color-black"> {{ $slide->district->name }} </p> --}}
                                    <p class="font-5 display-16 color-black"> 
                                        {{-- {{ $slide->district->name }}  --}}
                                        Lorem Ipsum is simply dummy text of the printing 
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <p>No Data Found!</p>
            @endforelse
        </div>
        {{-- <div class="button text-center mt-4 _explorer">
            <button class="btn btn-md bg-blue color-white px-5 py-3"> Explore More </button>
        </div> --}}
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function() {

            $('.popular-destinations').slick({
                dots: false,
                infinite: true,
                autoplay: true,
                arrows: false,
                centerMode: false,
                centerPadding: '0px',
                autoplaySpeed: 3000,
                slidesToShow: 6,
                slidesToScroll: 6,
                responsive: [{
                        breakpoint: 1290,
                        settings: {
                            slidesToShow: 4,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 2,
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

        $(document).on('click', '.toggle-favorite', function(e) {
            e.preventDefault();
            const placeId = $(this).data('place-id') || null;
            const guideId = $(this).data('guide-id') || null;
            const $icon = $(this).find('img');
            $.ajax({
                url: "{{ route('toggle-favorite') }}",
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    place_id: placeId,
                    guide_id: guideId
                },
                success: function(response) {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'OK'
                    });

                    if ($icon.attr('src') === '{{ asset('assets/images/icons/favourites.svg') }}') {
                        $icon.attr('src', '{{ asset('assets/images/icons/favourites-gray.svg') }}');
                    } else {
                        $icon.attr('src', '{{ asset('assets/images/icons/favourites.svg') }}');
                    }
                },
                error: function(xhr) {
                    if (xhr.status === 401) {
                        window.location.href = "{{ route('login') }}";
                    } else {
                        Swal.fire({
                            title: 'Error!',
                            text: xhr.responseJSON?.message || 'Something went wrong',
                            icon: 'error',
                            confirmButtonText: 'Cancel'
                        });
                    }
                }
            });
        });
    </script>
@endpush
