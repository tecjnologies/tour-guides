@php 
    
    $homeSlider = [
        ['image' => asset('/public/assets/images/homepage/man.png'), 'alt' => 'Slide 1', 'content' => '<h3>Slide 1 Title</h3><p>Some content</p>'],
        ['image' => asset('/public/assets/images/homepage/man.png'), 'alt' => 'Slide 2', 'content' => '<h3>Slide 2 Title</h3><p>Some content</p>'],
        ['image' => asset('/public/assets/images/homepage/man.png'), 'alt' => 'Slide 2', 'content' => '<h3>Slide 2 Title</h3><p>Some content</p>'],
        ['image' => asset('/public/assets/images/homepage/man.png'), 'alt' => 'Slide 2', 'content' => '<h3>Slide 2 Title</h3><p>Some content</p>'],
        ['image' => asset('/public/assets/images/homepage/man.png'), 'alt' => 'Slide 2', 'content' => '<h3>Slide 2 Title</h3><p>Some content</p>'],
        ['image' => asset('/public/assets/images/homepage/man.png'), 'alt' => 'Slide 2', 'content' => '<h3>Slide 2 Title</h3><p>Some content</p>'],
    ];

    $sliderOptions = [
        'dots' => false,
        'infinite' => false,
        'autoplay' => false,
        'arrows' => false,
        'centerMode' => false,
        'centerPadding' => '0px',
        'autoplaySpeed' => 3000,
        'slidesToShow' => 3,
        'slidesToScroll' => 3,
        'responsive' => [
            ['breakpoint' => 1024, 'settings' => ['slidesToShow' => 2, 'slidesToScroll' => 2]],
            ['breakpoint' => 768, 'settings' => ['slidesToShow' => 1, 'slidesToScroll' => 1]],
            ['breakpoint' => 480, 'settings' => ['slidesToShow' => 1, 'slidesToScroll' => 1]],
        ]
    ];

@endphp

<x-website-layout>
    @section('title', 'Tour Guide Profile')
    <div class="mx-auto">
        <x-home.tour-guide-grid class="h-12 w-auto" />
        <div class="spacer py-5"></div>
        <x-home.discovering-regions :data="$homeSlider" :options="$sliderOptions" class="h-12 w-auto" />
    </div>
</x-website-layout>