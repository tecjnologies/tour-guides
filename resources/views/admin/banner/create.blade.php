@extends('layouts.backend.master')
@section('title')
    Tourist Guide - Banner Add
@endsection
@section('content')

<div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-header  bg-dark">
                      <h3 class="card-title float-left"><strong>Add New Banner</strong></h3>
                    </div>
                    <div class="card-body">          
                      @include('partial.errors')
                      <form action="{{ route('admin.banner.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <label for="title"> Title: </label>
                          <input type="text" class="form-control" value="{{ old('title') }}" placeholder="Enter Name" id="title" name="title">
                        </div>
                        

                        <div class="form-group">
                          <label for="sub_heading"> sub_heading: </label>
                          <input type="text" class="form-control" value="{{ old('title') }}" placeholder="Enter Name" id="sub_heading" name="sub_heading">
                        </div>
                       
                          <div class="form-group">
                            <label for="image"> Image: </label>
                              <input type="file" id="file" class="form-control" onchange="loadPreview(this);" name="image">
                              <img id="preview_img">
                          </div>

                          <div class="form-group">
                                <button type="submit" class="btn btn-success">Create</button>
                                <a href="{{ route('admin.banner.index') }}" class="btn btn-danger wave-effect" >Back</a>
                          </div>					      
                      </form>
                    </div>
                  </div>
            </div>
        </div>
    </div>
 @endsection


@section('scripts')
    <script src="{{ asset('js/trix.js') }}"></script>
    <script>
        function loadPreview(input, id) {
            id = id || '#preview_img';
            if (input.files && input.files[0]) {
                var reader = new FileReader();
        
                reader.onload = function (e) {
                    $(id)
                            .attr('src', e.target.result)
                            .width(200)
                            .height(150);
                };
        
                reader.readAsDataURL(input.files[0]);
            }
        }
  </script>
@endsection

@section('css')
<link href="{{ asset('css/trix.css') }}" rel="stylesheet">
@endsection