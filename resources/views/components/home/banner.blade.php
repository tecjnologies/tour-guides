@push('css')
    <link rel="stylesheet" href="{{ asset('assets/css/banner.css') }}">
@endpush
<section class="relative bg-cover bg-center h-100 _banner py-5 mx-5" style="background-image: url({{ $banner->image }});">
    <div class="relative flex flex-col items-center justify-center h-full text-white text-center p-5">
        <h2 class="font-2 display-26 color-white mb-3"> {{ $banner->title }} </h2>
        <p class="font-5  display-20 color-white mb-md-4"> {{ $banner->sub_heading }} </p>
        <div class="bg-white  rounded shadow-md my-5">
            @include('partial.errors')
            @include('partial.successMessage')
            <ul class="nav nav-tabs _banner_tabs" id="bannerFormTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active border-0 d-flex align-items-center" id="byPlace-tab"
                        data-bs-toggle="tab" data-bs-target="#byPlace" type="button" role="tab"
                        aria-controls="byPlace" aria-selected="true">
                        <img src="{{ asset('assets/images/icons/by-place.svg') }}" alt="Search By Place"
                            class="me-3" />
                        {{ __('website.BUTTONS.BY_PLACE') }}
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link d-flex align-items-center border-0" id="byTourGuide-tab"
                        data-bs-toggle="tab" data-bs-target="#byTourGuide" type="button" role="tab"
                        aria-controls="byTourGuide" aria-selected="false">
                        <img src="{{ asset('assets/images/icons/by-tour-guide.svg') }}" alt="search by tour guide"
                            class="me-3" />
                        {{ __('website.BUTTONS.BY_TOUR_GUIDE') }}
                    </button>
                </li>
            </ul>
            <div class="tab-content" id="bannerFormTabContent">
                <div class="tab-pane fade show active" id="byPlace" role="tabpanel" aria-labelledby="byPlace-tab">
                    <form action="{{ route('search.tour-guide') }}" method="post" class="p-6">
                        @csrf

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                @if ($places)
                                    <select name="place_id" id="place_id"
                                        class="form-control w-full p-3 rounded-md border border-gray-300">
                                        @forelse($places as $place )
                                        <option value="{{ $place->id }}" class="font-5 display-16 color-blue"> {{ $place->name }} </option>
                                        @empty
                                        @endforelse
                                    </select>
                                @endif
                            </div>
                            <div class="col-md-3 mb-3">
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
                            </div>
                            <div class="col-md-3 mb-3">
                                <select name="no_of_people" class="w-full p-3 rounded-md border border-gray-300">
                                    <option value="" class="font-5 displaty-14 color-blue">Select Passengers
                                    </option>
                                    <option value="1" class="font-5 displaty-14 color-blue">1</option>
                                    <option value="2" class="font-5 displaty-14 color-blue">2</option>
                                    <option value="3" class="font-5 displaty-14 color-blue">3</option>
                                    <option value="4" class="font-5 displaty-14 color-blue">4+</option>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <select name="place_type" id="place_type"
                                    class="form-control w-full p-3 rounded-md border border-gray-300">
                                    @if ($placeTypes)
                                        @forelse($placeTypes as  $placeType)
                                            <option value="{{ $placeType->id }}" class="font-5 display-16 color-blue">
                                                {{ $placeType->name }} </option>
                                        @empty
                                        @endforelse
                                    @endif
                                </select>
                            </div>
                            <div class="col-md-6">
                                <div  class="_start_end_date d-flex justify-content-between align-items-center p-2 rounded-md border border-gray-300">
                                    <label for="datepicker">
                                        <input type="text" id="start_datepicker1" placeholder="start date"
                                            autocomplete="off" name="start_date"
                                            class="date w-full p-2 _date  border-0 form-control border-right">
                                    </label>

                                    <label>
                                        |
                                    </label>

                                    <label for="datepicker">
                                        <input type="text" id="end_datepicker1" placeholder="end date"
                                            autocomplete="off" name="end_date"
                                            class="date w-full p-2 _date  border-0 form-control">
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <button type="submit"
                                    class="w-100 py-3 rounded-md font-4 display-16 color-white bg-blue">
                                    {{ __('website.BUTTONS.SEARCH') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="byTourGuide" role="tabpanel" aria-labelledby="byTourGuide-tab">
                    <form action="{{ route('search.tour-guide') }}" method="post" class="p-6">
                        @csrf
                        <div class="container">
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <div class="flex border rounded _form_hourly_day_toggle">
                                        <button type="button"
                                            class="toggle-btn flex-1 rounded-l-md font-5 p-2 displaty-14 color-blue active">Hourly</button>
                                        <button type="button"
                                            class="toggle-btn flex-1 rounded-r-md font-5 p-2 displaty-14 color-blue">Per
                                            Day</button>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <select name="emirates" class="w-full p-3 rounded-md border border-gray-300">
                                        <option value="" class="font-5 displaty-14 color-blue">Select Emirate
                                        </option>
                                        <option value="abu_dhabi" class="font-5 displaty-14 color-blue"> Abu Dhabi
                                        </option>
                                        <option value="dubai" class="font-5 displaty-14 color-blue"> Dubai</option>
                                        <option value="sharjah" class="font-5 displaty-14 color-blue"> Sharjah
                                        </option>
                                        <option value="umm_al_quwain" class="font-5 displaty-14 color-blue"> Umm al
                                            quwain </option>
                                        <option value="ajman" class="font-5 displaty-14 color-blue"> Ajman </option>
                                        <option value="ras_al_khaimah" class="font-5 displaty-14 color-blue"> Ras al
                                            Khaimah </option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <select name="no_of_people" class="w-full p-3 rounded-md border border-gray-300">
                                        <option value="" class="font-5 displaty-14 color-blue"> Number of
                                            passengers ( Individual or Group) </option>
                                        <option value="1" class="font-5 displaty-14 color-blue"> Individual
                                        </option>
                                        <option value="2" class="font-5 displaty-14 color-blue"> Group </option>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-3">
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
                                </div>
                                <div class="col-md-3 mb-3">
                                    <input type="text" name="age" required placeholder="age"
                                        class="w-full p-3 rounded-md border border-gray-300">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <select name="no_of_people" class="w-full p-3 rounded-md border border-gray-300">
                                        <option value="" class="font-5 displaty-14 color-blue"> Trip Type
                                        </option>
                                        <option value="1" class="font-5 displaty-14 color-blue"> Individual
                                        </option>
                                        <option value="2" class="font-5 displaty-14 color-blue"> Group </option>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <select name="no_of_people" class="w-full p-3 rounded-md border border-gray-300">
                                        <option value="" class="font-5 displaty-14 color-blue"> Gender </option>
                                        <option value="1" class="font-5 displaty-14 color-blue"> Male </option>
                                        <option value="2" class="font-5 displaty-14 color-blue"> Female </option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div
                                        class="_start_end_date d-flex justify-content-between align-items-center p-2 rounded-md border border-gray-300">
                                        <label for="datepicker">
                                            <input type="text" id="start_datepicker" placeholder="start date"
                                                autocomplete="off" name="start_date"
                                                class="date w-full p-2 _date  border-0 form-control border-right">
                                        </label>

                                        <label>
                                            |
                                        </label>

                                        <label for="datepicker">
                                            <input type="text" id="end_datepicker" placeholder="end date"
                                                autocomplete="off" name="end_date"
                                                class="date w-full p-2 _date  border-0 form-control">
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <button type="submit"
                                        class="w-100 py-3 rounded-md font-4 display-16 color-white bg-blue">
                                        {{ __('website.BUTTONS.SEARCH') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div
                class="mt-3 bg-gray d-flex justify-content-between align-items-center px-3 py-3 rounded _call_to_action">
                <div class="text-left font-5 display-14 color-blue">
                    {{ __('website.LABELS.MEET_EXPORTS_LABEL') }}
                </div>
                <a class="text-right font-5 display-14 color-blue d-flex justify-content-between align-items-center"
                    href="{{ route('tour-guides-profile') }}">
                    {{ __('website.LABELS.MEET_EXPORTS') }}
                    <img src="{{ asset('assets/images/icons/arrow-primary.svg') }}" alt="arrow-right"
                        class="arrow-white ml-4" />
                </a>
            </div>
        </div>
    </div>
</section>


@push('scripts')
    <script>
        $(function() {
            $(".date").datepicker({
                dateFormat: "dd-mm-yy",
                duration: "fast"
            });
        });

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
    </script>
@endpush
