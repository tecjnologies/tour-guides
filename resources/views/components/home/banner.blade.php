@push('css')
    <link rel="stylesheet" href="{{ asset('/public/assets/css/banner.css') }}">
@endpush
<section class="relative bg-cover bg-center h-100 _banner py-5 mx-5" style="background-image: url({{ asset('/public/assets/images/homepage/banner-background.png')}});">
    <div class="relative flex flex-col items-center justify-center h-full text-white text-center p-5">
        <h2 class="font-2 display-26 color-white mb-3"> "Discover Hidden Gems with Local Experts" </h2>
        <p class="font-5  display-20 color-white"> Experience the Extraordinary in the UAE with Our Expert Guides  </p>
        <div class="bg-white  rounded shadow-md my-5">
            <form action="#" method="POST" class="p-6">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                    <div class="flex border rounded _form_hourly_day_toggle">
                        <button type="button" class="toggle-btn flex-1 rounded-l-md font-5 displaty-14 color-blue active">Hourly</button>
                        <button type="button" class="toggle-btn flex-1 rounded-r-md font-5 displaty-14 color-blue">Per Day</button>
                    </div>
                    <div>
                        <input type="text" name="destination" placeholder="Where to go?" required class="w-full p-2 rounded-md border border-gray-300">
                    </div>
                    <div>
                        <select name="passengers" class="w-full p-2 rounded-md border border-gray-300">
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
                        <select name="type_of_places" class="w-full p-2 rounded-md border border-gray-300">
                            <option value="" class="font-5 displaty-14 color-blue">Type of Places</option>
                            <option value="beach" class="font-5 displaty-14 color-blue">Beach</option>
                            <option value="mountain" class="font-5 displaty-14 color-blue">Mountain</option>
                            <option value="city" class="font-5 displaty-14 color-blue">City</option>
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
            <div class="mt-3 bg-gray d-flex justify-content-between align-items-center px-3 py-3 rounded">
                <div class="text-left font-5 display-14 color-blue">
                    A unique experience that will not be repeated
                </div>
                <div class="text-right font-5 display-14 color-blue d-flex justify-content-between align-items-center">
                    Meet local experts
                    <img src="{{ asset('/public/assets/images/icons/arrow-primary.svg') }}" alt="arrow-right" class="ml-4" />
                </div>
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