@push('css')
    <link rel="stylesheet" href="{{ asset('assets/css/tour-guide.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/banner.css') }}">
@endpush
<div class="container-fluid">
    <div class="row mx-4 _tour_guide">
        <div class="col-md-9">
            <div class="row slick-slide">
                @forelse($tourGuides as $guide)
                    @php
                        $currentCurrency = session('currency', config('currency.default'));
                        $priceInCurrency = \App\Helpers\CurrencyHelper::convert($guide->price, $currentCurrency);
                    @endphp
                    <div class="col-xl-3 col-lg-3 col-md-4 mb-5 tourguide-slider">
                            <div class="_wrapper position-relative">
                                <div class="image">
                                    <img src="{{ $guide->image }}" alt="tour guide" width="100%" />
                                </div>
                                <button href="javascript:void(0);" class="toggle-favorite"
                                    data-guide-id="{{ $guide->id }}">
                                    @if ($guide->is_favoriteGuide)
                                        <img src="{{ asset('assets/images/icons/favourites.svg') }}" alt="like-dislike"
                                            class="_like_dislike" />
                                    @else
                                        <img src="{{ asset('assets/images/icons/favourites-gray.svg') }}"
                                            alt="like-dislike" class="_like_dislike" />
                                    @endif
                                </button>
                                <div class="title">
                                    <h3 class="">
                                        {{ substr($guide->name, 0, 15) }}
                                    </h3>
                                </div>
                                <div class="overlay">
                                    <div class="_content">
                                        <h3 class="color-white">
                                            {{ substr($guide->name, 0, 15) }}
                                        </h3>
                                        <p class="font-4 display-14 color-white">
                                            {{ trans_choice('website.LABELS.EMIRATE', 1) }} : {{ $guide->address }}
                                        </p>
                                        <p class="font-4 display-14 color-white">
                                            {{ trans_choice('website.LABELS.LANGUAGE', 2) }}:
                                            @if ($guide->guideLanguages)
                                                @php
                                                    $languages = $guide->guideLanguages;
                                                    $extraLanguagesCount = $languages->count() - 1;
                                                @endphp
                                                @foreach ($languages->take(1) as $language)
                                                    <span>{{ $language->name }}</span>
                                                @endforeach

                                                @if ($extraLanguagesCount > 1)
                                                    <span>+{{ $extraLanguagesCount }}
                                                        {{ trans_choice('website.LABELS.LANGUAGE', 2) }} </span>
                                                @endif
                                            @endif
                                        </p>
                                        <img src="{{ asset('assets/images/icons/stars.svg') }}" alt="Arrow right"
                                            class="text-cetner mx-auto pt-2" />
                                    </div>

                                    <div class="buttons">
                                        <div class="_button">
                                            <button type="button" class="btn color-white" data-bs-toggle="modal"
                                            data-bs-target="#exampleModalCenter">
                                                Start the Adventure
                                            </button>
                                        </div>
                                        <div class="spacer my-3"></div>
                                        <div class="_button">
                                            <a class="w-100 btn color-white" href="{{ route('show.tourguide', $guide->id) }}">
                                                Details
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                    </div>
                @empty
                    <p>No Data Found!</p>
                @endforelse
            </div>
        </div>
        <div class="col-md-3 _tour_guide_profile border rounded">
            @include('partial.errors')
            @include('partial.successMessage')
            <form id="tour-guide-form" action="{{ route('search.tour-guide') }}" method="post">
                @csrf
                <div class="spacer mt-4"></div>
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-2 font-2 display-20 color-blue me-3"> {{ __('website.LABELS.FILTERS') }} </h4>
                    <button id="resetBtn" type="button"
                        class="rounded px-5 py-2 my-3 color-secondary border-secondary">
                        {{ __('website.LABELS.RESET_ALL') }}
                    </button>
                </div> 
                <div class="spacer mt-3"></div>
                <select name="emirates" class="w-full p-3 rounded-md border border-gray-300">
                    <option value="" class="font-5 displaty-14 color-blue">Select Emirate</option>
                    <option value="abu_dhabi" class="font-5 displaty-14 color-blue"> Abu Dhabi </option>
                    <option value="dubai" class="font-5 displaty-14 color-blue"> Dubai</option>
                    <option value="sharjah" class="font-5 displaty-14 color-blue"> Sharjah </option>
                    <option value="umm_al_quwain" class="font-5 displaty-14 color-blue"> Umm al quwain
                    </option>
                    <option value="ajman" class="font-5 displaty-14 color-blue"> Ajman </option>
                    <option value="ras_al_khaimah" class="font-5 displaty-14 color-blue"> Ras al Khaimah
                    </option>
                </select>
                <div class="spacer m-4"></div>

                <div class="flex border rounded _form_hourly_day_toggle">
                    <button type="button"
                        class="toggle-btn flex-1 rounded-l-md font-5 p-2 displaty-14 color-blue active">Hourly</button>
                    <button type="button"
                        class="toggle-btn flex-1 rounded-r-md font-5 p-2 displaty-14 color-blue">Per
                        Day</button>
                </div>

                <div class="spacer m-4"></div>
                <select name="no_of_people" class="w-full p-3 rounded-md border border-gray-300">
                    <option value="" class="font-5 displaty-14 color-blue"> Number of
                        passengers ( Individual or Group) </option>
                    <option value="1" class="font-5 displaty-14 color-blue"> Individual
                    </option>
                    <option value="2" class="font-5 displaty-14 color-blue"> Group </option>
                </select>
                
                <div class="spacer m-4"></div>
                <select name="experience"
                    class="form-control w-full p-3 rounded-md border border-gray-300">
                    <option value="1" class="font-5 display-16 color-blue"> Less than 1 Years
                    </option>
                    <option value="3" class="font-5 display-16 color-blue"> 1-3 Years
                    </option>
                    <option value="6" class="font-5 display-16 color-blue"> 4-6 Years
                    </option>
                    <option value="10" class="font-5 display-16 color-blue"> 6-10 Years
                    </option>
                    <option value="15" class="font-5 display-16 color-blue"> More than 10
                        Years </option>
                </select>
                
                <div class="spacer m-4"></div>
                <input type="text" name="age" required placeholder="age"  class="w-full p-3 rounded-md border border-gray-300">

                <div class="spacer m-4"></div>
                <select name="no_of_people" class="w-full p-3 rounded-md border border-gray-300">
                    <option value="" class="font-5 displaty-14 color-blue"> Trip Type
                    </option>
                    <option value="1" class="font-5 displaty-14 color-blue"> Individual
                    </option>
                    <option value="2" class="font-5 displaty-14 color-blue"> Group </option>
                </select>

                <div class="spacer m-4"></div>
                <select name="no_of_people" class="w-full p-3 rounded-md border border-gray-300">
                    <option value="" class="font-5 displaty-14 color-blue"> Gender </option>
                    <option value="1" class="font-5 displaty-14 color-blue"> Male </option>
                    <option value="2" class="font-5 displaty-14 color-blue"> Female </option>
                </select>
                
                <div class="spacer m-4"></div>
                <label for="datepicker" class="w-100">
                    <input type="text" id="date" placeholder="Date"
                        autocomplete="off" name="date"
                        class="date w-full py-3  _date  form-control border-right">
                </label>
    
                <div class="spacer m-4"></div>
                <div class="submit">
                    <button type="submit"  class="rounded w-100 py-2 bg-blue color-white">
                       Apply All
                    </button>
                </div>
                
            </form>
        </div>
    </div>
