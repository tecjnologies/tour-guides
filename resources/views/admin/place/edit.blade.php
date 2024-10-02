@extends('layouts.backend.master')
@section('title')
    Tourist Guide - Place Edit
@endsection
@section('content')

<div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-header  bg-dark">
                      <h3 class="card-title float-left"><strong>Update Place</strong></h3>
                  
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    
                  @include('partial.errors')

                    <form action="{{ route('admin.place.update', $place->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
					        <div class="form-group">
					          <label for="name"> Name: </label>
					          <input type="text" class="form-control" value="{{ old('name', $place->name) }}" placeholder="Enter Name" id="name" name="name">
					        </div>
					        <div class="form-group">
                                <label for="name"> District: </label>
                              <select name="district_id" id="district" class="form-control">
                                  <option value="">select any district</option>
                                     @foreach ($districts as $district)
                                        <option value="{{ $district->id }}"
                                            {{ $place->district_id == $district->id ? 'selected' : '' }}
                                            >
                                            {{ $district->name }}
                                        </option>
                                    @endforeach
                              </select>
                             
                            </div>
                            <div class="form-group">
                                <label for="name"> Place Type: </label>
                                <select name="placetype_id" id="type" class="form-control">
                                    <option value="">select any place type</option>
                                    @foreach ($placetypes as $placetype)
                                        <option  value="{{  old('placetype_id', $placetype->id)  }}"
                                            {{ $place->placetype_id == $placetype->id ? 'selected' : '' }}>
                                            {{ $placetype->name }}
                                        </option>
                                    @endforeach
                                </select>
                              </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <input id="description" type="hidden" name="description" value="{{ old('description',$place->description)}}">
                                <trix-editor input="description"></trix-editor>
                            </div>

					        <div class="form-group">
					          <label for="image"> Image: </label>
					          <input type="file" class="form-control" id="image" name="image" onchange="loadPreview(this);">
                            </div>

                            <div class="form-group">
                                <img id="preview_img">
                            </div>
                            
                             {{-- <div class="form-group">
                                <label for="image"> Old Image</label>
                                <img src="{{ asset('storage/place/'.$place->image) }}" height="140px;" width="200px;">  
                            </div>  --}}
                            <div class="form-group">
                              <label for="tags">Tags:</label>
                              <div id="tag-input-wrapper">
                                  @if(old('tags')) 
                                      {{-- Populate old tags from validation errors --}}
                                      @foreach(old('tags') as $key => $tag)
                                          <div class="tag-item" id="tag-{{ $key }}">
                                              <input type="text" class="form-control" value="{{ $tag }}" name="tags[]" placeholder="Enter Tag">
                                              <button type="button" class="btn btn-danger remove-tag" onclick="removeTag({{ $key }})">Remove</button>
                                          </div>
                                      @endforeach
                                  @elseif(isset($place) && $place->tags) 
                                      {{-- Populate tags when editing an existing place --}}
                                      @php
                                          $tags = json_decode($place->tags, true); // Decoding tags from JSON
                                      @endphp
                                      @foreach($tags as $key => $tag)
                                          <div class="tag-item" id="tag-{{ $key }}">
                                              <input type="text" class="form-control" value="{{ $tag }}" name="tags[]" placeholder="Enter Tag">
                                              <button type="button" class="btn btn-danger remove-tag" onclick="removeTag({{ $key }})">Remove</button>
                                          </div>
                                      @endforeach
                                  @else
                                      {{-- Initial case when no tags --}}
                                      <div class="tag-item" id="tag-0">
                                          <input type="text" class="form-control" name="tags[]" placeholder="Enter Tag">
                                          <button type="button" class="btn btn-danger remove-tag" onclick="removeTag(0)">Remove</button>
                                      </div>
                                  @endif
                              </div>
                              <button type="button" class="btn btn-primary mt-2" onclick="addTag()">Add New Tag</button>
                          </div>

                  


                  <div class="form-group">
                        <button type="submit" class="btn btn-success">Update</button>
                        <a href="{{ route('admin.place.index') }}" class="btn btn-danger wave-effect" >Back</a>
                  </div>
					      

      				</form>
                     
                      
                    </div>
                   
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
            </div>
        </div>
    </div><!-- /.container -->
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
                      .height(140);
          };
   
          reader.readAsDataURL(input.files[0]);
      }
   }

   let tagCount = {{ isset($tags) ? count($tags) : 1 }}; // Initialize tag count based on existing tags

  function addTag() {
      let tagWrapper = document.getElementById('tag-input-wrapper');
      let newTag = `
          <div class="tag-item" id="tag-${tagCount}">
              <input type="text" class="form-control" name="tags[]" placeholder="Enter Tag">
              <button type="button" class="btn btn-danger remove-tag" onclick="removeTag(${tagCount})">Remove</button>
          </div>
      `;
      tagWrapper.insertAdjacentHTML('beforeend', newTag);
      tagCount++;
  }

  function removeTag(tagId) {
      let tagItem = document.getElementById(`tag-${tagId}`);
      tagItem.remove(); // Remove the selected tag item
  }

  </script>
@endsection

@section('css')
<link href="{{ asset('css/trix.css') }}" rel="stylesheet">
@endsection
      
