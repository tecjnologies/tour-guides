@extends('layouts.backend.master')
@section('title')
    Tourist Guide - Guide Add
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-header  bg-dark">
                        <h3 class="card-title float-left"><strong>Create Guide</strong></h3>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        @include('partial.errors')
                        <form action="{{ route('admin.guide.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name"> Name: </label>
                                <input type="text" class="form-control" placeholder="Enter Name" id="name" value="{{ old('name') }}"
                                    name="name">
                            </div>
                            <div class="form-group">
                                <label for="nid"> Emirates ID: </label>
                                <input type="number" class="form-control" placeholder="Enter Nid" id="nid" value="{{ old('nid') }}"
                                    name="nid">
                            </div>
                            <div class="form-group">
                                <label for="email"> Email: </label>
                                <input type="text" class="form-control" placeholder="Enter Email " id="email" value="{{ old('email') }}"
                                    name="email">
                            </div>
                            <div class="form-group">
                                <label for="contact"> Contact: </label>
                                <input type="number" class="form-control" placeholder="Enter Contact" id="contact" value="{{ old('contact') }}"
                                    name="contact">
                            </div>
                            <div class="form-group">
                                <label for="address"> Address: </label>
                                <input type="text" class="form-control" placeholder="Enter Address" id="address" value="{{ old('address') }}"
                                    name="address">
                            </div>

                            <div class="form-group">
                                <label for="price"> Price: </label>
                                <input type="number" class="form-control" placeholder="Enter price" id="price" value="{{ old('price') }}"
                                    name="price">
                            </div>

                            <div class="form-group">
                                <label for="experience"> Experience (Years): </label>
                                <input type="number" class="form-control" placeholder="Enter experience" id="experience" value="{{ old('experience') }}"
                                    name="experience">
                            </div>

							<div class="form-group">
								<label>Languages</label>
								<select class="form-control select-languages" data-placeholder="Choose Language" name="languages[]" multiple>
									@foreach ($languages as $language)
										<option value="{{ $language->id }}" 
											{{ in_array($language->id, old('languages', [])) ? 'selected' : '' }}>
											{{ $language->name }}
										</option>
									@endforeach
								</select>
							</div>

                            <div class="form-group">
								<label>Choose Activities</label>
								<select class="form-control select-activitites" data-placeholder="Choose Activity" name="activities[]"
									multiple>
									@foreach ($activities as $activity)
										<option value="{{ $activity->id }}"
											{{ in_array($activity->id, old('activities', [])) ? 'selected' : '' }}>
											{{ $activity->title }}
										</option>
									@endforeach
								</select>
							</div>

                            <div class="form-group">
                                <label for="image"> Image: </label>
                                <input type="file" class="form-control" id="image" name="image">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Create</button>
                                <a href="{{ URL::previous() }}" class="btn btn-danger wave-effect">Back</a>
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
<script>
	
	$(document).ready(function() {
		$('.select-activitites').chosen();
		$('.select-languages').chosen();
	})

</script>
@endsection

@section('css')
<link href="{{ asset('css/chosen.min.css') }}" rel="stylesheet">
@endsection