<div class="row px-5 _tour_guide_profile">
    @include('partial.errors')
    @include('partial.successMessage')
    
    
    <form id="tour-guide-form" action="{{ route('search.tour-guide') }}" method="post">
        @csrf
        <div class="border-bottom d-flex justify-content-start align-items-center py-3 my-4">
            <h4 class="mb-2 font-2 display-20 color-blue me-3">Filters</h4>
            <button id="resetBtn" type="button" class="rounded px-5 py-2 my-3 color-secondary border-secondary"> 
                Reset all
            </button>
        </div>        
        <div class="row">
                <div class="col-md _location">
                    <h4 class="mb-2 font-2 display-20 color-blue">Location</h4>
                    <select name="place_id" class="border rounded w-100">
                        @if ($places)
                            @forelse($places as  $place)
                                <option value="{{ $place->id }}" class="font-5 display-16 color-blue"> {{ $place->name }} </option>
                            @empty
                            @endforelse
                        @endif
                    </select>
                </div>
        
                <div class="col-md _location">
                    <h4 class="mb-2 font-2 display-20 color-blue">Language</h4>
                    <select name="language_id" class="border rounded w-100">
                        @if ($languages)
                            @forelse($languages as  $language)
                                <option value="{{ $language->id }}" class="font-5 display-16 color-blue"> {{ $language->name }} </option>
                            @empty
                            @endforelse
                        @endif
                    </select>
                </div>

                @php 
                    $maxPrice = App\Models\Guide::max('price');
                @endphp
                <div class="col-md _location">
                    <h4 class="mb-2 font-2 display-20 color-blue"> Price </h4>
                    <div class="range_container">
                        <div class="_input w-100 d-flex justify-content-start align-items-center">
                            <input type="number" id="min-value" min="0" placeholder="0 AED"  value="0" class="w-100 mr-4" name="min_price">
                            <input type="number" id="max-value"  max="{{ $maxPrice }}" placeholder="{{ $maxPrice }} AED" 
                                    class="w-100" name="max_price">
                        </div>
                        <div class="sliders_control mt-4">
                            <input id="fromSlider" type="range" value="0" min="0" max="{{ $maxPrice }}" step="10" />
                            <input id="toSlider" type="range" value="{{ $maxPrice }}" min="0" max="{{ $maxPrice }}" step="10" />
                        </div>
                        <div id="scale" class="scale" data-steps="50"></div>
                    </div>
                </div>
                
                <div class="col-md _location _no_of_people">
                    <h4 class="mb-2 font-2 display-20 color-blue"> Number of people </h4>
                    <div class="number_of_peopled">
                        <select name="place_id" class="border rounded w-100">
                            <option value="1" class="font-5 display-16 color-blue"> Individual </option>
                            <option value="2" class="font-5 display-16 color-blue"> People </option>
                            <option value="3" class="font-5 display-16 color-blue"> Group </option>
                            <option value="4" class="font-5 display-16 color-blue"> Couple </option>
                        </select>
                    </div>
                </div>

                <div class="col-md _location _place_type mx-3">
                    <h4 class="mb-2 font-2 display-20 color-blue"> Place Type </h4>
                    <div class="_tabs">
                        <div class="_tabs me-2">

                            <select name="place_id" class="border rounded w-100">
                                @if ($placeTypes)
                                    @forelse($placeTypes as  $placeType)
                                        <option value="{{ $placeType->id }}" class="font-5 display-16 color-blue"> {{ $placeType->name }} </option>
                                    @empty
                                    @endforelse
                                @endif
                            </select>
                            <input type="hidden" name="place_type" id="selectedPlaceType" value="">
                        </div>
                    </div>
                </div>

                <div class="">
                    <button  type="submit" class="rounded px-5 py-2 bg-blue color-white d-flex justify-content-center align-items-center ml-auto"> 
                        search
                   </button>
                </div>
        </div>
    </form>
