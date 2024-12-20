@extends('layouts.backend.master')
@section('title')
    Tourist Guide - Place Type Edit
@endsection
@section('content')
<div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-header  bg-dark">
                      <h3 class="card-title float-left"><strong>Update Place Type</strong></h3>
                  
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      @include('partial.errors')
                    <form action="{{ route('admin.type.update',$type->id) }}" method="POST" >
					        @csrf
					        @method('PUT')

					        <div class="form-group">
					          <label for="name"> Name: </label>
					          <input type="text" class="form-control" placeholder="Enter District Name" id="name" name="name" value="{{ old('name',$type->name) }}">
					        </div>
					      

                  <div class="form-group">
                        <button type="submit" class="btn btn-success">Update</button>
                        <a href="{{ route('admin.type.index') }}" class="btn btn-danger wave-effect" >Back</a>
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