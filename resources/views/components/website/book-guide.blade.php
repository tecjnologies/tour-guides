<style>
    label {
        color: #dee2e6;
        color: var(--color-primary);
        font-family: 'Lexend-Light';
    }

    form input {
      border: 1px solid #dee2e6 !important;
    }

    ._subject input{
        height: 88%;
    }

    ._booking_form {
        width: 90%;
        max-width: 90%;
    }

    ._booking_form .modal-content {
        background: transparent;
    }

    .wrapper select {
        font-size: 14px;
        font-family: 'Lexend-Light';
        color: var(--color-primary);
    }

</style>

@php

$vipServices = [
    [
        'image' => asset('assets/images/vip-services/senior-tourism.png'), 
        'title' =>  'Seniors’ tourism',
        'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
    ],
    [
        'image' => asset('assets/images/vip-services/business-tourism.png'), 
        'title' =>  'Business tourism',
        'content' =>   'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
    ],
    [
        'image' => asset('assets/images/vip-services/adventures-tourism.png'), 
        'title' =>  'Adventure tourism',
        'content' =>  'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
    ]
];
@endphp

<div class="modal fade" id="exampleModalCenter" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog _booking_form  modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-9">
                        <form action="{{ route('store.package.booking') }}" method="get" class="bg-white p-5 rounded">
                            @csrf
                            <div class="d-flex justify-content-end align-items-center">
                                <a href="#" data-bs-dismiss="modal" aria-label="Close">
                                    <img src="{{ asset('assets/images/icons/close.svg') }}" alt="close" />
                                </a>
                            </div>                            
                            <div class="row">
                                <div class="col-md-6 form-group my-3">
                                    <label for="full_name"> Full Name </label>
                                    <input type="text" name="full_name" id="full_name" class="form-control"
                                        value="{{ old('full_name') }}">
                                </div>
                                <div class="col-md-6 form-group my-3">
                                    <label for="phone_number"> Phone Number </label>
                                    <input type="text" name="phone_number" id="phone_number" class="form-control"
                                        value="{{ old('phone_number') }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-group my-3">
                                    <label for="country"> Country </label>
                                    <input type="text" name="country" id="country" class="form-control"
                                        value="{{ old('country') }}">
                                </div>
                                <div class="col-md-6 form-group my-3">
                                    <label for="phone_number"> UAE Phone Number </label>
                                    <input type="text" name="phone_number" id="phone_number" class="form-control"
                                        value="{{ old('phone_number') }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-group my-3 _subject">
                                    <label for="subject"> Subject </label>
                                    <input type="text" name="subject" id="subject" class="form-control"
                                        value="{{ old('subject') }}">

                                    @include('partial.errors')
                                    @include('partial.successMessage')
    
                                </div>
                                <div class="col-md-6 form-group my-3">
                                    <div class="subject">
                                        <label for="email"> Email </label>
                                        <input type="text" name="email" id="email" class="form-control"
                                            value="{{ old('email') }}">
                                    </div>
                                    <div class="spacer my-5 "></div>
                                    <div  class="_start_end_date d-flex justify-content-between align-items-center p-2 rounded-md border border-gray-300">
                                        <label for="datepicker">
                                            <input type="text" id="start_datepickerbooking" placeholder="start date"
                                                autocomplete="off" name="start_date"
                                                class="date w-full p-2 _date  border-0 form-control border-right">
                                        </label>
        
                                        <label>
                                            |
                                        </label>
        
                                        <label for="datepicker">
                                            <input type="text" id="end_datepickerbooking" placeholder="end date"
                                                autocomplete="off" name="end_date"
                                                class="date w-full p-2 _date  border-0 form-control">
                                        </label>
                                    </div>
                                    <button class="btn btn-lg bg-orange color-black border w-100 my-4 font-5 display-18">
                                        Send
                                    </button>
                                </div>
                            </div>
        
                            <input type="hidden" name="guide">
                            <input type="hidden" name="price">    
                        
                        </form>


                    </div>
                    <div class="col-md-3">
                        <div class="wrapper bg-white rounded h-100 py-5 px-3">
                            <div class="form-group py-2">
                                <label for="type" class="font-5 display-14 color-blue py-2"> Type </label>
                                <select name="type" id="vipServiceSelect" class="w-full p-2 rounded-md border border-gray-300">
                                    @forelse ($vipServices as $index => $service)
                                        <option value="{{ $index }}" class="font-5 display-14 color-blue"> {{ $service['title'] }} </option>
                                    @empty
                                        <option disabled>No services available</option>
                                    @endforelse
                                </select>
                            </div>
                        
                            <h2 id="vipServiceTitle" class="font-5 display-18 color-blue mb-3 py-2">
                                {{ $vipServices[0]['title'] }}
                            </h2>
                            <p id="vipServiceContent" class="font-5 display-14 color-blue mb-md-4">
                                {{ $vipServices[0]['content'] }}
                            </p>
                            <img id="vipServiceImage" src="{{ $vipServices[0]['image'] }}" alt="{{ $vipServices[0]['title'] }}"
                                 class="w-100 py-2" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    $(function() {
        $(".date").datepicker({
            dateFormat: "dd-mm-yy",
            duration: "fast"
        });
    });  

    document.addEventListener('DOMContentLoaded', function () {
        
        const vipServices = @json($vipServices);

        const selectElement = document.getElementById('vipServiceSelect');
        const titleElement = document.getElementById('vipServiceTitle');
        const contentElement = document.getElementById('vipServiceContent');
        const imageElement = document.getElementById('vipServiceImage');

        selectElement.addEventListener('change', function () {
            const selectedIndex = this.value;
            const selectedService = vipServices[selectedIndex];

            if (selectedService) {
                titleElement.textContent = selectedService.title;
                contentElement.textContent = selectedService.content;
                imageElement.src = selectedService.image;
                imageElement.alt = selectedService.title;
            }
        });
    });

</script>
@endpush