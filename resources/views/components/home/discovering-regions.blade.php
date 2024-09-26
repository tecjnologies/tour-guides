 <div class="_wrapper pb-4 px-5">
     <div class="heading-buttons d-flex justify-content-between align-items-center">
         <div class="_headings">
             <h2 class="font-2 display-26 color-blue"> Discovering Regions through Local Eyes </h2>
             <p class="font-4 display-16 color-blue"> Lorem Ipsum is simply dummy text of the printing and typesetting industry.  </p>
         </div>
         <div class="_slide_buttons">
             <button class="slick-prev-custom"  data-slider="slider-5">
                 <img src="{{ asset('/public/assets/images/icons/arrow-left.svg') }}" alt="Arrow left" />
             </button>
             <button class="slick-next-custom ml-4"  data-slider="slider-5">
                 <img src="{{ asset('/public/assets/images/icons/arrow-right.svg') }}" alt="Arrow right" />
             </button>
         </div>
     </div>
     <x-website.slider :options="$options">
         <div class="slick-slider11 mt-5" id="slider-5">
             {{-- @forelse($data as $slide) --}}
                 <div class="slide">
                     <div class="extra-slide-content">
                         <div class="row _descovering_regions">
                             <div class="col-md-3 position-relative">
                                 <img src="{{ asset('/public/assets/images/homepage/meseum.png') }}" alt="Museum of the Future" width="100%" />
                                 <h3 class="font-2 display-20 color-white _title">Museum of the Future</h3>
                             </div>
                             
                             <div class="col-md-3">
                                 <div class="im position-relative">
                                     <img src="{{ asset('/public/assets/images/homepage/tower-2.png') }}" alt="Downtown" width="100%"/>
                                     <h3 class="font-2 display-20 color-white _title"> Downtown</h3>
                                 </div>
 
                                 <div class="im mt-5 position-relative">
                                     <img src="{{ asset('/public/assets/images/homepage/burj-arab.png') }}" alt="Burj Al Arab" width="100%"/>
                                     <h3 class="font-2 display-20 color-white _title">Burj Al Arab</h3>
                                 </div>
 
                             </div>
 
                             <div class="col-md-3 position-relative">
                                 <img src="{{ asset('/public/assets/images/homepage/tower-1.png') }}" alt="Etihad Towers" width="100%"/>
                                 <h3 class="font-2 display-20 color-white _title">Etihad Towers</h3>
                             </div>
 
                             <div class="col-md-3 ">
                                 <div class="im position-relative">
                                     <img src="{{ asset('/public/assets/images/homepage/meseum-1.png') }}" alt="Alseef" width="100%"/>
                                     <h3 class="font-2 display-20 color-white _title">Alseef</h3>
                                 </div>
 
                                 <div class="im position-relative mt-5">
                                     <img src="{{ asset('/public/assets/images/homepage/frame.png') }}" alt="Dubai Frame" width="100%"/>
                                     <h3 class="font-2 display-20 color-white _title">Dubai Frame</h3>
                                 </div>
 
                             </div>
 
 
                         </div>
                     </div>
                 </div>
             {{-- @empty 
                 <p>No Data Found!</p>
             @endforelse --}}
         </div>
 
     </x-website.slider>   
</div>   