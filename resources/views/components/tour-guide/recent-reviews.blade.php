<div class="_wrapper mb-4 _dotted_nav_slider">
    <div class="heading-buttons d-flex justify-content-between align-items-center">
        <div class="_headings">
            <h2 class="font-2 display-20 color-blue"> {{ __('website.LABELS.RECENT_REVIEWS') }}  </h2>
        </div>
    </div>
    <hr />
    <div class="slider-container">
        <div class="recent-reviews-slider mt-5" id="slider-6" 
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