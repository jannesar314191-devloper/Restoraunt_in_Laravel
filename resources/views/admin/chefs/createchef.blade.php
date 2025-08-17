@extends('admin.index')
@section('content')
<div class="main-panel">
<div class="content-wrapper">
<div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Create Chefs</h4>
                  
                    <form  method="post" class="forms-sample" enctype="multipart/form-data" action="{{route('storechef')}}">
                      @csrf
                      <div class="form-group">
                        <label for="exampleInputName1">name</label>
                        <input type="text" class="form-control" name="name" id="exampleInputName1" placeholder="tital">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">speciality</label>
                        <input type="text" class="form-control" name="speciality" id="exampleInputEmail3" placeholder="description">
                      </div>
                      
                     
                      <div class="form-group">
                        <label>Image</label>
                        <input type="file" class="form-control" id="image" name="image">
                        </div>
                    
                      
                      
                      <button type="submit" class="btn btn-primary me-2">Submit</button>
                   
                    </form>
                  </div>
                </div>
              </div>

        
@endsection