@extends('layouts.backend.master')
@section('title')
    Tourist Guide - Banner
@endsection
@section('content')
<div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
              	@include('partial.successMessage')
                <div class="card my-5 mx-4">
                    <div class="card-header  bg-dark">
                    <h3 class="card-title float-left p-0 m-0"><strong>Manage Activtiy </strong></h3>
                    <a href="{{route('admin.activity.create')}}" class="btn btn-success btn-md float-right c-white">Add New <i class="fa fa-plus"></i></a>
                    </div>
                    <!-- card-header -->
                    @if ($activites->count() > 0)
                    <div class="card-body">
                    <div class="table-responsive">
                      <table id="dataTableId" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>Title</th>
                          <th>image</th>
                          <th> IsActive </th>
                          <th >Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $activites as $key => $activity)
                        <tr>
                          <td>{{ $activity->title }}</td> 
                          <td>
                            <img style="height: 60px; width: 100px;" class="img-fluid" src="{{ $activity->image  }}" alt="image">
                          </td>
                          <td>
                            <div class="custom-control custom-switch">
                              <input
                                type="checkbox"
                                class="custom-control-input"
                                id="statusToggle"
                                name="status"
                                value="1"
                                {{  $activity->isActive ? 'checked' : '' }}>
                              <label class="custom-control-label" for="statusToggle">Active</label>
                            </div>

                          </td>
                          <td> 
                            <a href="{{ route('admin.activity.edit', $activity->id) }}" class="btn btn-info">Edit</a>
                            <button type="submit" onclick="handleDeletePlace( {{ $activity->id }}) " class="btn btn-danger">Delete</button>
                          </td>
                        </tr>
                        @endforeach    
                        </tbody>
                      </table>
                    </div>

                     <!-- Modal -->
                <div class="modal fade" id="deletePlaceModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                      <form action="" id="deletePlaceForm" method="POST">
                          @csrf 
                          @method('DELETE')
                              <div class="modal-content">
                                  <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Banner Delete</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                                  </div>
                                  <div class="modal-body">
                                      <div class="text-center">Are you sure to delete this activity information?</div>
                                  </div>
                                  <div class="modal-footer">
                                  <button type="button" class="btn btn-success" data-dismiss="modal">No, Go Back</button>
                                  <button type="submit" class="btn btn-danger">Yes, Delete</button>
                                  </div>
                              </div>
                      </form>
                  </div>
              </div>
                      
                    </div>
                    @else 
                      <h2 class="text-center text-info font-weight-bold m-3">No Place Found</h2>
                    @endif
                    
                    <div class="_pagination  d-flex justify-content-center align-items-cetner">
                      {{ $activites->links('pagination::bootstrap-4') }}
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
            </div>
        </div>
    </div><!-- /.container -->
 @endsection

 @section('scripts')
   <script>
       function handleDeletePlace(id){

          var form = document.getElementById('deletePlaceForm')
          form.action = 'activity/' + id 
          $('#deletePlaceModal').modal('show')

       }
   </script>
@endsection