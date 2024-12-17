<style>

.destination-guides .guide-image {
    aspect-ratio: 1 / 1;
    border-radius: 71px;
    margin: 3px;
    object-fit: contain;
    width: 55px;
    height: 55px;
}

</style>

<x-website-layout>
    @section('title', 'Destination -  Details')
    <div class="container-fluid">
        <div class="row px-5" >
            <div class="banner flex-column p-5" style="background-image: url({{ asset('assets/images/destinations/banner.png') }})">
                <h3 class="font-3 display-36 color-white">“Explore More, Discover Deeper
                   <br/>  Your Journey Begins Here!”</h3>
            </div>
           
        </div>

        <div class="row me-3">
            <div class="col-md-9">
                <div class="text p-5">
                    <p class="font-4 display-16 color-black mb-3"> As Abu Dhabi is the capital of the UAE, it’s loaded with thousands of incredible-looking scenes, advanced technology features, and thousands of breathtaking activities. It’s one of the most visited and admired places in the country as it boasts the rich culture and history of the UAE. At the same time, it’s home to many artistic and cultural sites. Every single detail about this area is remarkably on point. 
                       <br>  If you’re seeking some quality time with your beloved ones, this site is the perfect spot to visit. Not only does it present the Emirati culture, but it collects artistic features from all around the world in every location. For example, you can take a few hours to explore The Louvre museum there and watch the world’s most creative artworks!
                        </p>
                    <p class="font-4 display-16 color-black mb-3"> <b> Free Up Some Time, Fill Your Soul With Art </b> </p>
                    <p class="font-4 display-16 color-black mb-3">  The great Louvre overs a significant experience for you to admire. As it includes the most astonishing artworks created by the greatest minds in the art world, this site is admired by every UAE visitor. Despite how fascinating this place is, it also enhances Abu Dhabi’s status in the UAE by putting it in the spotlight in the art world. </p>
                    <p class="font-4 display-16 color-black mb-3"> <b>  When to Visit </b> </p>
                    <p class="font-4 display-16 color-black mb-3"> This charming museum welcomes thousands of visitors every single month. As it opens its doors every day, except on Mondays, you get to enjoy a lovely adventure anytime you like between 10 am & 8 pm on Saturdays, Tuesdays, and Sundays, and between 10 am & 10 pm on Thursdays and Fridays. Even though this place doesn’t offer any children’s activities, it’s never a waste to help your kids grow knowing what art is like by taking them to this novel place. At the same time, its charming and artistic vibes are perfectly on point to enjoy some time and strengthen your bond with your beloved ones. </p>
                    <p class="font-4 display-16 color-black mb-3"> <b>  Related to Louvre Paris  </b> </p>
                    <p class="font-4 display-16 color-black mb-3"> With the world developing every day, you don’t need to go to Paris to see the Charming Louvre. Now you can see that same breathtaking experience in the UAE. The Abu Dhabi Louvre results from 30 years of cooperation between Abu Dhabi and the French. This 260,000 square foot includes the definition of art within every corner. It provides half of the French Louvre’s artworks. At the same time, it has 13 French cultural institutions. This place is an artwork itself. </p>
                    <p class="font-4 display-16 color-black mb-3">  <b>  The First, second, & Third Exhibitions: </b> </p>
                    <p class="font-4 display-16 color-black mb-3"> In 2009, Talking Art, the first exhibition, was held remarkably, and the Louvre Abu Dhabi’ took place at one of the Emirates Palace Hotel. Birth of a Museum, the second exhibition, featured over 130 works and was held in Manarat Al Saadiyat’s exhibition space. Birth of a Museum, the third exhibition, featured several new acquisitions. For example, the astonishing Chirisei Kyubiki by the Japanese artist Kazuo Shiraga.  </p>
                    <p class="font-4 display-16 color-black mb-3"> <b>   All About UAE Louvre  </b> </p>
                    <p class="font-4 display-16 color-black mb-3"> This incredible place is one of the UAE’s most charming places. It offers a beautiful and artistic experience that you would admire at a glance. If that’s what you’re seeking, this place is remarkable for you to have some quality time and relaxation with your family and friends. </p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="_sidebar mt-5">
                    <div class="wrapper d-flex justify-content-start align-items-center pt-4 px-4">
                        <div class="title">
                            <h4 class=" font-2 display-16"> Louvre Abu Dhabi Museum </h4>
                        </div>
                    </div>
                    <hr />
                    <div class="wrapper d-flex justify-content-start align-items-center py-2 p-4">
                        <div class="icon me-2">
                            <img src="{{ asset('assets/images/menu/destinations.svg') }}" alt="destinations"
                                class="me-3" />
                        </div>
                        <div class="title">
                            <h4 class=" font-2 display-16">  Location </h4>
                            <p class="font-4 display-16"> Abu Dhabi </p>
                        </div>
                    </div>
                    <hr />
                    <div class="wrapper d-flex justify-content-start align-items-center py-2 p-4">
                        <div class="icon me-2">
                            <img src="{{ asset('assets/images/icons/language.svg') }}" alt="languages"
                                class="me-3" />
                        </div>
                        <div class="title">
                            <h4 class=" font-2 display-16">  Trip type</h4>
                            <p class="font-4 display-16"> Art& Culture </p>
                        </div>
                    </div>
                    <hr />
                    <div class="wrapper d-flex justify-content-start align-items-center  py-2 p-4">
                        <div class="icon me-2">
                            <img src="{{ asset('assets/images/tour-guide/response-time.svg') }}" alt="response time"
                                class="me-3" />
                        </div>
                        <div class="title">
                            <h4 class=" font-2 display-16"> working hours </h4>
                            <p class="font-4 display-16"> 9 AM–6 PMe </p>
                        </div>
                    </div>
                    <hr />

                    <div class="wrapper d-flex justify-content-start align-items-center p-4  py-2">
                        <div class="icon me-2">
                            <img src="{{ asset('assets/images/tour-guide/calendar.svg') }}" alt="calendar"
                                class="me-3" />
                        </div>
                        <div class="title">
                            <h4 class=" font-2 display-16"> {{ __('website.LABELS.AVAILABILITY_UPDATED') }} </h4>
                            <p class="font-4 display-16"> Available all year  </p>
                        </div>
                    </div>
                    <hr />
                    <div class="wrapper d-flex justify-content-start align-items-center p-4  py-2">
                        <div class="icon me-2">
                            <img src="{{ asset('assets/images/tour-guide/calendar.svg') }}" alt="calendar"
                                class="me-3" />
                        </div>
                        <div class="title">
                            <h4 class=" font-2 display-16"> Age </h4>
                            <p class="font-4 display-16"> from kids to senior  </p>
                        </div>
                    </div>
                
                </div>


                <div class="_sidebar mt-4 p-4">
                    <div class="wrapper d-flex justify-content-start align-items-center py-2 p-4">
                        <div class="title">
                            <h4 class=" font-2 display-16"> Discover a tour guides in this destination </h4>
                        </div>
                    </div>
                    <div class="wrapper destination-guides d-flex justify-content-start align-items-center py-2 p-4">
                        @forelse ($guides as $guide)
                            <img src="{{$guide->image}}" alt="{{$guide}}" class="guide-image">
                        @empty
                            
                        @endforelse
                    </div>
                    
                </div>


            </div>
        </div>
    </div>
</x-website-layout>
