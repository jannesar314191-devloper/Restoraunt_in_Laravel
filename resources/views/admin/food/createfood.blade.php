@extends('admin.index')
@section('content')
<div class="main-panel">
<div class="content-wrapper">
<div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Create Foods</h4>
                  
                    <form  method="post" class="forms-sample" enctype="multipart/form-data" action="{{route('storefood')}}">
                      @csrf
                      <div class="form-group">
                        <label for="exampleInputName1">Tital</label>
                        <input type="text" class="form-control" name="tital" id="exampleInputName1" placeholder="tital">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">description</label>
                        <input type="text" class="form-control" name="description" id="exampleInputEmail3" placeholder="description">
                      </div>
                      
                     
                      <div class="form-group">
                        <label>Image</label>
                        <input type="file" class="form-control" id="image" name="image">
                        </div>
                    
                      <div class="form-group">
                        <label for="exampleInputCity1">Price</label>
                        <input type="text" name="price" id="phone" class="form-control">
                      </div>
                     
                      
                      <button type="submit" class="btn btn-primary me-2">Submit</button>
                   
                    </form>
                  </div>
                </div>
              </div>

        
@endsection