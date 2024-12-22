<div class="_wrapper py-5 _dotted_nav_slider _top_destinations">
    <div class="heading-buttons d-flex justify-content-between align-items-center">
        <div class="_headings">
            <h2 class="font-2 display-20 color-blue"> {{ __('website.LABELS.TOP_DESTINATIONS') }}</h2>
        </div>
    </div>
    <hr />

    <div class="slider-container">
        <div class="top-destinations-slider mt-3" id="slider-4">
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