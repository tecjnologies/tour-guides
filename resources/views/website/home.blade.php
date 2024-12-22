@php 
    
    $homeSlider = [

        ['image' => asset('assets/images/homepage/man.png'), 'alt' => 'Slide 1', 'content' => '<h3>Slide 1 Title</h3><p>Some content</p>'],
        ['image' => asset('assets/images/homepage/man.png'), 'alt' => 'Slide 2', 'content' => '<h3>Slide 2 Title</h3><p>Some content</p>'],
        ['image' => asset('assets/images/homepage/man.png'), 'alt' => 'Slide 2', 'content' => '<h3>Slide 2 Title</h3><p>Some content</p>'],
        ['image' => asset('assets/images/homepage/man.png'), 'alt' => 'Slide 2', 'content' => '<h3>Slide 2 Title</h3><p>Some content</p>'],
        ['image' => asset('assets/images/homepage/man.png'), 'alt' => 'Slide 2', 'content' => '<h3>Slide 2 Title</h3><p>Some content</p>'],
        ['image' => asset('assets/images/homepage/man.png'), 'alt' => 'Slide 2', 'content' => '<h3>Slide 2 Title</h3><p>Some content</p>'],
    
    ];
    
    $vipServices = [
        [
            'image' => asset('assets/images/vip-services/senior-tourism.png'), 
            'title' =>  'Seniors’ tourism',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        ],
        [
            'image' => asset('assets/images/vip-services/business-tourism.png'), 
            'title' =>  'Business tourism',
            'content' =>   'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        ],
        [
            'image' => asset('assets/images/vip-services/adventures-tourism.png'), 
            'title' =>  'Adventure tourism',
            'content' =>  'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        ],
        [
            'image' => asset('assets/images/vip-services/senior-tourism.png'), 
            'title' =>  'Seniors’ tourism',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        ],
        [
            'image' => asset('assets/images/vip-services/business-tourism.png'), 
            'title' =>  'Business tourism',
            'content' =>   'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        ],
        [
            'image' => asset('assets/images/vip-services/adventures-tourism.png'), 
            'title' =>  'Adventure tourism',
            'content' =>  'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        ]
    ];

    $unForgettableNature = [
        
        [
            'image' => asset('assets/images/homepage/aya-universe.svg'), 
            'title' =>  'Aya Universe UAE',
            'content' => 'lorem Ipsum has been the industry’s standard dummy text ever since the 1500s.',
        ],
        [
            'image' => asset('assets/images/homepage/dubai-miracle-garden.svg'), 
            'title' =>  'Dubai Miracle Garden',
           'content' => 'lorem Ipsum has been the industry’s standard dummy text ever since the 1500s. ',
        ],
        [
            'image' => asset('assets/images/homepage/louver-abu-dhabi.svg'), 
            'title' =>  'louver abu dhabi',
            'content' => 'lorem Ipsum has been the industry’s standard dummy text ever since the 1500s. ',
        ],
        [
            'image' => asset('assets/images/homepage/madame-tussauds.svg'), 
            'title' =>  'Madame Tussauds',
            'content' => 'lorem Ipsum has been the industry’s standard dummy text ever since the 1500s. ',
        ],
        [
            'image' => asset('assets/images/homepage/aya-universe.svg'), 
            'title' =>  'Aya Universe UAE',
            'content' => 'lorem Ipsum has been the industry’s standard dummy text ever since the 1500s.',
        ],
        [
            'image' => asset('assets/images/homepage/dubai-miracle-garden.svg'), 
            'title' =>  'Dubai Miracle Garden',
           'content' => 'lorem Ipsum has been the industry’s standard dummy text ever since the 1500s. ',
        ],
        [
            'image' => asset('assets/images/homepage/louver-abu-dhabi.svg'), 
            'title' =>  'louver abu dhabi',
            'content' => 'lorem Ipsum has been the industry’s standard dummy text ever since the 1500s. ',
        ],
        [
            'image' => asset('assets/images/homepage/madame-tussauds.svg'), 
            'title' =>  'Madame Tussauds',
            'content' => 'lorem Ipsum has been the industry’s standard dummy text ever since the 1500s. ',
        ]

    ];


    $sliderOptions = [
        'dots' => false,
        'infinite' => true,
        'autoplay' => true,
        'arrows' => false,
        'centerMode' => false,
        'centerPadding' => '0px',
        'autoplaySpeed' => 3000,
        'slidesToShow' => 3,
        'slidesToScroll' => 1,
        'responsive' => [
            ['breakpoint' => 1290, 'settings' => ['slidesToShow' => 2, 'slidesToScroll' => 1]],
            ['breakpoint' => 768, 'settings' => ['slidesToShow' => 1, 'slidesToScroll' => 1]],
            ['breakpoint' => 480, 'settings' => ['slidesToShow' => 1, 'slidesToScroll' => 1]],
        ]
    ];

    
@endphp

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">
@endpush

<x-website-layout>
    @section('title', 'Tour Guide - Homepage')
    <div class="mx-auto">
        <div class="overflow-hidden">
            <div class="text-gray-900">
                <x-home.banner :banner="$banner" :places="$places" :placeTypes="$placeTypes" :districts="$districts"  class="h-12 w-auto" /> 
                <div class="tour-bar mt-4">
                    <div class="row py-3 become-our-partner mx-5" style="background-image: url({{ asset('assets/images/homepage/blue-bar-background.png') }});">
                        <div class="col-md-4 d-flex justify-content-around align-items-center">
                            <div class="before-after-image">
                                <img src="{{ asset('assets/images/homepage/image-before.svg') }}" alt="become guide" />
                            </div>
                            <div class="guid-profile">
                                <img src="{{ asset('assets/images/homepage/become-guide-1.svg') }}" alt="become guide" />
                            </div>
                            <div class="before-after-image">
                                <img src="{{ asset('assets/images/homepage/image-before.svg') }}" alt="become guide" />
                            </div>
                            <div class="guid-profile">
                                <img src="{{ asset('assets/images/homepage/become-guide-2.svg') }}" alt="become guide" />
                            </div>
                        </div>
                        <div class="col-md-4 text-center">
                            <h2 class="color-white font-2 display-26">  {{ __('website.LABELS.BECOME_TOUR_GUIDE_HEADING') }} </h2>
                            <p class="color-white font-3 display-15">   {{ __('website.LABELS.BECOME_TOUR_GUIDE_PARAGRAPH') }}  </p>
                            <a href="{{route('tour-guides-profile')}}" class="mt-3 pt-2 border-top color-white d-flex justify-content-center align-items-center mx-auto"> 
                                {{ __('website.BUTTONS.MEET_LOCAL_EXPERT') }}
                                <img src="{{ asset('assets/images/icons/arrow-white.svg') }}" alt="arrow white"  class="arrow-white ml-3"/>
                            </a>
                        </div>
                        <div class="col-md-4 d-flex justify-content-around align-items-center">
                            <div class="guid-profile">
                                <img src="{{ asset('assets/images/homepage/become-guide-3.svg') }}" alt="become guide" />
                            </div>
                            <div class="before-after-image">
                                <img src="{{ asset('assets/images/homepage/image-before.svg') }}" alt="become guide" />
                            </div>
                            <div class="guid-profile">
                                <img src="{{ asset('assets/images/homepage/become-guide-4.svg') }}" alt="become guide" />
                            </div>
                            <div class="before-after-image">
                                <img src="{{ asset('assets/images/homepage/image-before.svg') }}" alt="become guide" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="list py-3">
            <x-website.logos-list class="h-12 w-auto" />
        </div>
        <div class="row px-5 _info_boxes">
            <div class="col-md-4">
                <x-home.text-with-image 
                    heading="{{ __('website.TRUSTED_SECTION.HEADING_1') }}" 
                    text="{{ __('website.TRUSTED_SECTION.TEXT_1') }}"  
                    imageUrl="{{ asset('assets/images/homepage/trust-booking.svg') }}" />
            </div>
            <div class="col-md-4">
                <x-home.text-with-image 
                    heading="{{ __('website.TRUSTED_SECTION.HEADING_2') }}" 
                    text="{{ __('website.TRUSTED_SECTION.TEXT_2') }}"  
                    imageUrl="{{ asset('assets/images/homepage/customer-service.svg') }}" />
            </div>
            <div class="col-md-4">
                <x-home.text-with-image 
                    heading="{{ __('website.TRUSTED_SECTION.HEADING_3') }}" 
                    text="{{ __('website.TRUSTED_SECTION.TEXT_3') }}"  
                    imageUrl="{{ asset('assets/images/homepage/payments.svg') }}" />
            </div>
        </div>
        <x-home.tour-guide :data="$tourGuides" :options="$sliderOptions" class="h-12 w-auto"/>    
        <div class="spacer py-5"></div>
        <x-home.popular-destinations :data="$destinations" :options="$sliderOptions" class="h-12 w-auto" />
        <div class="spacer py-5"></div>
        <x-home.vip-service :data="$vipServices" :options="$sliderOptions" class="h-12 w-auto" />
        <div class="spacer py-5"></div>
        <x-home.unforgettable-nature :data="$unForgettableNature" :options="$sliderOptions"  class="h-12 w-auto " />
    </div>
    <x-website.footer.footer-section>
        <x-home.discovering-regions />
    </x-website.footer.footer-section>

</x-website-layout> 