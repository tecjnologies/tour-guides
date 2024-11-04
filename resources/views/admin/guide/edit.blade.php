@extends('layouts.backend.master')
@section('title')
    Tourist Guide - Guide Edit
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-header bg-dark">
                        <h3 class="card-title float-left"><strong>Update Guide</strong></h3>
                    </div>
                    <div class="card-body">
                        @include('partial.errors')
                        <form action="{{ route('admin.guide.update', $guide->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="name"> Name : </label>
                                <input type="text" class="form-control" placeholder="Enter Guide Name" id="name"
                                    name="name" value="{{ old('name', $guide->name) }}">
                            </div>

                            <div class="form-group">
                                <label for="nid"> Emirates ID : </label>
                                <input type="text" class="form-control" placeholder="Enter Guide nid" id="nid"
                                    name="nid" value="{{ old('nid', $guide->nid) }}">
                            </div>

                            <div class="form-group">
                                <label for="email"> Email : </label>
                                <input type="text" class="form-control" placeholder="Enter Email " id="email"
                                    name="email" value="{{ old('email', $guide->email) }}">
                            </div>

                            <div class="form-group">
                                <label for="contact"> Contact : </label>
                                <input type="text" class="form-control" placeholder="Enter Contact" id="contact"
                                    name="contact" value="{{ old('contact', $guide->contact) }}">
                            </div>

                            <div class="form-group">
                                <label>Emirates</label>
                                <select class="form-control select-activities" data-placeholder="Choose Emirate" name="emirates_id">
                                    @foreach ($emirates as $emirate)
                                        <option value="{{ $emirate->id }}"
                                            {{ $emirate->id == old('emirates_id', $guide?->description?->emirates_id) ? 'selected' : '' }}>
                                            {{ $emirate->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="address"> Address : </label>
                                <input type="text" class="form-control" placeholder="Enter address" id="address"
                                    name="address" value="{{ old('address', $guide->address) }}">
                            </div>

                            <div class="form-group">
                                <label for="image"> Image : </label>
                                <input type="file" class="form-control" id="image" name="image">
                            </div>

                            <div class="form-group">
                                <label for="image"> Old Image</label>
                                <img src="{{ $guide->image }}" height="80px;" width="60px;">
                            </div>

                            <div class="form-group">
                                <label for="price"> Price : </label>
                                <input type="text" class="form-control" placeholder="Enter price" id="price"
                                    name="price" value="{{ old('price', $guide->price) }}">
                            </div>

                            <div class="form-group">
                                <label for="experience"> Experience (Years) : </label>
                                <input type="text" class="form-control" placeholder="Enter experience" id="experience"
                                    name="experience" value="{{ old('experience', $guide->experience) }}">
                            </div>
							
							<div class="form-group">
                                <label for="response_time"> Response Time (hours) :  </label>
                                <input type="number" class="form-control" placeholder="Enter Response Time" id="response_time" 
									name="response_time" value="{{ old('response_time', $guide->description?->response_time) }}">
                            </div>
							
							<div class="form-group">
                                <label for="no_of_slots"> No of Slots ( in month ) : </label>
                                <input type="number" class="form-control" placeholder="Enter No of Slots" id="no_of_slots" 
									name="no_of_slots" value="{{ old('no_of_slots', $guide->description?->no_of_slots) }}">
                            </div>


                            <div class="form-group">
                                <label for="description">Description</label>
                                <input id="description" type="hidden" name="description"
                                    value="{{ old('description', $guide->description?->description) }}">
                                <trix-editor input="description"></trix-editor>
                            </div>


                            
                            <div class="form-group">
                                <label for="itinerary"> Itinerary Sample </label>
                                <input id="itinerary" type="hidden" name="itinerary"  value="{{ old('itinerary', $guide->itinerary) }}">
                                <trix-editor input="itinerary"></trix-editor>
                            </div>


                            <div class="form-group">
                                <label>
                                    <input type="checkbox" id="isCustomized" name="isCustomized"
                                           {{ old('isCustomized', $guide->customized ?? false) ? 'checked' : '' }}>
                                    Is Customized Tour
                                </label>
                            </div>

                            <div class="form-group" id="customizedTourGroup" style="display: none;">
                                <label for="customized">Feel free to add any additional comments or details about the customization options you provide </label>
                                <input id="customized" type="hidden" name="customized" value="{{ old('customized', $guide->customized ?? '') }}">
                                <trix-editor input="customized"></trix-editor>
                            </div>

                            <div class="form-group">
                                <label>
                                    <input type="checkbox" name="isCertified" value="1"
                                        {{ old('isCertified', $guide?->description?->isCertified) ? 'checked' : '' }}>
                                    Certified
                                </label>
                            </div>

                            <div class="form-group">
                                <label>
                                    <input type="checkbox" name="highRatings" value="1"
                                        {{ old('highRatings', $guide?->description?->highRatings) ? 'checked' : '' }}>
                                    High Ratings
                                </label>
                            </div>

                            <div class="form-group">
                                <label>
                                    <input type="checkbox" name="responsiveGuide" value="1"
                                        {{ old('responsiveGuide', $guide?->description?->responsiveGuide) ? 'checked' : '' }}>
                                    Responsive Guide
                                </label>
                            </div>


                            <div class="form-group">
                                <label>Choose Language</label>
                                <select class="form-control select-languages" name="languages[]" multiple>
                                    @foreach ($languages as $language)
                                        <option value="{{ $language->id }}"
                                            @foreach ($guide->guideLanguages as $selectedLanguage) 
												{{ $selectedLanguage->id == $language->id ? 'selected' : '' }} @endforeach>
                                            {{ $language->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="form-group">
                                <label>Choose Activites</label>
                                <select class="form-control select-activitites" name="activities[]" multiple>
                                    @foreach ($activities as $activity)
                                        <option value="{{ $activity->id }}"
                                            @foreach ($guide->activities as $selectedActivities) 
												{{ $selectedActivities->id == $activity->id ? 'selected' : '' }} @endforeach>
                                            {{ $activity->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="form-group">
                                <label>Choose Tour Type</label>
                                <select class="form-control select-activitites" name="tourtypes[]" multiple>
                                    @foreach ($tourtypes as $tourtype)
                                        <option value="{{ $tourtype->id }}"
                                            @foreach ($guide->tourTypes as $selectedTourtypes) 
												{{ $selectedTourtypes->id == $tourtype->id ? 'selected' : '' }} @endforeach>
                                            {{ $tourtype->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="form-group">
                                <label>Choose Private Destinations</label>
                                <select class="form-control select-places" name="privateDestinations[]" multiple>
                                    @foreach ($places as $place)
                                        <option value="{{ $place->id }}"
                                            @foreach ($guide->privateDestinations as $selectedDestinations) 
												{{ $selectedDestinations->id == $place->id ? 'selected' : '' }} @endforeach>
                                            {{ $place->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

							<div class="form-group">
                                <label>Choose Other Destinations</label>
                                <select class="form-control select-places" name="otherDestinations[]" multiple>
                                    @foreach ($places as $place)
                                        <option value="{{ $place->id }}"
                                            @foreach ($guide->otherDestinations as $selectedDestinations) 
												{{ $selectedDestinations->id == $place->id ? 'selected' : '' }} @endforeach>
                                            {{ $place->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Update</button>
                                <a href="{{ route('admin.guide.index') }}"  class="btn btn-danger wave-effect">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/chosen.jquery.min.js') }}"></script>
    <script src="{{ asset('js/trix.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.select-activitites').chosen();
            $('.select-languages').chosen();
            $('.select-places').chosen();
        })

        document.addEventListener('DOMContentLoaded', function () {
            const isCustomizedCheckbox = document.getElementById('isCustomized');
            const customizedTourGroup = document.getElementById('customizedTourGroup');

            customizedTourGroup.style.display = isCustomizedCheckbox.checked ? 'block' : 'none';

            isCustomizedCheckbox.addEventListener('change', function () {
                customizedTourGroup.style.display = this.checked ? 'block' : 'none';
            });
         });

    </script>
@endsection

@section('css')
    <link href="{{ asset('css/chosen.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/trix.css') }}" rel="stylesheet">
@endsection