</div>
<hr/>
<div class="row px-5">
   @forelse($tourGuides as $guide)
    <div class="col-md-4 my-4 px-4 pl-0 cursor-pointer" href="route('home')">
        <a href="{{ route('show.tourguide', $guide->id) }}">
            <div class="row _tour_guide_grid">
                <div class="col-md-5 pe-0 image position-relative">
                    <img src="{{ $guide->image }}" alt="tour guide" width="100%" />                        
                    <p class="_price font-4 display-12 color-white">
                        {{ $guide->price }} AED <br/> per hour 
                    </p>
                </div>
                <div class="_tour_content col-md-7 border-top border-end border-bottom rounded-end d-flex justify-content-center
                             align-items-center flex-column">
                    <div class="detail pt-2">
                        <h3 class="font-2 display-20 color-blue"> {{ $guide->name }}  </h3>
                        <p class="font-4 display-14 color-black py-3">Emirate: {{ $guide->address }} </p>
                        <p class="font-4 display-14 color-black">Experience: {{ $guide->experience }}  years</p>
                        <p class="font-4 display-14 color-black py-3">Languages: 
                            @if($guide->guideLanguages)
                                @php
                                    $languages = $guide->guideLanguages;
                                    $extraLanguagesCount = $languages->count() - 2;
                                @endphp
                                @foreach($languages->take(2) as $language)
                                    <span>{{ $language->name }}</span>
                                @endforeach
                        
                                @if($extraLanguagesCount > 0)
                                    <span>+{{ $extraLanguagesCount }} Languages </span>
                                @endif
                            @endif
                        </p>
                    </div>
                    <div class="row w-100 border-top ml-2 py-2">
                        <div class="col-md-6 text-center border-end">
                            <p class="font-4 display-14 color-blue">Reviews</p>
                            <p class="font-4 display-14 color-secondary pt-2"> {{ $guide->reviews_count }} </p>
                        </div>
                        <div class="col-md-6 text-center">
                            <p class="font-4 display-14 color-blue">Ratings</p>
                            <img src="{{ asset('assets/images/icons/stars.svg') }}" alt="Arrow right" class="text-cetner mx-auto pt-2" />
                        </div>
                    </div>
                </div>
            </div>  
        </a>
    </div>
    @empty 
    <p>No Data Found!</p>
    @endforelse
</div>


@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            
        const COLOR_TRACK = "#CBD5E1";
        const COLOR_RANGE = "#11004A";

        const fromSlider = document.querySelector('#fromSlider');
        const toSlider = document.querySelector('#toSlider');
        const minValueInput = document.querySelector('#min-value');
        const maxValueInput = document.querySelector('#max-value');
        const scale = document.getElementById('scale');

        const MIN = parseInt(fromSlider.getAttribute('min'));
        const MAX = parseInt(fromSlider.getAttribute('max'));
        const STEPS = parseInt(scale.dataset.steps);

        function controlFromSlider(fromSlider, toSlider) {
            const [from, to] = getParsed(fromSlider, toSlider);
            fillSlider(fromSlider, toSlider, COLOR_TRACK, COLOR_RANGE, toSlider);
            if (from > to) {
                fromSlider.value = to;
            }
            minValueInput.placeholder = `${from} AED`;
            minValueInput.value = from;
        }

        function controlToSlider(fromSlider, toSlider) {
            const [from, to] = getParsed(fromSlider, toSlider);
            fillSlider(fromSlider, toSlider, COLOR_TRACK, COLOR_RANGE, toSlider);
            if (from <= to) {
                toSlider.value = to;
            } else {
                toSlider.value = from;
            }
            maxValueInput.placeholder = `${to} AED`;
            maxValueInput.value = to;
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

        fromSlider.oninput = () => controlFromSlider(fromSlider, toSlider);
        toSlider.oninput = () => controlToSlider(fromSlider, toSlider);

        fillSlider(fromSlider, toSlider, COLOR_TRACK, COLOR_RANGE, toSlider);
        
        minValueInput.placeholder = `${fromSlider.value} AED`;
        minValueInput.value = fromSlider.value;
        maxValueInput.placeholder = `${toSlider.value} AED`;
        maxValueInput.value = toSlider.value;
        });

        document.addEventListener('DOMContentLoaded', () => {
            const buttons = document.querySelectorAll('.no_people');
            const hiddenInput = document.getElementById('selectedNoofPeople');
            buttons.forEach(button => {
                button.addEventListener('click', () => {
                    buttons.forEach(btn => btn.classList.remove('selected')); 
                    button.classList.add('selected');
                    hiddenInput.value = button.getAttribute('data-value');
                });
            });
        });

        document.addEventListener('DOMContentLoaded', () => {
            const buttons = document.querySelectorAll('.place_type');
            const hiddenInput = document.getElementById('selectedPlaceType');
            buttons.forEach(button => {
                button.addEventListener('click', () => {
                    buttons.forEach(btn => btn.classList.remove('selected')); 
                    button.classList.add('selected');
                    hiddenInput.value = button.getAttribute('data-value');
                });
            });
        });

        document.getElementById('resetBtn').addEventListener('click', function() {
            var form = document.getElementById('tour-guide-form');
            form.reset();
            document.getElementById('fromSlider').value = 0;
            document.getElementById('toSlider').value = {{ $maxPrice }};
        });

    </script>
@endpush