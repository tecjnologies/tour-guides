@push('css')
    <link rel="stylesheet" href="{{ asset('assets/css/banner.css') }}">
@endpush
<section class="relative bg-cover bg-center h-100 _banner py-5 mx-5" style="background-image: url({{ $banner->image  }});">
    <div class="relative flex flex-col items-center justify-center h-full text-white text-center p-5">
        <h2 class="font-2 display-26 color-white mb-3"> {{ $banner->title }} </h2>
        <p class="font-5  display-20 color-white"> {{ $banner->sub_heading  }} </p>
        <div class="bg-white  rounded shadow-md my-5">
            @include('partial.errors')
            @include('partial.successMessage')
            <form action="{{ route('search.tour-guide') }}" method="post" class="p-6">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                    <div class="flex border rounded _form_hourly_day_toggle">
                        <button type="button" class="toggle-btn flex-1 rounded-l-md font-5 displaty-14 color-blue active">Hourly</button>
                        <button type="button" class="toggle-btn flex-1 rounded-r-md font-5 displaty-14 color-blue">Per Day</button>
                    </div>
                    <div>
                        <select name="place_id"  class="form-control w-full p-2 rounded-md border border-gray-300">
                        @if ($places)
                            <option value="null" class="font-5 display-16 color-blue"> Where to go ? </option>
                            @forelse($places as  $place)
                                <option value="{{ $place->id }}" class="font-5 display-16 color-blue"> {{ $place->name }} </option>
                            @empty
                            @endforelse
                        @endif
                        </select>
                    </div>
                    <div>
                        <select name="no_of_people" class="w-full p-2 rounded-md border border-gray-300">
                            <option value="" class="font-5 displaty-14 color-blue">Select Passengers</option>
                            <option value="1" class="font-5 displaty-14 color-blue">1</option>
                            <option value="2" class="font-5 displaty-14 color-blue">2</option>
                            <option value="3" class="font-5 displaty-14 color-blue">3</option>
                            <option value="4" class="font-5 displaty-14 color-blue">4+</option>
                        </select>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                    <div>
                        <select name="place_type"  class="form-control w-full p-2 rounded-md border border-gray-300">
                            @if ($places)
                            @forelse($placeTypes as  $placeType)
                                    <option value="{{ $placeType->id }}" class="font-5 display-16 color-blue"> {{ $placeType->name }} </option>
                                @empty
                                @endforelse
                            @endif
                        </select>
                    </div>
                    <div>
                        <input type="date" name="start_date" required class="w-full p-2 rounded-md border border-gray-300">
                    </div>
                    <div>
                        <input type="date" name="end_date" required class="w-full p-2 rounded-md border border-gray-300">
                    </div>
                </div>
                <button type="submit" class="w-100 py-2 rounded-md font-4 display-16 color-white bg-blue">
                    Search
                </button>
            </form>
            <div class="mt-3 bg-gray d-flex justify-content-between align-items-center px-3 py-3 rounded _call_to_action">
                <div class="text-left font-5 display-14 color-blue">
                    A unique experience that will not be repeated
                </div>
                <a class="text-right font-5 display-14 color-blue d-flex justify-content-between align-items-center" href="{{route('tour-guides-profile')}}">
                    Meet local experts
                    <img src="{{ asset('assets/images/icons/arrow-primary.svg') }}" alt="arrow-right" class="ml-4" />
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
    
    
    

    </script>

@endpush