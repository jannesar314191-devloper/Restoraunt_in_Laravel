@extends('admin.index')
@section('content')
<div class="main-panel">
<div class="content-wrapper">
<div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Create Foods</h4>
                  
                    <form  method="post" class="forms-sample" enctype="multipart/form-data" action="{{route('updatefood',['id'=>$food->id])}}">
                      @csrf
                      @method('PUT')
                      <div class="form-group">
                        <label for="exampleInputName1">Tital</label>
                        <input type="text" value="{{$food->tital}}" class="form-control" name="tital" id="exampleInputName1" placeholder="tital">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">description</label>
                        <input type="text" value="{{$food->description}}" class="form-control" name="description" id="exampleInputEmail3" placeholder="description">
                      </div>
                      
                     
                      <div class="form-group">
                        <label>Image</label>
                        <input type="file"  class="form-control" id="image" name="image">
                        <br>
                        <div>
                        <img  style="width:50px ; height: 50px; border-radius: 50%;" src="/upload/{{$food->image}}"  class="img-responsive " alt="Image">
                        </div>
                        </div>
                    
                      <div class="form-group">
                        <label for="exampleInputCity1">Price</label>
                        <input type="text" name="price"  value="{{$food->price}}"id="phone" class="form-control">
                      </div>
                     
                  
                      <button type="submit" class="btn btn-primary me-2">Submit</button>
                   
                    </form>
                  </div>
                </div>
              </div>

        
@endsection