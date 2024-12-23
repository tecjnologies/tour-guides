@php 
    
    $homeSlider = [
        ['image' => asset('assets/images/homepage/man.png'), 'alt' => 'Slide 1', 'content' => '<h3>Slide 1 Title</h3><p>Some content</p>'],
        ['image' => asset('assets/images/homepage/man.png'), 'alt' => 'Slide 2', 'content' => '<h3>Slide 2 Title</h3><p>Some content</p>'],
        ['image' => asset('assets/images/homepage/man.png'), 'alt' => 'Slide 2', 'content' => '<h3>Slide 2 Title</h3><p>Some content</p>'],
        ['image' => asset('assets/images/homepage/man.png'), 'alt' => 'Slide 2', 'content' => '<h3>Slide 2 Title</h3><p>Some content</p>'],
        ['image' => asset('assets/images/homepage/man.png'), 'alt' => 'Slide 2', 'content' => '<h3>Slide 2 Title</h3><p>Some content</p>'],
        ['image' => asset('assets/images/homepage/man.png'), 'alt' => 'Slide 2', 'content' => '<h3>Slide 2 Title</h3><p>Some content</p>'],
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
            ['breakpoint' => 1290, 'settings' => ['slidesToShow' => 1, 'slidesToScroll' => 1]],
            ['breakpoint' => 768, 'settings' => ['slidesToShow' => 1, 'slidesToScroll' => 1]],
            ['breakpoint' => 480, 'settings' => ['slidesToShow' => 1, 'slidesToScroll' => 1]],
        ]
    ];

@endphp
 
<x-website-layout>
    @section('title', 'Tour Guide Profile')
    <div class="mx-auto">
        <x-tour-guide.tour-guide-grid :tourGuides="$tourGuides" :places="$places" :languages="$languages" :placeTypes="$placeTypes" class="h-12 w-auto"/>
    </div>
    <x-website.footer.footer-section :image="'tour-guides.svg'">
        <x-home.discovering-regions />
    </x-website.footer.footer-section>
</x-website-layout>