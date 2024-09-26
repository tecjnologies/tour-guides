
@php 
    
    $tourGuides = [
        [
            'image' => asset('assets/images/homepage/man-4.png'), 
            'name' => 'Mohammed Othman',
            'emirate' =>  'Abu Dhabi',
            'Experience' => '14', 
            'languages' => 'Arabic,Urdu',
            'review_count' => '7',
            'price' => '50', 
        ],
        [
            'image' => asset('assets/images/homepage/man-4.png'), 
            'name' => 'Mohammed Othman',
            'emirate' =>  'Abu Dhabi',
            'Experience' => '14', 
            'languages' => 'Arabic,Urdu',
            'review_count' => '7',
            'price' => '50', 
        ],
        [
            'image' => asset('assets/images/homepage/man-4.png'), 
            'name' => 'Mohammed Othman',
            'emirate' =>  'Abu Dhabi',
            'Experience' => '14', 
            'languages' => 'Arabic,Urdu',
            'review_count' => '7',
            'price' => '50', 
        ],
        [
            'image' => asset('assets/images/homepage/man-4.png'), 
            'name' => 'Mohammed Othman',
            'emirate' =>  'Abu Dhabi',
            'Experience' => '14', 
            'languages' => 'Arabic,Urdu',
            'review_count' => '7',
            'price' => '50', 
        ],
        [
            'image' => asset('assets/images/homepage/man-4.png'), 
            'name' => 'Mohammed Othman',
            'emirate' =>  'Abu Dhabi',
            'Experience' => '14', 
            'languages' => 'Arabic,Urdu',
            'review_count' => '7',
            'price' => '50', 
        ],
        [
            'image' => asset('assets/images/homepage/man-4.png'), 
            'name' => 'Mohammed Othman',
            'emirate' =>  'Abu Dhabi',
            'Experience' => '14', 
            'languages' => 'Arabic,Urdu',
            'review_count' => '7',
            'price' => '50', 
        ],
        [
            'image' => asset('assets/images/homepage/man-4.png'), 
            'name' => 'Mohammed Othman',
            'emirate' =>  'Abu Dhabi',
            'Experience' => '14', 
            'languages' => 'Arabic,Urdu',
            'review_count' => '7',
            'price' => '50', 
        ],
        [
            'image' => asset('assets/images/homepage/man-4.png'), 
            'name' => 'Mohammed Othman',
            'emirate' =>  'Abu Dhabi',
            'Experience' => '14', 
            'languages' => 'Arabic,Urdu',
            'review_count' => '7',
            'price' => '50', 
        ],
        [
            'image' => asset('assets/images/homepage/man-4.png'), 
            'name' => 'Mohammed Othman',
            'emirate' =>  'Abu Dhabi',
            'Experience' => '14', 
            'languages' => 'Arabic,Urdu',
            'review_count' => '7',
            'price' => '50', 
        ],
    ];

@endphp

<div class="row px-5">
    @forelse($tourGuides as $guide)
        <div class="col-md-4 my-4 px-4">
            <div class="row _tour_guide">
                <div class="col-md-5 pe-0 image position-relative">
                    <img src="{{ $guide['image'] }}" alt="tour guide" width="100%" />
                    <p class="_price font-4 display-12 color-white" style="background-image: url({{ asset('assets/images/homepage/price-background.svg') }})">
                       {{ $guide['price'] }} <br/> per hour 
                    </p>
                </div>
                <div class="_tour_content col-md-7 border-top border-end border-bottom rounded-end d-flex justify-content-center align-items-center flex-column">
                    <div class="detail pt-2">
                        <h3 class="font-2 display-20 color-blue"> {{ $guide['name'] }}  </h3>
                        <p class="font-4 display-14 color-black py-3">Emirate: {{ $guide['emirate'] }} </p>
                        <p class="font-4 display-14 color-black">Experience: {{ $guide['Experience'] }}  years</p>
                        <p class="font-4 display-14 color-black py-3">Languages: {{ $guide['languages'] }}, +3 Languages</p>
                    </div>
                    <div class="row w-100 border-top ml-2 py-2">
                        <div class="col-md-6 text-center border-end">
                            <p class="font-4 display-14 color-blue">Reviews</p>
                            <p class="font-4 display-14 color-secondary pt-2"> {{ $guide['review_count'] }} </p>
                        </div>
                        <div class="col-md-6 text-center">
                            <p class="font-4 display-14 color-blue">Reviews</p>
                            <img src="{{ asset('assets/images/icons/stars.svg') }}" alt="Arrow right" class="text-cetner mx-auto pt-2" />
                        </div>
                    </div>
                </div>
            </div>  
        </div>
    @empty 
    <p>No Data Found!</p>
    @endforelse
</div>