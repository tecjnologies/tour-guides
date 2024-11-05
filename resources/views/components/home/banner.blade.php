@push('css')
    <link rel="stylesheet" href="{{ asset('assets/css/banner.css') }}">
@endpush
<section class="relative bg-cover bg-center h-100 _banner py-5 mx-5" style="background-image: url({{ $banner->image  }});">
    <div class="relative flex flex-col items-center justify-center h-full text-white text-center p-5">
        <h2 class="font-2 display-26 color-white mb-3"> {{ $banner->title }} </h2>
        <p class="font-5  display-20 color-white mb-md-4"> {{ $banner->sub_heading  }} </p>
        <div class="bg-white  rounded shadow-md my-5">
            @include('partial.errors')
            @include('partial.successMessage')
                <ul class="nav nav-tabs _banner_tabs" id="bannerFormTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active border-0 d-flex align-items-center" id="byPlace-tab" data-bs-toggle="tab" data-bs-target="#byPlace" type="button" role="tab" 
                            aria-controls="byPlace" aria-selected="true"> 
                            <img src="{{ asset('assets/images/icons/by-place.svg') }}" alt="Search By Place" class="me-3" />
                            {{ __('website.BUTTONS.BY_PLACE') }}
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link d-flex align-items-center border-0" id="byTourGuide-tab" data-bs-toggle="tab" data-bs-target="#byTourGuide" type="button" role="tab" 
                            aria-controls="byTourGuide" aria-selected="false"> 
                            <img src="{{ asset('assets/images/icons/by-tour-guide.svg') }}" alt="search by tour guide" class="me-3" />
                            {{ __('website.BUTTONS.BY_TOUR_GUIDE') }}
                        </button>
                    </li>
                </ul>
                <div class="tab-content" id="bannerFormTabContent">
                    <div class="tab-pane fade show active" id="byPlace" role="tabpanel" aria-labelledby="byPlace-tab">
                        <form action="{{ route('search.tour-guide') }}" method="post" class="p-6">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-3 mb-6">
                                <select name="place_type"  id="place_type"  class="form-control w-full p-2 rounded-md border border-gray-300">
                                    @if ($placeTypes)
                                    @forelse($placeTypes as  $placeType)
                                            <option value="{{ $placeType->id }}" class="font-5 display-16 color-blue"> {{ $placeType->name }} </option>
                                        @empty
                                        @endforelse
                                    @endif
                                </select>
                                @if ($places)
                                    <select name="place_id" id="place_id" class="form-control w-full p-2 rounded-md border border-gray-300">
                                        <option value="null" class="font-5 display-16 color-blue">Where to go?</option>
                                    </select>
                                @endif
                                </select>
                                <select name="no_of_people" class="w-full p-2 rounded-md border border-gray-300">
                                    <option value="" class="font-5 displaty-14 color-blue">Select Passengers</option>
                                    <option value="1" class="font-5 displaty-14 color-blue">1</option>
                                    <option value="2" class="font-5 displaty-14 color-blue">2</option>
                                    <option value="3" class="font-5 displaty-14 color-blue">3</option>
                                    <option value="4" class="font-5 displaty-14 color-blue">4+</option>
                                </select>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-3 mb-6">
                                <div>
                                    <input type="date" name="start_date" required class="w-full p-2 rounded-md border border-gray-300">
                                </div>
                                <div>
                                    <input type="date" name="end_date" required class="w-full p-2 rounded-md border border-gray-300">
                                </div>
                                <button type="submit" class="w-100 py-2 rounded-md font-4 display-16 color-white bg-blue">
                                    {{ __('website.BUTTONS.SEARCH') }}
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="byTourGuide" role="tabpanel" aria-labelledby="byTourGuide-tab">
                        <form action="{{ route('search.tour-guide') }}" method="post" class="p-6">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-2 mb-6">
                                <div class="flex border rounded _form_hourly_day_toggle">
                                    <button type="button" class="toggle-btn flex-1 rounded-l-md font-5 displaty-14 color-blue active">Hourly</button>
                                    <button type="button" class="toggle-btn flex-1 rounded-r-md font-5 displaty-14 color-blue">Per Day</button>
                                </div>
                                <div>
                                    <select name="no_of_people" class="w-full p-2 rounded-md border border-gray-300">
                                        <option value="" class="font-5 displaty-14 color-blue">Select Passengers</option>
                                        <option value="1" class="font-5 displaty-14 color-blue"> Individual </option>
                                        <option value="2" class="font-5 displaty-14 color-blue"> Group </option>
                                     </select>
                                </div>
                                <div>
                                    <select name="experience"  class="form-control w-full p-2 rounded-md border border-gray-300">
                                        <option value="1" class="font-5 display-16 color-blue"> Less than 1 Years </option>
                                        <option value="3" class="font-5 display-16 color-blue"> 1-3 Years </option>
                                        <option value="6" class="font-5 display-16 color-blue"> 4-6 Years </option>
                                        <option value="10" class="font-5 display-16 color-blue"> 6-10 Years </option>
                                        <option value="15" class="font-5 display-16 color-blue"> More than 10 Years </option>
                                    </select>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-2 mb-6">
                              
                                <div>
                                    <select name="place_type"  class="form-control w-full p-2 rounded-md border border-gray-300">
                                        {{-- @isset($districts)
                                            @forelse($districts as  $emirate)
                                                <option value="{{ $emirate->id }}" class="font-5 display-16 color-blue"> {{ $emirate->name }} </option>
                                            @empty
                                            @endforelse
                                        @endif --}}
                                    </select>
                                </div>
                                <div>
                                    <input type="date" name="start_date" required class="w-full p-2 rounded-md border border-gray-300">
                                </div>
                                <div class="me-2">
                                    <input type="date" name="end_date" required class="w-full p-2 rounded-md border border-gray-300">
                                </div>
                            </div>
                            <div >
                                <button type="submit" class="w-100 py-2 rounded-md font-4 display-16 color-white bg-blue">
                                    {{ __('website.BUTTONS.SEARCH') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            <div class="mt-3 bg-gray d-flex justify-content-between align-items-center px-3 py-3 rounded _call_to_action">
                <div class="text-left font-5 display-14 color-blue">
                    {{ __('website.LABELS.MEET_EXPORTS_LABEL') }}
                </div>
                <a class="text-right font-5 display-14 color-blue d-flex justify-content-between align-items-center" href="{{route('tour-guides-profile')}}">
                    {{ __('website.LABELS.MEET_EXPORTS') }}
                    <img src="{{ asset('assets/images/icons/arrow-primary.svg') }}" alt="arrow-right" class="arrow-white ml-4" />
                </a>
            </div>
        </div> 
    </div>
</section>


@push('scripts')
    <script>

        const toggleButtons = document.querySelectorAll('.toggle-btn');
        toggleButtons.forEach(button => {
            button.addEventListener('click', () => {
                if (button.classList.contains('active')) {
                } else {
                    toggleButtons.forEach(btn => {
                        btn.classList.remove('active');
                    });
                    button.classList.add('active');
                }
            });
        });
        
        
        $(document).ready(function () {
        $('#place_type').on('change', function () {
            let placeTypeId = $(this).val();
            console.log(placeTypeId);
            if (placeTypeId) {
                $.ajax({
                    url: `/places/${placeTypeId}`,
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        $('#place_id').empty(); 
                        $('#place_id').append('<option value="null">Where to go?</option>');
                        $.each(data, function (key, place) {
                            $('#place_id').append(`<option value="${place.id}">${place.name}</option>`);
                        });
                    }
                });
            } else {
                $('#place_id').empty();
                $('#place_id').append('<option value="null">Where to go?</option>');
            }
        });
    });
    

    </script>

@endpush