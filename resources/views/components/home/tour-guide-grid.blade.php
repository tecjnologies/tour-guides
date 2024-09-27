
@php 

    $tourGuides = [
        [
            'image' => asset('assets/images/tour-guide/0.svg'), 
            'name' => 'Mohammed Othman',
            'emirate' =>  'Abu Dhabi',
            'Experience' => '14', 
            'languages' => 'Arabic,Urdu',
            'review_count' => '7',
            'price' => '50', 
        ],
        [
            'image' => asset('assets/images/tour-guide/1.svg'), 
            'name' => 'Mohammed Othman',
            'emirate' =>  'Abu Dhabi',
            'Experience' => '14', 
            'languages' => 'Arabic,Urdu',
            'review_count' => '7',
            'price' => '50', 
        ],
        [
            'image' => asset('assets/images/tour-guide/2.svg'), 
            'name' => 'Mohammed Othman',
            'emirate' =>  'Abu Dhabi',
            'Experience' => '14', 
            'languages' => 'Arabic,Urdu',
            'review_count' => '7',
            'price' => '50', 
        ],
        [
            'image' => asset('assets/images/tour-guide/3.svg'), 
            'name' => 'Mohammed Othman',
            'emirate' =>  'Abu Dhabi',
            'Experience' => '14', 
            'languages' => 'Arabic,Urdu',
            'review_count' => '7',
            'price' => '50', 
        ],
        [
            'image' => asset('assets/images/tour-guide/4.svg'), 
            'name' => 'Mohammed Othman',
            'emirate' =>  'Abu Dhabi',
            'Experience' => '14', 
            'languages' => 'Arabic,Urdu',
            'review_count' => '7',
            'price' => '50', 
        ],
        [
            'image' => asset('assets/images/tour-guide/5.svg'), 
            'name' => 'Mohammed Othman',
            'emirate' =>  'Abu Dhabi',
            'Experience' => '14', 
            'languages' => 'Arabic,Urdu',
            'review_count' => '7',
            'price' => '50', 
        ],
        [
            'image' => asset('assets/images/tour-guide/6.svg'), 
            'name' => 'Mohammed Othman',
            'emirate' =>  'Abu Dhabi',
            'Experience' => '14', 
            'languages' => 'Arabic,Urdu',
            'review_count' => '7',
            'price' => '50', 
        ],
        [
            'image' => asset('assets/images/tour-guide/7.svg'), 
            'name' => 'Mohammed Othman',
            'emirate' =>  'Abu Dhabi',
            'Experience' => '14', 
            'languages' => 'Arabic,Urdu',
            'review_count' => '7',
            'price' => '50', 
],
        [
            'image' => asset('assets/images/tour-guide/8.svg'), 
            'name' => 'Mohammed Othman',
            'emirate' =>  'Abu Dhabi',
            'Experience' => '14', 
            'languages' => 'Arabic,Urdu',
            'review_count' => '7',
            'price' => '50', 
        ]

    ];


@endphp

<div class="row px-5 _tour_guide_profile">
    <div class="col-md-6 d-flex justify-content-start  align-items-cetner pl-5">
        <div class="_location">
            <h4 class="mb-2 font-2 display-20 color-blue">Location</h4>
            <select class="border rounded w-100">
                <option value="dubai" class="font-5 display-16 color-blue"> Dubai </option>
                <option value="abudhabi" class="font-5 display-16 color-blue"> Abu Dhabi </option>
                <option value="sharjah" class="font-5 display-16 color-blue"> Sharjah </option>
                <option value="Ajman" class="font-5 display-16 color-blue"> Ajman </option>
            </select>
        </div>

        <div class="_location">
            <h4 class="mb-2 font-2 display-20 color-blue">Language</h4>
            <select class="border rounded w-100">
                <option value="dubai" class="font-5 display-16 color-blue"> English </option>
                <option value="abudhabi" class="font-5 display-16 color-blue"> Arabic </option>
            </select>
        </div>

        <div class="_location">
            <h4 class="mb-2 font-2 display-20 color-blue"> Price </h4>
            <div class="range_container">
                <div class="_input w-100 d-flex justify-content-start align-items-center">
                    <input type="number" id="min-value" min="0" placeholder="0 AED" readonly value="0" class="w-100 mr-4">
                    <input type="number" id="max-value" max="100" placeholder="1000 AED" readonly class="w-100">
                </div>
                <div class="sliders_control mt-4">
                  <input id="fromSlider" type="range" value="120" min="50" max="350" steps="10" />
                  <input id="toSlider" type="range" value="260" min="50" max="350" steps="10" />
                </div>
                <div id="scale" class="scale" data-steps="50"></div>
              </div>
        </div>

    </div>
    <div class="col-md-6">
        <div class="_no_of_people">
            <h4 class="mb-2 font-2 display-20 color-blue"> Number of people </h4>
            <div class="number_of_peopled d-flex justify-content-start align-items-start">
                <div class="_tabs me-2">
                    <button class="font-4 display-16 color-black">indidual</button>
                    <button class="font-4 display-16 color-black"> 2 peoples </button>
                    <button class="font-4 display-16 color-black"> Group </button>
                    <button class="font-4 display-16 color-black"> Couple </button>
                </div>

                <div class="_tabs_with_icon">
                    <div class="_tabs d-flex">
                        <a class="d-flex justify-content-between align-items-center flex-column me-2 font-4 display-14 color-black">
                            <img src="{{ asset('assets/images/tour-guide/historic.svg') }}" alt="historic" class="border px-3 py-2 rounded"/>
                            historic 
                        </a>
                        <a class="d-flex justify-content-between align-items-center flex-column me-2 font-4 display-14 color-black"> 
                            <img src="{{ asset('assets/images/tour-guide/natural.svg') }}" alt="natural" class="border px-3 py-2 rounded"/>
                            natural 
                        </a>
                        <a class="d-flex justify-content-between align-items-center flex-column me-2 font-4 display-14 color-black"> 
                            <img src="{{ asset('assets/images/tour-guide/technology.svg') }}" alt="technology" class="border px-3 py-2 rounded"/>
                            technology
                        </a>
                        <a class="d-flex justify-content-between align-items-center flex-column me-2 font-4 display-14 color-black"> 
                            <img src="{{ asset('assets/images/tour-guide/family.svg') }}" alt="family" class="border px-3 py-2 rounded"/>
                            family
                        </a>
                        <a class="d-flex justify-content-between align-items-center flex-column me-2 font-4 display-14 color-black"> 
                            <img src="{{ asset('assets/images/tour-guide/Customize.svg') }}" alt="Customize" class="border px-3 py-2 rounded"/>
                            Customize
                        </a>
                </div>

            </div>
        </div>
    </div>
