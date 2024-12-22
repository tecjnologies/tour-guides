@php
$data = 
[
    ['title' => 'Sara', 'review' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo '],
    ['title' => 'Sara', 'review' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo '],
    ['title' => 'Sara', 'review' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo '],
    ['title' => 'Sara', 'review' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo '],
    ['title' => 'Sara', 'review' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo '],
    ['title' => 'Sara', 'review' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo '],
    ['title' => 'Sara', 'review' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo '],
    
];
@endphp
<div class="_wrapper mb-4 _dotted_nav_slider">
    <div class="heading-buttons d-flex justify-content-between align-items-center">
        <div class="_headings">
            <h2 class="font-1 display-20 color-blue"> {{ __('website.LABELS.RECENT_REVIEWS') }}  </h2>
        </div>
    </div>
    <div class="slider-container _recent_reviews">
        <div class="recent-reviews-slider" id="slider-6" 
            @if(session('locale') === 'ar')  dir="ltr" @endif>
            @forelse($data as $slide)
                <div class="slide">
                    <div class="extra-slide-content">
                        <div class="row">
                            <div class="_card _title_content">
                                <h3 class="font-1 display-20 color-blue"> {{ $slide['title'] }}  </h3>
                                <p class="font-4 display-16 color-black">  
                                    {{ $slide['review'] }}
                                </p>
                                <hr class="w-100" />
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