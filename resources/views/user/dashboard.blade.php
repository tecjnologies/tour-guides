 <x-website-layout>
    @section('title', 'Tourist Guide - Dashboard')
    <x-website.footer.footer-section :image="'favourties.svg'">
        <div class="container-fluid">
            <div class="row m-4">
                <h2 class="m-auto" style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif">
                    @if(Auth::check())
                        <p class="font-4 display-16 color-pink d-flex justify-content-start align-items-center">
                            <img src="{{  asset('storage/profile_photo/' . auth()->user()->image)  }}"  class="user_profile me-2" />
                            Hi, {{ Auth::user()->name }}!</p>
    
                        <div class="spacer m-4"></div>
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                
                                <button class="nav-link active" id="nav-account-tab" data-bs-toggle="tab" data-bs-target="#nav-account" type="button" role="tab" 
                                    aria-controls="nav-account" aria-selected="true">
                                    Manage Account
                                </button>
                                
                                <button class="nav-link" id="nav-booking-tab" data-bs-toggle="tab" data-bs-target="#nav-booking" type="button" role="tab" 
                                    aria-controls="nav-booking" aria-selected="false">
                                    Booking and trips
                                </button>
                                
                                <button class="nav-link" id="nav-payments-tab" data-bs-toggle="tab" data-bs-target="#nav-payments" type="button" role="tab" 
                                    aria-controls="nav-payments" aria-selected="false">
                                    Payment methods
                                </button>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="spacer m-4"></div>
                            <div class="tab-pane fade show active" id="nav-account" role="tabpanel" aria-labelledby="nav-account-tab">
                                <x-user.edit-profile />
                            </div>
                            <div class="tab-pane fade" id="nav-booking" role="tabpanel" aria-labelledby="nav-booking-tab">
                                <x-user.books-and-trips />
                            </div>
                            <div class="tab-pane fade" id="nav-payments" role="tabpanel" aria-labelledby="nav-payments-tab">
                                <x-user.payment-method />
                            </div>
                        </div>
                    @else
                        <p>Welcome, Guest!</p>
                    @endif
                </h2>
            </div>
        </div>
        <div class="spacer py-5"></div>
        <div class="spacer py-5"></div>
    </x-website.footer.footer-section>

  


</x-website-layout>
