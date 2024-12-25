
<style>
._get_help ._card {
    background-color: var(--color-gray);
    padding: 45px 27px;
    border-radius: 11px;
}

._card_transparent{
    padding: 45px 27px;
}

</style>

<x-website-layout>
    @section('title', 'Tour Guide - Get Help')

    <x-website.footer.footer-section>
        <div class="conttainer-lg">
            <div class="row _get_help px-md-5">
                <div class="col-md-12 d-flex justify-contnet-center align-items-center flex-column">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                          <button class="nav-link active" id="nav-tourist-tab" data-bs-toggle="tab" data-bs-target="#nav-tourist" type="button" role="tab" 
                                aria-controls="nav-tourist" aria-selected="true">
                                Tourist
                            </button>
                          <button class="nav-link" id="nav-tourguide-tab" data-bs-toggle="tab" data-bs-target="#nav-tourguide" type="button" role="tab" 
                                aria-controls="nav-tourguide" aria-selected="false">
                                Tour guide
                            </button>
                        </div>
                      </nav>
                      <div class="tab-content w-100" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-tourist" role="tabpanel" aria-labelledby="nav-tourist-tab">
                            <div class="spacer my-4"></div>
                            <div class="container">
                                <div class="row d-flex justify-content-center align-items-center">
                                    <div class="col-md-8 d-flex justify-content-center align-items-center flex-column">
                                        <h3 class="font-2 display-30 color-primary">In need of assistance? <br>
                                            We’re eager to help!
                                        </h3>
                                        <p class="font-4 display-16 color-primary"> Find answers to all your questions right here.  </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row  d-flex justify-content-center align-items-center flex-column">
                                <div class="col-md-8 col-lg-10 d-flex justify-content-center align-items-center flex-column">
                                    <div class="spacer my-4"></div>
                                    <p class="font-3 display-20 color-primary"> Common Questions </p>
                                    <div class="spacer my-3"></div>
                                    <div class="row w-100">
                                        <div class="col-md-6 my-3">
                                            <div class="_card d-flex justify-content-start align-items-center">
                                                <img src="{{ asset('assets/images/icons/help-icon.svg') }}" alt="help icon"  class="help icon me-3"   width="30px"/>
                                                <p class="font-4 display-16 color-primary"> Tour guides.me  </p>
                                            </div>
                                        </div>
                                        <div class="col-md-6 my-3">
                                            <div class="_card d-flex justify-content-start align-items-center">
                                                <img src="{{ asset('assets/images/icons/help-icon.svg') }}" alt="help icon"  class="help icon me-3"  width="30px"/>
                                                <p class="font-4 display-16 color-primary"> Payments  </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row w-100">
                                        <div class="col-md-6 my-3">
                                            <div class="_card d-flex justify-content-start align-items-cetner">
                                                <img src="{{ asset('assets/images/icons/help-icon.svg') }}" alt="help icon"  class="help icon me-3" width="30px" />
                                                <p class="font-4 display-16 color-primary"> Tour guides.me  </p>
                                            </div>
                                        </div>
                                        <div class="col-md-6 my-3">
                                            <div class="_card d-flex justify-content-start align-items-cetner">
                                                <img src="{{ asset('assets/images/icons/help-icon.svg') }}" alt="help icon"  class="help icon me-3" width="30px" />
                                                <p class="font-4 display-16 color-primary"> Payments  </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="spacer my-4"></div>
                                    <div class="row w-100">
                                        <div class="col-md-6">
                                            <div class="_card_transparent d-flex justify-content-start align-items-cetner flex-column">
                                               <p class="font-3 display-20 color-primary"> Still need help?  </p>
                                               <div class="spcaer my-2"></div>
                                               <p class="font-4 display-16 color-black"> Choose your preferred contact method and let's get you the help you need!  </p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="_card d-flex justify-content-start align-items-cetner flex-column">
    
                                                <div class="row">
                                                    <div class="col-md-8 ">
                                                        <p class="font-2 display-18 color-primary"> Give us a call  </p>
                                                        <div class="spacer my-2"></div>
                                                        <p class="font-4 display-16 color-black"> Easily connect with our team 
                                                            
                                                            <br> <br> via phone </p>
                                                        <div class="spacer my-3"></div>
                                                        <p class="font-4 display-16 color-black">  Or via Email: <a href="mailto:info@tourguides.me" class="color-primary">  info@tourguides.me </a>  </p>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <img src="{{ asset('assets/images/icons/support.svg') }}" alt="support icon"  class="support_icon" />
                                                    </div>
                                                </div>
    
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-tourguide" role="tabpanel" aria-labelledby="nav-tourguide-tab">tourguide</div>
                      </div>
                </div>
            </div>
        </div>
        <div class="spacer py-5 "></div>
        <div class="spacer py-5 "></div>
    </x-website.footer.footer-section>


</x-website-layout>