</div>

<x-website.book-guide />

@push('scripts')
    <script>

        // document.addEventListener('DOMContentLoaded', () => {

        //     const COLOR_TRACK = "#CBD5E1";
        //     const COLOR_RANGE = "#11004A";

        //     const fromSlider = document.querySelector('#fromSlider');
        //     const toSlider = document.querySelector('#toSlider');
        //     const minValueInput = document.querySelector('#min-value');
        //     const maxValueInput = document.querySelector('#max-value');
        //     const scale = document.getElementById('scale');

        //     const MIN = parseInt(fromSlider.getAttribute('min'));
        //     const MAX = parseInt(fromSlider.getAttribute('max'));
        //     const STEPS = parseInt(scale.dataset.steps);

        //     function controlFromSlider(fromSlider, toSlider) {
        //         const [from, to] = getParsed(fromSlider, toSlider);
        //         fillSlider(fromSlider, toSlider, COLOR_TRACK, COLOR_RANGE, toSlider);
        //         if (from > to) {
        //             fromSlider.value = to;
        //         }
        //         minValueInput.placeholder = `${from} AED`;
        //         minValueInput.value = from;
        //     }

        //     function controlToSlider(fromSlider, toSlider) {
        //         const [from, to] = getParsed(fromSlider, toSlider);
        //         fillSlider(fromSlider, toSlider, COLOR_TRACK, COLOR_RANGE, toSlider);
        //         if (from <= to) {
        //             toSlider.value = to;
        //         } else {
        //             toSlider.value = from;
        //         }
        //         maxValueInput.placeholder = `${to} AED`;
        //         maxValueInput.value = to;
        //     }

        //     function getParsed(currentFrom, currentTo) {
        //         const from = parseInt(currentFrom.value, 10);
        //         const to = parseInt(currentTo.value, 10);
        //         return [from, to];
        //     }

        //     function fillSlider(from, to, sliderColor, rangeColor, controlSlider) {
        //         const rangeDistance = to.max - to.min;
        //         const fromPosition = from.value - to.min;
        //         const toPosition = to.value - to.min;
        //         controlSlider.style.background = `linear-gradient(
        //         to right,
        //         ${sliderColor} 0%,
        //         ${sliderColor} ${(fromPosition) / (rangeDistance) * 100}%,
        //         ${rangeColor} ${((fromPosition) / (rangeDistance)) * 100}%,
        //         ${rangeColor} ${(toPosition) / (rangeDistance) * 100}%, 
        //         ${sliderColor} ${(toPosition) / (rangeDistance) * 100}%, 
        //         ${sliderColor} 100%)`;
        //     }

        //     function createScale(min, max, step) {
        //         const range = max - min;
        //         const steps = range / step;
        //         for (let i = 0; i <= steps; i++) {
        //             const value = min + (i * step);
        //             const percent = (value - min) / range * 100;
        //             const marker = document.createElement('div');
        //             marker.style.left = `${percent}%`;
        //             marker.textContent = `${value}`;
        //             scale.appendChild(marker);
        //         }
        //     }

        //     fromSlider.oninput = () => controlFromSlider(fromSlider, toSlider);
        //     toSlider.oninput = () => controlToSlider(fromSlider, toSlider);

        //     fillSlider(fromSlider, toSlider, COLOR_TRACK, COLOR_RANGE, toSlider);

        //     minValueInput.placeholder = `${fromSlider.value} AED`;
        //     minValueInput.value = fromSlider.value;
        //     maxValueInput.placeholder = `${toSlider.value} AED`;
        //     maxValueInput.value = toSlider.value;
        // });

        // document.addEventListener('DOMContentLoaded', () => {
        //     const buttons = document.querySelectorAll('.no_people');
        //     const hiddenInput = document.getElementById('selectedNoofPeople');
        //     buttons.forEach(button => {
        //         button.addEventListener('click', () => {
        //             buttons.forEach(btn => btn.classList.remove('selected'));
        //             button.classList.add('selected');
        //             hiddenInput.value = button.getAttribute('data-value');
        //         });
        //     });
        // });

        // document.addEventListener('DOMContentLoaded', () => {
        //     const buttons = document.querySelectorAll('.place_type');
        //     const hiddenInput = document.getElementById('selectedPlaceType');
        //     buttons.forEach(button => {
        //         button.addEventListener('click', () => {
        //             buttons.forEach(btn => btn.classList.remove('selected'));
        //             button.classList.add('selected');
        //             hiddenInput.value = button.getAttribute('data-value');
        //         });
        //     });
        // });

        const toggleButtons = document.querySelectorAll('.toggle-btn');
        toggleButtons.forEach(button => {
            button.addEventListener('click', () => {
                if (button.classList.contains('active')) {} else {
                    toggleButtons.forEach(btn => {
                        btn.classList.remove('active');
                    });
                    button.classList.add('active');
                }
            });
        });

        document.getElementById('resetBtn').addEventListener('click', function() {
            var form = document.getElementById('tour-guide-form');
            form.reset();
        });

    </script>
@endpush
