@extends('layouts.backend.master')
@section('title')
    Tourist Guide - Place Add
@endsection
@section('content')

<div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-header  bg-dark">
                      <h3 class="card-title float-left"><strong>Add New Place</strong></h3>
                    </div>
                    <div class="card-body">          
                      @include('partial.errors')
                      <form action="{{ route('admin.place.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <label for="name"> Name: </label>
                          <input type="text" class="form-control" value="{{ old('name') }}" placeholder="Enter Name" id="name" name="name">
                        </div>
                        
                        <div class="form-group">
                            <label for="name"> District: </label>
                            <select name="district_id" id="district" class="form-control">
                                <option value="">select any district</option>
                                    @foreach ($districts as $district)
                                      <option value="{{ $district->id }}" {{ old('district_id') == $district->id ? "selected" : "" }}>
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
                                      <option  value="{{ $placetype->id }}" {{ old('placetype_id') == $placetype->id ? "selected" : "" }}>
                                          {{ $placetype->name }}
                                      </option>
                                  @endforeach
                              </select>
                          </div>

                          <div class="form-group">
                              <label for="description">Description</label>
                              <input id="description" type="hidden" name="description" value="{{ old('description')}}">
                              <trix-editor input="description"></trix-editor>
                          </div>

                          <div class="form-group">
                            <label for="image"> Image: </label>
                              <input type="file" id="file" class="form-control" onchange="loadPreview(this);" name="image">
                              <img id="preview_img">
                          </div>
 
                          <!-- Images Upload -->
                        <div class="form-group">
                            <label for="images">Upload Images:</label>
                            <input type="file" name="images[]" id="images" class="form-control" multiple onchange="previewImages(event)">
                            <small class="text-muted">You can upload multiple images.</small>
                        </div>

                        <div id="image-preview" class="d-flex flex-wrap mt-3"></div>

    
                        <div class="form-group">
                            <label for="tags">Tags:</label>
                            <div id="tag-input-wrapper">
                                @if (old('tags'))
                                    @foreach (old('tags') as $key => $tag)
                                        <div class="tag-item" id="tag-{{ $key }}">
                                            <input type="text" class="form-control" value="{{ $tag }}" name="tags[]" placeholder="Enter Tag">
                                            <button type="button" class="btn btn-danger remove-tag" onclick="removeTag({{ $key }})">Remove</button>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="tag-item" id="tag-0">
                                        <input type="text" class="form-control" name="tags[]" placeholder="Enter Tag">
                                        <button type="button" class="btn btn-danger remove-tag" onclick="removeTag(0)">Remove</button>
                                    </div>
                                @endif
                            </div>
                            <button type="button" class="btn btn-primary mt-2" onclick="addTag()">Add New Tag</button>
                          </div>
                          
                          <div class="form-group">
                                <button type="submit" class="btn btn-success">Create</button>
                                <a href="{{ route('admin.place.index') }}" class="btn btn-danger wave-effect" >Back</a>
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

   let tagCount = {{ old('tags') ? count(old('tags')) : 1 }};

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
      tagItem.remove();
  }

  function previewImages(event) {
      const imagePreview = document.getElementById('image-preview');
      imagePreview.innerHTML = '';
      Array.from(event.target.files).forEach((file, index) => {
          const reader = new FileReader();
          reader.onload = function(e) {
              const imageContainer = document.createElement('div');
              imageContainer.classList.add('m-2', 'position-relative');
              imageContainer.style.width = '230px';
              
              const imageElement = document.createElement('img');
              imageElement.src = e.target.result;
              imageElement.alt = 'Image Preview';
              imageElement.classList.add('img-thumbnail');
              imageElement.style.width = '200px';
              imageElement.style.height = '200px';
  
              const deleteButton = document.createElement('button');
              deleteButton.classList.add('btn', 'btn-danger', 'btn-sm', 'position-absolute', 'top-0', 'end-5');
              deleteButton.innerHTML = '&times;';
              deleteButton.type = 'button';
              deleteButton.onclick = function() {
                  imageContainer.remove();
                  const dataTransfer = new DataTransfer();
                  Array.from(event.target.files).forEach((file, i) => {
                      if (i !== index) dataTransfer.items.add(file);
                  });
                  event.target.files = dataTransfer.files;
              };
  
              imageContainer.appendChild(imageElement);
              imageContainer.appendChild(deleteButton);
              imagePreview.appendChild(imageContainer);
          };
          reader.readAsDataURL(file);
      });
  }
 </script>


  </script>
@endsection

@section('css')
<link href="{{ asset('css/trix.css') }}" rel="stylesheet">
@endsection
      
