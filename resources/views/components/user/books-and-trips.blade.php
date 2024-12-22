<div class="row _books_and_trips">
    <div class="col-md-3">
        <div class="spacer mt-4"></div>
        <ul class="d-flex justify-content-around align-items-center p-0">
            <li class="_upcoming"> 
                <p class="font-5 display-14 color-black mb-2">
                    Upcoming 
                </p>
            </li>
            <li class="_cancelled"> 
                <p class="font-5 display-14 color-black mb-2 ">
                    Cancelled 
                </p>
            </li>
            <li class="_completed"> 
                <p class="font-5 display-14 color-black mb-2">
                    Completed 
                </p>
            </li>
        </ul>
    </div>
    <div class="col-md-9"></div>
    <hr/>
    <div class="col-md-4">
        
        <div class="_card py-5">
            <div class="_booking_request  px-4">
                <div class="d-flex position-relative">
                    <div class="_profile_rounded me-md-5">
                        <img src="{{ asset('assets/images/tour-guide/mohammad.png')   }}" alt="Mohammad" class="h-100" />
                    </div>
                    <div class="title d-flex flex-column justify-content-between align-items-center">
                        <div class="headings">
                            <div class="button d-flex justify-content-end align-items-start">
                                <img src="{{ asset('assets/images/icons/edit.svg') }}" alt="edit" class="edit me-2" />
                                <img src="{{ asset('assets/images/icons/delete.svg') }}" alt="delete" class="delete me-2" />    
                            </div>
                            <div class="spacer py-2"></div>
                            <h3 class="font-2 display-18"> Mohammed Othman </h3>
                            <p class="font-4 display-16 m-0"> Specialized in tourist guides  </p>
                        </div>
                        <p class="d-flex justify-content-start align-items-center font-2 display-16 color-blue w-100">                             
                            <img src="{{ asset('assets/images/icons/money.svg') }}" alt="like" class="me-2"/>
                            50AED <span class="font-5 display-12"> per hour </span> 
                        </p>
                    </div>
                </div>
            </div>

            <div class="spacer py-3"></div>

            <div class="contact-buttons px-4">
                <div class="d-flex justify-content-between align-items-center">
                    <button id="shareButton"
                        class="font-5 display-14  bg-light-blue color-blue color-primary d-flex justify-content-center align-items-center 
                        text-decoration-none    me-2  py-2 rounded w-100">
                        <img src="{{ asset('assets/images/tour-guide/share.svg') }}" alt="mohammad"
                            class="me-1" />
                            {{ __('website.LABELS.SHARE_PROFILE') }}
                    </button>
                    <a href="tel:00000"
                        class="font-5 display-14  bg-light-blue color-blue color-primary d-flex justify-content-center align-items-center 
                        text-decoration-none   py-2 me-2 rounded w-100">
                        <img src="{{ asset('assets/images/tour-guide/call.svg') }}" alt="mohammad"
                            class="me-1" />
                            {{ __('website.LABELS.CALL') }}
                    </a>
                    <a href="mailto:111"
                        class="font-5 display-14  bg-light-blue color-blue color-primary d-flex justify-content-center align-items-center 
                    text-decoration-none my-md-4   my-lg-0  py-2 rounded w-100">
                        <img src="{{ asset('assets/images/tour-guide/email.svg') }}" alt="mohammad"
                            class="me-1" />
                            {{ __('website.LABELS.EMAIL') }}
                    </a>
                </div>

            </div>

            <div class="spacer py-3"></div>
            <div class="wrapper px-4">
                <h3 class="font-2 display-18"> Booking Details : </h3>
                <hr/>
                <div class="row">
                    <div class="col-md-4">
                        <p class="font-5 display-14"> Trip Type : </p>
                    </div>
                    <div class="col-md-8">
                        <p class="font-5 display-14"> Art & Culture </p>
                    </div>
                </div>
                <div class="spacer py-2"></div>
                <div class="row">
                    <div class="col-md-4">
                        <p class="font-5 display-14"> Date: </p>
                    </div>
                    <div class="col-md-8">
                        <p class="font-5 display-14"> 20th September 2025 </p>
                    </div>
                </div>
                <div class="spacer py-2"></div>
                <div class="row">
                    <div class="col-md-4">
                        <p class="font-5 display-14"> Number of tourists: </p>
                    </div>
                    <div class="col-md-8">
                        <p class="font-5 display-14"> 2 Adults </p>
                    </div>
                </div>
                <div class="spacer py-2"></div>
                <div class="row">
                    <div class="col-md-4">
                        <p class="font-5 display-14"> Slots: </p>
                    </div>
                    <div class="col-md-8">
                        <p class="font-5 display-14"> 04 Hours (11:00 am to 03:00pm) </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