</div>

<hr/>

<div class="row px-5">
    @forelse($tourGuides as $guide)
        <div class="col-md-4 my-4 px-4 pl-0 cursor-pointer" href="route('home')">
            <div class="row _tour_guide_grid">
                <div class="col-md-5 pe-0 image position-relative">
                    <a href="{{ route('tour-guides-details') }}">
                        <img src="{{ $guide['image'] }}" alt="tour guide" width="100%" />
                        <p class="_price font-4 display-12 color-white">
                           {{ $guide['price'] }} <br/> per hour 
                        </p>
                    </a>
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
    <x-pagination/>
</div>


@push('scripts')

    <script>

        document.addEventListener('DOMContentLoaded', () => {

        const COLOR_TRACK = "#CBD5E1";
        const COLOR_RANGE = "#11004A";

        const fromSlider = document.querySelector('#fromSlider');
        const toSlider = document.querySelector('#toSlider');
        const fromTooltip = document.querySelector('#fromSliderTooltip');
        const toTooltip = document.querySelector('#toSliderTooltip');
        const scale = document.getElementById('scale');

        const MIN = parseInt(fromSlider.getAttribute('min')); // scale will start from min value (first range slider)
        const MAX = parseInt(fromSlider.getAttribute('max')); // scale will end at max value (first range slider)
        const STEPS = parseInt(scale.dataset.steps); // update the data-steps attribute value to change the scale points

        function controlFromSlider(fromSlider, toSlider, fromTooltip, toTooltip) {
            const [from, to] = getParsed(fromSlider, toSlider);
            fillSlider(fromSlider, toSlider, COLOR_TRACK, COLOR_RANGE, toSlider);
            if (from > to) {
                fromSlider.value = to;
            }
            setTooltip(fromSlider, fromTooltip);
        }

        function controlToSlider(fromSlider, toSlider, fromTooltip, toTooltip) {
            const [from, to] = getParsed(fromSlider, toSlider);
            fillSlider(fromSlider, toSlider, COLOR_TRACK, COLOR_RANGE, toSlider);
            setToggleAccessible(toSlider);
            if (from <= to) {
                toSlider.value = to;
            } else {
                toSlider.value = from;
            }
            setTooltip(toSlider, toTooltip);
        }

        function getParsed(currentFrom, currentTo) {
            const from = parseInt(currentFrom.value, 10);
            const to = parseInt(currentTo.value, 10);
            return [from, to];
        }

        function fillSlider(from, to, sliderColor, rangeColor, controlSlider) {
            const rangeDistance = to.max - to.min;
            const fromPosition = from.value - to.min;
            const toPosition = to.value - to.min;
            controlSlider.style.background = `linear-gradient(
            to right,
            ${sliderColor} 0%,
            ${sliderColor} ${(fromPosition) / (rangeDistance) * 100}%,
            ${rangeColor} ${((fromPosition) / (rangeDistance)) * 100}%,
            ${rangeColor} ${(toPosition) / (rangeDistance) * 100}%, 
            ${sliderColor} ${(toPosition) / (rangeDistance) * 100}%, 
            ${sliderColor} 100%)`;
        }

        function setToggleAccessible(currentTarget) {
            const toSlider = document.querySelector('#toSlider');
            if (Number(currentTarget.value) <= 0) {
                toSlider.style.zIndex = 2;
            } else {
                toSlider.style.zIndex = 0;
            }
        }

        function setTooltip(slider, tooltip) {
            const value = slider.value;
            tooltip.textContent = `${value}`;
            const thumbPosition = (value - slider.min) / (slider.max - slider.min);
            const percent = thumbPosition * 100;
            const markerWidth = 20; // Width of the marker in pixels
            const offset = (((percent - 50) / 50) * markerWidth) / 2;
            tooltip.style.left = `calc(${percent}% - ${offset}px)`;
        }

        function createScale(min, max, step) {
        
            const range = max - min;
            const steps = range / step;
            for (let i = 0; i <= steps; i++) {
                const value = min + (i * step);
                const percent = (value - min) / range * 100;
                const marker = document.createElement('div');
                marker.style.left = `${percent}%`;
                marker.textContent = `${value}`;
                scale.appendChild(marker);
            }
        }

        // events
        fromSlider.oninput = () => controlFromSlider(fromSlider, toSlider, fromTooltip, toTooltip);
        toSlider.oninput = () => controlToSlider(fromSlider, toSlider, fromTooltip, toTooltip);

        // Initial load
        fillSlider(fromSlider, toSlider, COLOR_TRACK, COLOR_RANGE, toSlider);
        setToggleAccessible(toSlider);
        setTooltip(fromSlider, fromTooltip);
        setTooltip(toSlider, toTooltip);
        createScale(MIN, MAX, STEPS);
    });

    </script>
@endpush